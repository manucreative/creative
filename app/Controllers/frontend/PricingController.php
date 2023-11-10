<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;

class PricingController extends BaseController{
    public function index($title){
        $title = 'Our Web pricing';

        $data =[
            'title' => $title,
         ];
        return view('frontend/templates/header', $data)
            . view('frontend/pricing', $data)
            . view('frontend/templates/footer');
    }
}