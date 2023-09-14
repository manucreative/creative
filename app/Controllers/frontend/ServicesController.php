<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;

class ServicesController extends BaseController{
    public function index(){

        return view('frontend/templates/header')
            . view('frontend/myServices')
            . view('frontend/templates/footer');
    }
}