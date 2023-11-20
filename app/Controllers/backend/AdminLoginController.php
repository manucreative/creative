<?php
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\AdminModel;

class AdminLoginController extends BaseController{

    protected $helpers = ['form'];
    public function index(){
        $data =[
            'title' => 'Admin Login Panel',
            'errors' => []
        ];
        return view('backend/login/loginHeader', $data)
        .view('backend/login/index', $data)
        .view('backend/login/loginFooter');
    }

    public function adminLogin(){
        if($this->request->getMethod() === 'post'){
            
        try{
        $admin_email = $this->request->getPost('email_address');
        $admin_pass = $this->request->getPost('password');

        $adminModel = model(AdminModel::class);
        $loginAuthenticate = $adminModel->loginAdmin($admin_email, $admin_pass);
        if($loginAuthenticate){
            $session = session();
            $userData = [
                'admin_id' => $loginAuthenticate['admin_id'],
                'email_address' => $loginAuthenticate['email_address'],
                'first_name' => $loginAuthenticate['first_name'],
                'middle_name' => $loginAuthenticate['middle_name'],
                'last_name' => $loginAuthenticate['last_name'],
                'telephone' => $loginAuthenticate['telephone'],
                'user_name' => $loginAuthenticate['user_name'],
                'session_key' => bin2hex(random_bytes(32)),
                'adminToken'=> $loginAuthenticate['adminToken'],
                'avatar' => $loginAuthenticate['avatar'],
                'role' => $loginAuthenticate['role'],
                'logged_in' => true,
            ];

            $session->set($userData);
             $randKey = session()->get('session_key');
            return redirect()->to(base_url('creative/admin/dashboard/index/key/'.$randKey))->with('success', 'Congrats ' . session('first_name') . ' You are In');

        } else {
            // Invalid login
            return redirect()->to(base_url('creative/admin/login/index/key'))->with('error', 'Invalid email or password');
        }
    }catch(\Exception $e){
        $e->getMessage();

    }
      }
    }

    public function unAuthorized(){
        $data =
        [
            'first_name' => session('first_name'),
            'admin_id' => session('admin_id'),
            'last_name' => session('last_name'),
            'avatar' => session('avatar'),
            'role' => session('role'),
            'session_key' => session('session_key'),
            'token' => session('adminToken'),
            'title' => 'You are not Authorized To Access this content, Kindly Conduct the Administrator'
        ];
        return view('backend/templates/admin_header', $data)
             . view('backend/unAuthorized', $data)
             . view('backend/templates/admin_footer');
    }

    public function sendMail(){
        $data =[
            'title' => 'Forgot Password',
            'errors' => []
        ];

        return view('backend/login/loginHeader', $data)
        .view('backend/login/forgotPass', $data)
        .view('backend/login/loginFooter');
    }

    public function userMailSend(){
        if($this->request->getMethod() === 'post'){

            $admin_email = $this->request->getPost('email_address');
            $adminModel = model(AdminModel::class);

            //check if the provided Email is in the system
            if ($adminModel->isEmailUnique($admin_email)) {
                // Email already exists, handle the error (e.g., display a message)
                return redirect()->back()->withInput()->with('error', 'Email Provided Does not exist in our database');
            }
            else{
                // get user data with this Email address
                $adminData = $adminModel->getAdminByEmailAddress($admin_email);

                $sessionKey = $adminData['adminToken'];
            $name = 'Password Reset Request';
            $user_email = $admin_email;
            $subject = 'Password Reset Request';
            $url = base_url('creative/admin/resetPasswordForm/index/key/'.$sessionKey);

                $smtp_mail = \Config\Services::email();
                $body = "You have requested to reset your Password.<br><br>"
                        . "Name: $name<br>"
                        . "Click the link below to reset your Password, Thanks:<br>$url";
                $smtp_mail->setFrom('emmanuelkirui34@gmail.com', $name);
                $smtp_mail->setTo($user_email);
                $smtp_mail->setSubject($subject);
                $smtp_mail->setMessage($body);
                if($smtp_mail->send()){

            session()->setFlashdata('success', 'We have send the link to the provided Email address please open you Email and click the link');
            return redirect()->to(base_url('creative/admin/mailSendSuccess/index/key'));
        }
    }
}
}

public function mailSendSuccess(){
    $data = [
        'title' => 'Email Sent',
        'errors' => [],
    ];

        return view('backend/login/loginHeader', $data)
        .view('backend/login/passMailSend', $data)
        .view('backend/login/loginFooter');
}

public function resetPasswordForm($token){
    $data = [
        'title' => 'Email Sent',
        'token' => $token,
        'errors' => []
    ];

        return view('backend/login/loginHeader', $data)
        .view('backend/login/resetPasswordForm', $data)
        .view('backend/login/loginFooter');
}

public function updatePassword(){
    if($this->request->getMethod() === 'post'){

        $adminModel = model(AdminModel::class);
        $validations = [
            'password' => [
                'label' => 'password',
                'rules' => 'required|min_length[8]',
            ],
            're_enterPass' => [
                'label' => 'Re-enter Password',
                'rules' => 'required|matches[password]',
            ],
        ];

        if(!$this->validate($validations)){

            $errors = $this->validator->getErrors();
                   foreach($errors as $error){
                   return redirect()->back()->withInput()->with('error', $error);
               }
           }else{

            $token = $this->request->getPost('token');
            $newPassword = $this->request->getPost('password');

            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            // get admin with the given token
            $adminData = $adminModel->allAdmins($token);
            $admin_id = $adminData['admin_id'];
            $admin_email = $adminData['email_address'];

             echo '<pre>';
        print_r($token);
        echo '</pre>';
            // update data now
            $data = [
                'password' => $hashedPassword
            ];

            $updatePass = $adminModel->updatePassword($admin_id, $data);

            if($updatePass){
                $name = 'Successfully Reset Password';
                $user_email = $admin_email;
                $subject = 'Your password reset request was successful';
                $message = 'Thank you for Choosing our services, we are here to help you 24/7, if it was not you resetting the password Kindly contact the admin immediately';
    
                    $smtp_mail = \Config\Services::email();
                    $body = "You have requested to reset your Password.<br><br>"
                            . "Congratulations Password reset success: <br>$message";
                    $smtp_mail->setFrom('emmanuelkirui34@gmail.com', $name);
                    $smtp_mail->setTo($user_email);
                    $smtp_mail->setSubject($subject);
                    $smtp_mail->setMessage($body);
                    if($smtp_mail->send()){
    
                session()->setFlashdata('success', 'Your Password has been updated successful, Please Login here');
                return redirect()->to(base_url('creative/admin/login/index/key'));
            }
            }
           }
    }
}

    public function logOut(){
        $session = session();
        $session->destroy(); // Destroys all session data
        return redirect()->to(base_url('creative/admin/login/index/key'));
    }
}