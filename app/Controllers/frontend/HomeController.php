<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;
use App\Models\ArticlesModel;
use App\Models\FaqModel;
use App\Models\SettingsModel;
use App\Models\SliderModel;
use App\Models\frontend\AdminFrontendModel;
use App\Models\frontend\FrontServiceModel;
use App\Models\SocialMedia;

class HomeController extends BaseController{
    public function index($title){
        $title = '';
       
        $adminModel = model(AdminFrontendModel::class);
        $sliderModel = model(SliderModel::class);
        $serviceModel = model(FrontServiceModel::class);
        $settingsModel = model(SettingsModel::class);
        $faqModel = model(FaqModel::class);
        $articlesModel = model(ArticlesModel::class);
        $socialMediaModel = model(SocialMedia::class);
        $features = $settingsModel->getAllFeatures();
        $arrayFeatures = json_decode($features, true);

        $allUsers = $settingsModel->getUserProfiler();

        if(!empty($allUsers) && is_array($allUsers)){
        foreach($allUsers as $user){
            $user_name = $user['display_profile'];
        }
    }
        if (isset($arrayFeatures[0]['features'])) {
            $features2 = json_decode($arrayFeatures[0]['features'], true);
        
         $array1 = $features2[0];
        $array2 = $features2[1];
        $array3 = $features2[2];
}

        $admins = $adminModel->getAdminDataByUserName();
        if(!empty($admins) && is_array($admins)){
        foreach($admins as $admin){
            $admin_id = $admin['admin_id'];
        }
    }
        $socialMedialData = $socialMediaModel->getSocialMedia($admin_id);
        //  echo '<pre>';
        // print_r($admin_id);
        // echo '</pre>';
        $data = [
            'sliders' => $sliderModel->getSliders(),
            'title' => $title,
            'feature_title1' => $array1['feature_title1'],
            'feature_desc1' => $array1['feature_desc1'],
            'feature_background1' => $array1['feature_background1'],
            'feature_icon1' => $array1['feature_icon1'],

            'feature_title2' => $array2['feature_title2'],
            'feature_desc2' => $array2['feature_desc2'],
            'feature_background2' => $array2['feature_background2'],
            'feature_icon2' => $array2['feature_icon2'],

            'feature_title3' => $array3['feature_title3'],
            'feature_desc3' => $array3['feature_desc3'],
            'feature_background3' => $array3['feature_background3'],
            'feature_icon3' => $array3['feature_icon3'],
            'services' => $serviceModel->getServices(),
            'faqs' => $faqModel->getFaq(),
            'admins' => $admins,
            'socialMediaModel' => model(SocialMedia::class),
            'articles' => $articlesModel->getArticles()
        ];

        return view('frontend/templates/header', $data)
            . view('frontend/homepage', $data)
            . view('frontend/templates/footer');
    }
}