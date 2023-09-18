<?php
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\RolesModel;

class ConfigurationsController extends BaseController{
    protected $helpers = ['form'];

    public function viewSettingsPage(){
        $data = [
            'first_name' => session('first_name'),
            'last_name' => session('last_name'),
            'avatar' => session('avatar'),
            'role' => session('role'),
            'title' => 'Pages Configurations',
            'errors' => []
        ];
        return view('backend/templates/admin_header', $data)
            . view('backend/Configurations', $data)
            . view('backend/templates/admin_footer');
    }
}