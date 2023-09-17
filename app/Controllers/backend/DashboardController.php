<?php
namespace App\Controllers\backend;
use App\Controllers\BaseController;

class DashboardController extends BaseController{
    public function dashboard(){

        $data = [
            'first_name' => session('first_name'),
            'last_name' => session('last_name'),
            'avatar' => session('avatar'),
            'role' => session('role'),
            'title' => 'Manuu Creative Dashboard',
        ];
        return view('backend/templates/admin_header', $data)
            . view('backend/dashboard_view', $data)
            . view('backend/templates/admin_footer');
    }
}