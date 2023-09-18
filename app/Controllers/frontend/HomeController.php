<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;
use App\Models\SliderModel;

class HomeController extends BaseController{
    public function index(){
        $sliderModel = model(SliderModel::class);
        
        $data = [
            'sliders' => $sliderModel->getSliders(),
        ];

        return view('frontend/templates/header', $data)
            . view('frontend/homepage', $data)
            . view('frontend/templates/footer');
    }
}