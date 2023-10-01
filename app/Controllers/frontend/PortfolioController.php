<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;
use App\Models\FaqModel;

class PortfolioController extends BaseController{
    public function index(){
        $faqModel = model(FaqModel::class);
        $data=[
        'faqs' => $faqModel->getFaq(),
        ];
        return view('frontend/templates/header', $data)
            . view('frontend/myPortfolio', $data)
            . view('frontend/templates/footer');
    }
}