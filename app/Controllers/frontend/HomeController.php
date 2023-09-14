<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;

class HomeController extends BaseController{
    public function index(){

        return view('frontend/templates/header')
            . view('frontend/homepage')
            . view('frontend/templates/footer');
    }
}