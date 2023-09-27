<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;
use App\Models\ServiceModel;

class ServicesController extends BaseController{
    public function index(){
        $serviceModel = model(ServiceModel::class);
        $data =[
            'services' => $serviceModel->getServices()
        ];
        return view('frontend/templates/header', $data)
            . view('frontend/myServices', $data)
            . view('frontend/templates/footer');
    }
}