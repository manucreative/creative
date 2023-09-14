<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;

class AboutController extends BaseController{
    public function index(){

        return view('frontend/templates/header')
            . view('frontend/aboutme')
            . view('frontend/templates/footer');
    }
}