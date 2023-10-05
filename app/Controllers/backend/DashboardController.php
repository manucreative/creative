<?php
namespace App\Controllers\backend;
use App\Controllers\BaseController;

class DashboardController extends BaseController{
    public function dashboard($key){
        $session_key = session('session_key');
        if($key !== $session_key){
            return redirect()->to(base_url('creative/admin/login/index/key'));
        }else{
        $data = [

            'first_name' => session('first_name'),
            'admin_id' => session('admin_id'),
            'last_name' => session('last_name'),
            'avatar' => session('avatar'),
            'session_key' =>session('session_key'),
            'token' => session('adminToken'),
            'role' => session('role'),
            'title' => 'Manuu Creative Dashboard',
        ];
        return view('backend/templates/admin_header', $data)
            . view('backend/dashboard_view', $data)
            . view('backend/templates/admin_footer',$data);
    }
}
}