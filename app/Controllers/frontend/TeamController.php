<?php

namespace App\Controllers\frontend;

use App\Controllers\BaseController;
use App\Models\ArticlesModel;
use App\Models\SettingsModel;
use App\Models\frontend\AdminFrontendModel;
use App\Models\FaqModel;
use App\Models\ServiceModel;
use App\Models\SocialMedia;

class TeamController extends BaseController
{
    public function team($title){

        $title = 'Professional Team';
        $adminModel = model(AdminFrontendModel::class);
        $socialMediaModel = model(SocialMedia::class);
        $admins = $adminModel->getAdmins();
        
        foreach($admins as $admin){
            $admin_id = $admin['admin_id'];
        }
        $mySocialMedia = $socialMediaModel->getSocialMedia($admin_id);

        $data = [
            'admins' => $admins,
            'socialMediaModel' => model(SocialMedia::class),
            'title' => $title,
        ];
        return view('frontend/templates/header', $data)
         . view('frontend/ourTeam', $data)
         . view('frontend/templates/footer');

    }


    public function teamDetails($slug,$title)
    {
        $configModels = model(SettingsModel::class);
        $adminModel = model(AdminFrontendModel::class);
        $articlesModel = model(ArticlesModel::class);
        $socialMediaModel = model(SocialMedia::class);
        $servicesModel = model(ServiceModel::class);
        $rolesModel = model(RolesModel::class);
        $allUsers = $configModels->getUserProfiler();
        $faqModel = model(FaqModel::class);
        $admins = $adminModel->getAdminDataByUserName($slug);

        $title = $admins['first_name']. ' ' .$admins['last_name'];
        $admin_id = $admins['admin_id'];

        $myArticles = $articlesModel->getArticleByAdminId($admin_id);
        $mySocialMedia = $socialMediaModel->getSocialMedia($admin_id);
        $myService = $servicesModel->getOwnerService($admin_id);


        $basic_details = $adminModel->getBasicDetails($slug);
        $contactDetails = $adminModel->getContactDetails($slug);
        $education = $adminModel->getEducation($slug);
        $expertiseAreas = $adminModel->getExpertiseAreas($slug);
        $skills = $adminModel->getSkills($slug);
        $experience = $adminModel->getExperience($slug);
        $reference = $adminModel->getReference($slug);

         $data = [
             'basics' => $basic_details,
             'title' => $title,
             'slug' => $slug,
             'contacts' => $contactDetails,
             'expertiseData' => $expertiseAreas,
             'educationData' =>$education,
             'skillData' =>$skills,
             'experienceData' => $experience,
             'referenceData' => $reference,
             'admins' => $admins,
             'articles' => $myArticles,
             'socialMedia' => $mySocialMedia,
             'services' => $myService,
             'faqs' => $faqModel->getFaq(),
         ];

         return view('frontend/templates/header', $data)
         . view('frontend/memberPage', $data)
         . view('frontend/templates/footer');
    }
}
