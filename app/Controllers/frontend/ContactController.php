<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;

class ContactController extends BaseController{
    public function index(){

        return view('frontend/templates/header')
            . view('frontend/contact')
            . view('frontend/templates/footer');
    }
}