<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;
use App\Models\SettingsModel;
use App\Models\frontend\AdminFrontendModel;
use App\Models\FaqModel;

class AboutController extends BaseController{

        public function index($title){
                $title = 'About Us';

                $data = [
                    'title' => $title,
                ];
        
                return view('frontend/templates/header', $data)
                    . view('frontend/aboutme', $data)
                    . view('frontend/templates/footer');
        }
}