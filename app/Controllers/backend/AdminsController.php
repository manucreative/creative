<?php
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\ActivationModel;
use App\Models\AdminModel;
use App\Models\RolesModel;
use App\Models\SocialMedia;

class AdminsController extends BaseController{
     protected $helpers = ['form'];

    public function viewAllUsers(){
        $adminModel = model(AdminModel::class);
       $admins = $adminModel->getAdmins();

        $data = [
            'first_name' => session('first_name'),
            'admin_id' => session('admin_id'),
            'last_name' => session('last_name'),
            'avatar' => session('avatar'),
            'role' => session('role'),
            'session_key' => session('session_key'),
            'token' => session('adminToken'),
            'admins' => $admins,
            'title' => 'All Administrators',
            'i' => $i = 1
        ];

        return view('backend/templates/admin_header', $data)
             . view('backend/viewAllUsers', $data)
             . view('backend/templates/admin_footer');
    }


    public function addAdminForm($key){
        $session_key = session()->get('session_key');
        if($key !== $session_key){
            return redirect()->back();
        }else{
        $rolesModel = model(RolesModel::class);
        $activationModel = model(ActivationModel::class);
        $data = [
            'first_name' => session('first_name'),
            'admin_id' => session('admin_id'),
            'last_name' => session('last_name'),
            'avatar' => session('avatar'),
            'role' => session('role'),
            'session_key' => session('session_key'),
            'token' => session('adminToken'),
            'admin_roles' => $rolesModel->getRoles(),
            'activations' => $activationModel->getActivations(),
            'title' => 'Add Administrator',
            'errors' => []
        ];
         return view('backend/templates/admin_header',$data)
                . view('backend/addAdmin_form',$data)
                . view('backend/templates/admin_footer');
    }
}

    public function addAdminAction($key){
        
        $session_key = session()->get('session_key');
        if($key !== $session_key){
            return redirect()->back();
        }else{

        $adminModel = model(AdminModel::class);
        if($this->request->getMethod() === 'post'){
          //  $rolesModel = model(RolesModel::class);
            $validations = [
                'first_name' => [
                    'babel' => 'first name',
                    'rules'=> 'required'
                ],
                 'user_name' => [
                    'babel' => 'user name',
                    'rules'=> 'required'
                ],
                'last_name' => [
                    'babel' => 'last name',
                    'rules'=> 'required'
                ],
                'email_address' => [
                    'babel' => 'email_address',
                    'rules'=> 'required'
                ],
                'telephone' => [
                    'babel' => 'telephone',
                    'rules'=> 'required'
                ],
                'password' => [
                    'label' => 'password',
                    'rules' => 'required|min_length[8]',
                ],
                're_enterPass' => [
                    'label' => 'Re-enter Password',
                    'rules' => 'required|matches[password]',
                ],
                'role' => [
                    'babel' => 'role',
                    'rules'=> 'required'
                ],
                // 'avatar' => [
                //     'babel' => 'avatar',
                //     'rules' => [
                //         'uploaded[avatar]',
                //         'is_image[avatar]',
                //         'mime_in[avatar,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                //     ]
                // ],
            ];

            if(!$this->validate($validations)){

             $errors = $this->validator->getErrors();
                    foreach($errors as $error){
                    return redirect()->back()->withInput()->with('error', $error);
                }
            }else{
                try{
            $adminModel->db->transBegin();
            $user_name = $this->request->getPost('user_name');
            $first_name = $this->request->getPost('first_name');
            $middle_name = $this->request->getPost('middle_name');
            $last_name = $this->request->getPost('last_name');
            $bio = $this->request->getPost('bio');
            $email_address = $this->request->getPost('email_address');
            $telephone = $this->request->getPost('telephone');
            $password = $this->request->getPost('password');
            $re_enterPass = $this->request->getPost('re_enterPass');
            $activation = $this->request->getPost('activation_id');
            $admin_role = $this->request->getPost('role');
            $avatar = $this->request->getFile('avatar');

            if($genData = bin2hex(random_bytes(32))){
                $sessionKey = $genData;
            }

            // $newName = $avatar->getRandomName();
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);


            if ($avatar->isValid()&& $avatar->isFile() && in_array($avatar->getMimeType(), ['image/jpg', 'image/jpeg', 'image/gif', 'image/png', 'image/webp'])) {
                $newName = $avatar->getRandomName();
                $avatar->move(ROOTPATH . 'public/backend/media/admin_images', $newName);

            } else {

                // Use a default image
                $defaultImagePath = ROOTPATH . 'public/backend/assets/img/user.png';
                $randString = rand(1000,10000000);
                $newFile = ROOTPATH . 'public/backend/media/admin_images/'.$randString.'.png';

                // Check if the default image exists
                if (file_exists($defaultImagePath)) {
                    copy($defaultImagePath, $newFile);

                }

                $newName = $randString.'.png';

            }

            // Check if the email already exists
                if (!$adminModel->isEmailUnique($email_address)) {
                    // Email already exists, handle the error (e.g., display a message)
                    return redirect()->back()->withInput()->with('error', 'Email is already in use.');
                    $adminModel->db->transRollback();
                }else if(!$adminModel->isUserNameUnique($user_name)){
                    return redirect()->back()->withInput()->with('error', 'User Name is already in use.');
                    $adminModel->db->transRollback();
                }else if(){
                    
                }

            $adminData = [
                'user_name' => $user_name,
                'adminToken' => $sessionKey,
                'first_name' => $first_name,
                'middle_name'=> $middle_name,
                'last_name'=> $last_name,
                'bio'=> $bio,
                'email_address' => $email_address,
                'telephone'=> $telephone,
                'password'=> $hashedPassword,
                'activation_id' => $activation,
                'role'=> $admin_role,
                'avatar' => $newName,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $inserted = $adminModel->insertAdmins($adminData);
            if($inserted){
                $adminModel->db->transCommit();
                session()->setFlashdata('success', 'Administrator Insert successful');
                return redirect()->to(base_url('creative/admin/addAdminForm/index/key/'.$key));
            }else{
               session()->setFlashdata('error', 'Admin Insert Failed');
                return redirect()->to(base_url('creative/admin/addAdminForm/index/key/'.$key))->withInput()->with('error', 'Error: Kindly check your data and try again');
                $adminModel->db->transRollback();
                throw new \Exception();
            }
        }catch(\Exception $e){
            echo "error has occurred".$e->getMessage();
        }
    }
    }
}
    }

