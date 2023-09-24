<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;
use App\Models\SettingsModel;
use App\Models\frontend\AdminFrontendModel;

class AboutController extends BaseController{

          
        public function index(){
            $configModels = model(SettingsModel::class);
            $adminModel = model(AdminFrontendModel::class);
            $rolesModel = model(RolesModel::class);
            $allUsers = $configModels->getUserProfiler();
            if(!empty($allUsers) && is_array($allUsers)){
            foreach($allUsers as $user){
                $user_name = $user['display_profile'];
            }
            // echo '<pre>';
            // print_r($basic_details);
            // echo '</pre>';
        }
        $admins = $adminModel->getAdminDataByUserName($user_name);
            $basic_details = $adminModel->getBasicDetails($user_name);
            $contactDetails = $adminModel->getContactDetails($user_name);
            $education = $adminModel->getEducation($user_name);
            $expertiseAreas = $adminModel->getExpertiseAreas($user_name);
            $skills = $adminModel->getSkills($user_name);
            $experience = $adminModel->getExperience($user_name);
            $reference = $adminModel->getReference($user_name);

             $data = [
                 'basics' => $basic_details,
                 'contacts' => $contactDetails,
                 'expertiseData' => $expertiseAreas,
                 'educationData' =>$education,
                 'skillData' =>$skills,
                 'experienceData' => $experience,
                 'referenceData' => $reference,
                 'admins' => $admins,
                 'title' => 'All Administrators'
             ];

             return view('frontend/templates/header', $data)
             . view('frontend/aboutme', $data)
             . view('frontend/templates/footer');
        }
}