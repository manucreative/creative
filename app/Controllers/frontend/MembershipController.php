<?php

namespace App\Controllers\frontend;

use App\Controllers\BaseController;
use App\Models\ActivationModel;
use App\Models\AdminModel;
use App\Models\frontend\AdminFrontendModel;
use App\Models\RolesModel;
use App\Models\SocialMedia;

class MembershipController extends BaseController
{
    protected $helpers = ['form'];
    public function membershipForm($title)
    {
        $title = 'BE AMONG OUR PROFESSIONAL TEAM TODAY';

        $adminModel = model(AdminFrontendModel::class);
        $socialMediaModel = model(SocialMedia::class);
        $admins = $adminModel->getAdmins();
        
        foreach($admins as $admin){
            $admin_id = $admin['admin_id'];
        }

        $data = [
            'title' => $title,
            'admins' => $admins,
            'socialMediaModel' => model(SocialMedia::class),
            'title' => $title,
            'errors' => []
        ];
         return view('frontend/templates/header',$data)
                . view('frontend/membershipForm',$data)
                . view('frontend/templates/footer');
    }

    public function membership()
    {
        $rolesModel = model(RolesModel::class);
        $activationModel = model(ActivationModel::class);

        $adminModel = model(AdminModel::class);
        if($this->request->getMethod() === 'post'){
          //  $rolesModel = model(RolesModel::class);
            $validations = [
                'first_name' => [
                    'babel' => 'first name',
                    'rules'=> 'required'
                ],
                 'user_name' => [
                    'babel' => 'user name',
                    'rules'=> 'required'
                ],
                'last_name' => [
                    'babel' => 'last name',
                    'rules'=> 'required'
                ],
                'email_address' => [
                    'babel' => 'email_address',
                    'rules'=> 'required'
                ],
                'telephone' => [
                    'babel' => 'telephone',
                    'rules'=> 'required'
                ],
                'password' => [
                    'label' => 'password',
                    'rules' => 'required|min_length[8]',
                ],
                're_enterPass' => [
                    'label' => 'Re-enter Password',
                    'rules' => 'required|matches[password]',
                ]
            ];

            if(!$this->validate($validations)){

             $errors = $this->validator->getErrors();
                    foreach($errors as $error){
                      return  redirect()->to(base_url('team/membershipForm#regForm'))->withInput()->with('error', $error);
                    // return redirect()->back()->withInput()->with('error', $error);
                }
            }else{
                try{
            $adminModel->db->transBegin();
            $user_name = $this->request->getPost('user_name');
            $first_name = $this->request->getPost('first_name');
            $middle_name = $this->request->getPost('middle_name');
            $last_name = $this->request->getPost('last_name');
            $bio = $this->request->getPost('bio');
            $email_address = $this->request->getPost('email_address');
            $telephone = $this->request->getPost('telephone');
            $password = $this->request->getPost('password');
            $re_enterPass = $this->request->getPost('re_enterPass');
            $personal_title = $this->request->getPost('personal_title');
            $sub_title = $this->request->getPost('sub_title');
            $activation = 0;
            $avatar = $this->request->getFile('avatar');

            if($genData = bin2hex(random_bytes(32))){
                $sessionKey = $genData;
            }

            // $newName = $avatar->getRandomName();
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);


            if ($avatar->isValid()&& $avatar->isFile() && in_array($avatar->getMimeType(), ['image/jpg', 'image/jpeg', 'image/gif', 'image/png', 'image/webp'])) {
                $newName = $avatar->getRandomName();
                $avatar->move(ROOTPATH . 'public/backend/media/admin_images', $newName);

            } else {

                // Use a default image
                $defaultImagePath = ROOTPATH . 'public/backend/assets/img/user.png';
                $randString = rand(1000,10000000);
                $newFile = ROOTPATH . 'public/backend/media/admin_images/'.$randString.'.png';

                // Check if the default image exists
                if (file_exists($defaultImagePath)) {
                    copy($defaultImagePath, $newFile);

                }

                $newName = $randString.'.png';

            }

            // Check if the email already exists
                if (!$adminModel->isEmailUnique($email_address)) {
                    // Email already exists, handle the error (e.g., display a message)
                    return  redirect()->to(base_url('team/membershipForm#regForm'))->withInput()->with('error', 'Email is already in use.');
                    // return redirect()->back()->withInput()->with('error', 'Email is already in use.');
                    $adminModel->db->transRollback();
                }else if(!$adminModel->isUserNameUnique($user_name)){
                    return  redirect()->to(base_url('team/membershipForm#regForm'))->withInput()->with('error', 'User Name is already in use.');
                    // return redirect()->back()->withInput()->with('error', 'User Name is already in use.');
                    $adminModel->db->transRollback();
                }
                $role = $rolesModel->getRoles('admin');
                    $admin_role = $role['role_id'];

            $adminData = [
                'user_name' => $user_name,
                'adminToken' => $sessionKey,
                'first_name' => $first_name,
                'middle_name'=> $middle_name,
                'last_name'=> $last_name,
                'personal_title' => $personal_title,
                'sub_title' => $sub_title,
                'bio'=> $bio,
                'email_address' => $email_address,
                'telephone'=> $telephone,
                'password'=> $hashedPassword,
                'activation_id' => $activation,
                'role'=> $admin_role,
                'verification' => 'unverified',
                'avatar' => $newName,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $inserted = $adminModel->insertAdmins($adminData);
            if($inserted){

          
                $name = 'manwix - Modern Artisan Networks';
                $user_email = $email_address;
                $subject = 'Email Verification';
                $url = base_url('team/membership/verification/'.$sessionKey);

                    $smtp_mail = \Config\Services::email();
                    $body = "Thank you for you co-operation Kindly verify you email.<br><br>"
                            . "Name: $name<br>"
                            . "Click below link to Verify your email:<br>$url";
                    $smtp_mail->setFrom('emmanuelkirui34@gmail.com', $name);
                    $smtp_mail->setTo($user_email);
                    $smtp_mail->setSubject($subject);
                    $smtp_mail->setMessage($body);
                    if($smtp_mail->send()){

                $adminModel->db->transCommit();
                session()->setFlashdata('userEmail', $user_email);
                session()->setFlashdata('success', 'Congrats You Are almost There, only one step remaining');
                return redirect()->to(base_url('team/membershipForm/verificationSend'));
                    }else{
                        $adminModel->db->transRollback();
                    }
            }else{
               session()->setFlashdata('error', 'Admin Insert Failed');
                return redirect()->to(base_url('team/membershipForm#regForm'))->withInput()->with('error', 'An error ocurred : Kindly check your data and try again');
                $adminModel->db->transRollback();
                throw new \Exception();
            }
        }catch(\Exception $e){
            echo "error has occurred".$e->getMessage();
        }
    }
    }
    }

