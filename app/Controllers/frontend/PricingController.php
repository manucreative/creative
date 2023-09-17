<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;

class PricingController extends BaseController{
    public function index(){

        return view('frontend/templates/header')
            . view('frontend/pricing')
            . view('frontend/templates/footer');
    }
}