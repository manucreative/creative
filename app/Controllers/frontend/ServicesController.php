<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;
use App\Models\ServiceModel;
use App\Models\FaqModel;

class ServicesController extends BaseController{
    public function index(){
        $faqModel = model(FaqModel::class);
        $serviceModel = model(ServiceModel::class);
        $data =[
            'services' => $serviceModel->getServices(),
            'faqs' => $faqModel->getFaq(),
        ];
        return view('frontend/templates/header', $data)
            . view('frontend/myServices', $data)
            . view('frontend/templates/footer');
    }
}