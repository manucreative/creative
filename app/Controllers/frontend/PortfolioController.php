<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;

class PortfolioController extends BaseController{
    public function index(){

        return view('frontend/templates/header')
            . view('frontend/myPortfolio')
            . view('frontend/templates/footer');
    }
}