    public function deleteAdmins($key){
        $session_key = session('session_key');
        if($key !== $session_key){
            return redirect()->back();
        }else{

        if($this->request->getMethod() === 'post' && $this->request->getPost('ids')){
            $ids = explode(',', $this->request->getPost('ids'));
            $adminsModel = model(AdminModel::class);

            $deleted = $adminsModel->delete_admin_by_ids($ids);
            if($deleted === true){
                $deletedCount = count($ids);
                $message = "A total of $deletedCount Admins(s) have been deleted.";
				echo '<span style="background-color: green; color:black; padding:10px">' . $message .'</span>';
                sleep(3);
			}
            else {

				echo '<span style="background-color: red; color:black; padding:10px;">Something went wrong during admin deletion</span>';
			}
            }else{
                echo '<span style="background-color: red; color:black; padding:10px;">You must select at least one admin row for deletion</span>';
            }
        }
    }

    /**
     * individual | profile update function
     *
     * @param [type] $key
     * @param [type] $token
     * @return view
     */
    public function updateUserForm($key, $token){
            
        $adminModel = model(AdminModel::class);
        $rolesModel = model(RolesModel::class);
        $activationModel = model(ActivationModel::class);
        $socialMedia = model(SocialMedia::class);

         $session_key = session('session_key');
         $admins = $adminModel->allAdmins($token);

     if($key !== $session_key){
        return redirect()->back();
    }else{

        $admin_id = $admins['admin_id'];
        $basic_details = $adminModel->getBasicDetails($token);
        $contactDetails = $adminModel->getContactDetails($token);
        $education = $adminModel->getEducation($token);
        $expertiseAreas = $adminModel->getExpertiseAreas($token);
        $skills = $adminModel->getSkills($token);
        $experience = $adminModel->getExperience($token);
        $reference = $adminModel->getReference($token);
        

            $currentActivationId = $admins['activation_id'];
            $i = 1;

         $data = [
             'basics' => $basic_details,
             'contacts' => $contactDetails,
             'expertiseData' => $expertiseAreas,
             'educationData' =>$education,
             'skillData' =>$skills,
             'experienceData' => $experience,
             'referenceData' => $reference,
             'first_name' => session('first_name'),
             'admin_id' => session('admin_id'),
             'last_name' => session('last_name'),
             'avatar' => session('avatar'),
             'role' => session('role'),
             'session_key' => session('session_key'),
             'token' => session('adminToken'),
             'currentActivationId' => $currentActivationId,
              'admins' => $admins,
             'admin_roles' => $rolesModel->getRoles(),
             'socialMediaData' => $socialMedia->getSocialMedia($admin_id),
             'activations' => $activationModel->getActivations(),
             'title' => 'All Administrators',
             'errors' => [],
             'i' => $i++
         ];
 
         return view('backend/templates/admin_header', $data)
              . view('backend/profileUpdateForm', $data)
              . view('backend/templates/admin_footer');
        }
    }
       /**
        * all users profile update form
        *
        * @param [type] $key
        * @param [type] $token
        * @return view
        */
        public function profileUpdateForm($key, $token){
            
            $adminModel = model(AdminModel::class);
            $rolesModel = model(RolesModel::class);
            $activationModel = model(ActivationModel::class);
            $socialMedia = model(SocialMedia::class);

            $session_key = session('session_key');
            $adminToken = session('adminToken');
            $admins = $adminModel->allAdmins($token);
            

        if($key !== $session_key || $token !== $adminToken ){
            return redirect()->back();
        }else{


            $basic_details = $adminModel->getBasicDetails($token);
            $contactDetails = $adminModel->getContactDetails($token);
            $education = $adminModel->getEducation($token);
            $expertiseAreas = $adminModel->getExpertiseAreas($token);
            $skills = $adminModel->getSkills($token);
            $experience = $adminModel->getExperience($token);
            $reference = $adminModel->getReference($token);

                $currentActivationId = $admins['activation_id'];

             $data = [
                 'basics' => $basic_details,
                 'contacts' => $contactDetails,
                 'expertiseData' => $expertiseAreas,
                 'educationData' =>$education,
                 'skillData' =>$skills,
                 'experienceData' => $experience,
                 'referenceData' => $reference,
                 'first_name' => session('first_name'),
                 'admin_id' => session('admin_id'),
                 'last_name' => session('last_name'),
                 'avatar' => session('avatar'),
                 'role' => session('role'),
                 'session_key' => session('session_key'),
                 'token' => session('adminToken'),
                 'currentActivationId' => $currentActivationId,
                 'socialMediaData' => $socialMedia->getSocialMedia(session('admin_id')),
                  'admins' => $admins,
                 'admin_roles' => $rolesModel->getRoles(),
                 'title' => 'All Administrators',
                 'errors' => []
             ];
     
             return view('backend/templates/admin_header', $data)
                  . view('backend/profileUpdateForm', $data)
                  . view('backend/templates/admin_footer');
            }
        }

