<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;
use App\Models\FaqModel;
use App\Models\frontend\FrontServiceModel;

class ServicesController extends BaseController{
    public function index($slug){
        $faqModel = model(FaqModel::class);
        $serviceModel = model(FrontServiceModel::class);
        $data =[
            'services' => $serviceModel->getServices(),
            'faqs' => $faqModel->getFaq(),
            'slug' => $slug,
        ];
        return view('frontend/templates/header', $data)
            . view('frontend/myServices', $data)
            . view('frontend/templates/footer');
    }
}