    public function verificationSend($title){
        $title = 'verification sent';
        $data = [
            'title' => $title,
            'errors' => []
        ];
         return view('frontend/templates/header',$data)
                . view('frontend/verificationSent',$data)
                . view('frontend/templates/footer');
    }

    public function mailVerification($token)
    {

        $adminsModel = model(AdminModel::class);

        if($this->request->getMethod() === 'get'){

            $admin = $adminsModel->allAdmins($token);
            $admin_id = $admin['admin_id'];
            $admin_email = $admin['email_address'];

            $data = [
                'verification' => 'verified'
            ];

            $verification = $adminsModel->updateVerification($admin_id, $data);
            if($verification){
                $name = 'Welcome to Modern Artisan Networks';
                $user_email = $admin_email;
                $subject = 'Platform access link';
                $url = base_url('creative');

                
                $MailName = 'New member has signed in on you website - Modern Artisan Networks (manwix)';
                $user_email = $admin_email;
                $user_name = $admin['first_name'].' ' .$admin['last_name'];
                $user_phone = $admin['telephone'];
                $mySubject = 'New Member in your website';

$emails = [
    [
        'from' => 'emmanuelkirui34@gmail.com',
        'name' => $name,
        'to' => $user_email,
        'subject' => $subject,
        'body' => "Thank you for your interest in our services and accepting to be a member in our platform.<br><br>"
            . "Click the button below to access your admin panel with the credentials you provided earlier:<br> <button style='background:blue; color:white;'><a href='$url'>Go to panel</a></button>"
    ],
    [
        'from' => 'emmanuelkirui34@gmail.com',
        'name' => $MailName,
        'to' => ['emmanuelkirui34@gmail.com', 'manwiks2@gmail.com'],
        'subject' => $mySubject,
        'body' => "There is one person that has accepted to be a member and has completed verification <br><br>"
            . "The user details are as follows:<br>"
            . "Name:  $user_name <br>"
            . "Email: $user_email <br>"
            . "Phone No. : $user_phone <br>"
    ],
];

$smtp_mail = \Config\Services::email();

foreach ($emails as $email) {
    $smtp_mail->setFrom($email['from'], $email['name']);
    $smtp_mail->setTo($email['to']);
    $smtp_mail->setSubject($email['subject']);
    $smtp_mail->setMessage($email['body']);

    if (!$smtp_mail->send()) {
        // Handle the case where an email fails to send
        // You might want to log an error or take other actions
    }
    else {
        session()->setFlashdata('userEmail', $admin_email);
        session()->setFlashdata('success', 'Congratulations, Verification is complete');
        return redirect()->to(base_url('team/membershipForm/verificationSuccess'));
    }
}

// Check if any errors occurred during the sending process
 

            }else{
                session()->setFlashdata('error', 'Sorry!! verification Failed');
                return redirect()->to(base_url('team/membershipForm#regForm'))->withInput()->with('error', 'An error ocurred : Kindly check your data and try again');
            }
        }
    }

    public function verificationSuccess($title){
        $title = 'Verification Success';
        $data = [
            'title' => $title,
            'errors' => []
        ];
         return view('frontend/templates/header',$data)
                . view('frontend/verificationSuccess',$data)
                . view('frontend/templates/footer');
    }
}