        /**
         * Profile Updates
         *
         * @return void
         */
        public function updateProfile($key){
            $session_key = session()->get('session_key');
            if($key !== $session_key){
                return redirect()->back();
            }else{

            $adminModel = model(AdminModel::class);
            if($this->request->getMethod() === 'post'){

                $validations = [
                    // 'activation_id' => [
                    //     'babel' => 'activation_id',
                    //     'rules'=> 'required'
                    // ],
                        'first_name' => [
                            'babel' => 'first_name',
                            'rules'=> 'required'
                        ],
                        'middle_name' => [
                            'babel' => 'middle_name',
                            'rules'=> 'required'
                        ],
                ];
                if(!$this->validate($validations)){

                    $errors = $this->validator->getErrors();
                           foreach($errors as $error){
                           return redirect()->back()->withInput()->with('error', $error);
                       }
                   }else{

            $adminModel->db->transBegin();

            $admin_id = $this->request->getPost('admin_id');
            $first_name = $this->request->getPost('first_name');
            $middle_name = $this->request->getPost('middle_name');
            $last_name = $this->request->getPost('last_name');
            $bio = $this->request->getPost('bio');
            $email_address = $this->request->getPost('email_address');
            $telephone = $this->request->getPost('telephone');

            $user_name = $this->request->getPostGet('user_name');
            $personal_title = $this->request->getPost('personal_title');
            $sub_title = $this->request->getPost('sub_title');
            $professional_profile = $this->request->getPost('professional_profile');

            $avatar = $this->request->getFile('avatar');
            $existingAvatarFilename = $this->request->getPost('existing_avatar');
            
            $activation = $this->request->getPost('activation_id');
            $defaultActivation = $this->request->getPost('defaultActivation');

            if($activation == null){
                $activation = $defaultActivation;
            }else{
                $activation = $activation;
            }

            if ($avatar->isValid()&& $avatar->isFile() && in_array($avatar->getMimeType(), ['image/jpg', 'image/jpeg', 'image/gif', 'image/png', 'image/webp'])) {
                $newName = $avatar->getRandomName();
                $avatar->move(ROOTPATH . 'public/backend/media/admin_images', $newName);


                $existingAdmin = $adminModel->getAdmins($admin_id);
                if (empty($existingAdmin)) {
                    return false;
                }
                        $existingImagePath = ROOTPATH . 'public/backend/media/admin_images/' . $existingAdmin['avatar'];
                        if (file_exists($existingImagePath)) {
                            unlink($existingImagePath);
                        }
            } elseif (!empty($existingAvatarFilename)) {
                // Use the existing filename if available
                $newName = $existingAvatarFilename;
            } else {

                // Use a default image
                $defaultImagePath = ROOTPATH . 'public/backend/assets/img/user.png';
                $newFile = ROOTPATH . 'public/backend/media/admin_images/avatar.png';
                
                // Check if the default image exists
                if (file_exists($defaultImagePath)) {
                    copy($defaultImagePath, $newFile);
                    
                }
                $newName = 'avatar.png';

            }

            $adminDirectData = [
                'first_name' => $first_name,
                'middle_name'=> $middle_name,
                'last_name'=> $last_name,
                'bio'=> $bio,
                'email_address' => $email_address,
                'telephone'=> $telephone,
                'user_name'=> $user_name,
                'personal_title'=> $personal_title,
                'sub_title' => $sub_title,
                'activation_id' => $activation,
                'professional_profile' => $professional_profile,
                'avatar' => $newName,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $basic_details =[
                'dob' => $this->request->getPost('dob'),
                'national_id' => $this->request->getPost('national_id'),
                'gender' => $this->request->getPost('gender'),
                'languages' => $this->request->getPost('languages'),
                'marital_status' => $this->request->getPost('marital_status'),
                'address' => $this->request->getPost('address'),
            ];
            $contact_details =[
                'residence' => $this->request->getPost('residence'),
                'phone1' => $this->request->getPost('phone1'),
                'phone2' => $this->request->getPost('phone2'),
                'personal_email' => $this->request->getPost('personal_email'),
                'other_email' => $this->request->getPost('other_email'),
            ];
            $education =[
                'masters_level' => $this->request->getPost('masters_level'),
                'degree_level' => $this->request->getPost('degree_level'),
                'diploma_level' => $this->request->getPost('diploma_level'),
                'highschool_level' => $this->request->getPost('highschool_level'),
                'primary_level' => $this->request->getPost('primary_level'),
                'satisfaction_skills' => $this->request->getPost('satisfaction_skills'),
            ];
            $expertise_areas =[
                'expert_area1' => $this->request->getPost('expert_area1'),
                'expert_area2' => $this->request->getPost('expert_area2'),
                'expert_area3' => $this->request->getPost('expert_area3'),
                'expert_area4' => $this->request->getPost('expert_area4'),
                'expert_area5' => $this->request->getPost('expert_area5'),
                'expert_area6' => $this->request->getPost('expert_area6'),
            ];
            $skills =[
                'skill1' => $this->request->getPost('skill1'),
                'skill2' => $this->request->getPost('skill2'),
                'skill3' => $this->request->getPost('skill3'),
                'skill4' => $this->request->getPost('skill4'),
                'skill5' => $this->request->getPost('skill5'),
                'skill6' => $this->request->getPost('skill6'),
                'skill8' => $this->request->getPost('skill8'),
                'skill9' => $this->request->getPost('skill9'),
                'skill10' => $this->request->getPost('skill10'),
                'skill11' => $this->request->getPost('skill11'),
                'skill12' => $this->request->getPost('skill12'),
                'skill2' => $this->request->getPost('skill2'),
            ];
            $experience =[
                'main_experience' => $this->request->getPost('main_experience'),
                'other_experience' => $this->request->getPost('other_experience')
            ];
            $reference =[
                'referee1' => $this->request->getPost('referee1'),
                'referee2' => $this->request->getPost('referee2')
            ];

            $updateData = $adminModel->updateAdminProfile($admin_id,$adminDirectData, $basic_details, $contact_details,
                                                            $education, $expertise_areas, $skills, $experience, $reference);
            if($updateData === true){
                $adminModel->db->transCommit();
                return redirect()->back()->withInput()->with('success', 'You have successfully updated you Profile Congratulations');
                
            }else{
               return redirect()->back()->withInput()->with('error', 'Admin Insert Failed');
               $adminModel->db->transRollback();
                throw new \Exception();
            }

                }
            }
        }
        }
    }