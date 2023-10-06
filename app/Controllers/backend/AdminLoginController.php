<?php
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\AdminModel;

class AdminLoginController extends BaseController{

    protected $helpers = ['form'];
    public function index(){
        $data['title'] = 'Admin Login Panel';
        return view('backend/login/index', $data);
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

    public function logOut(){
        $session = session();
        $session->destroy(); // Destroys all session data
        return redirect()->to(base_url('creative/admin/login/index/key'));
    }
}