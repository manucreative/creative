<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;
use App\Models\SettingsModel;
use App\Models\frontend\AdminFrontendModel;
use App\Models\FaqModel;

class AboutController extends BaseController{

          
        public function index($slug, $title){
            $configModels = model(SettingsModel::class);
            $adminModel = model(AdminFrontendModel::class);
            $rolesModel = model(RolesModel::class);
            $allUsers = $configModels->getUserProfiler();
            $faqModel = model(FaqModel::class);
            $admins = $adminModel->getAdminDataByUserName($slug);

            $title = $admins['first_name']. ' ' .$admins['last_name'];
        //     if(!empty($allUsers) && is_array($allUsers)){
        //     foreach($allUsers as $user){
        //      //   $user_name = $user['display_profile'];
        //     }
        //     // echo '<pre>';
        //     // print_r($basic_details);
        //     // echo '</pre>';
        // }

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
                 'contacts' => $contactDetails,
                 'expertiseData' => $expertiseAreas,
                 'educationData' =>$education,
                 'skillData' =>$skills,
                 'experienceData' => $experience,
                 'referenceData' => $reference,
                 'admins' => $admins,
                 'faqs' => $faqModel->getFaq(),
             ];

             return view('frontend/templates/header', $data)
             . view('frontend/aboutme', $data)
             . view('frontend/templates/footer');
        }
}