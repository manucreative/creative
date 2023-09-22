<?php
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\RolesModel;

class AdminsController extends BaseController{
    protected $helpers = ['form'];

    public function viewAdmins(){
        $adminModel = model(AdminModel::class);
       $rolesModel = model(RolesModel::class);
       $admins = $adminModel->getAdmins();
       
      

        $data = [
            'first_name' => session('first_name'),
            'admin_id' => session('admin_id'),
            'last_name' => session('last_name'),
            'avatar' => session('avatar'),
            'role' => session('role'),
            'admins' => $admins,
            'admin_roles' => $rolesModel->getRoles(),
            'title' => 'All Administrators',
            'i' => $i = 1
        ];

        return view('backend/templates/admin_header', $data)
             . view('backend/view_admin', $data)
             . view('backend/templates/admin_footer');
    }

    public function addAdminForm(){
        $rolesModel = model(RolesModel::class);
        $data = [
            'first_name' => session('first_name'),
            'admin_id' => session('admin_id'),
            'last_name' => session('last_name'),
            'avatar' => session('avatar'),
            'role' => session('role'),
            'admin_roles' => $rolesModel->getRoles(),
            'title' => 'Add Administrator',
            'errors' => []
        ];
         return view('backend/templates/admin_header',$data)
                . view('backend/addAdmin_form',$data)
                . view('backend/templates/admin_footer');
    }


    public function addAdminAction(){
        
        $adminModel = model(AdminModel::class);
        if($this->request->getMethod() === 'post'){
          //  $rolesModel = model(RolesModel::class);
            $validations = [
                'first_name' => [
                    'babel' => 'first_name',
                    'rules'=> 'required'
                ],
                'middle_name' => [
                    'babel' => 'middle_name',
                    'rules'=> 'required'
                ],
                'last_name' => [
                    'babel' => 'last_name',
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
                'avatar' => [
                    'babel' => 'avatar',
                    'rules' => [
                        'uploaded[avatar]',
                        'is_image[avatar]',
                        'mime_in[avatar,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    ]
                ],
            ];

            if(!$this->validate($validations)){

             $errors = $this->validator->getErrors();
                    foreach($errors as $error){
                    return redirect()->back()->withInput()->with('error', $error);
                }
            }else{
                try{
                  
            $first_name = $this->request->getPost('first_name');
            $middle_name = $this->request->getPost('middle_name');
            $last_name = $this->request->getPost('last_name');
            $email_address = $this->request->getPost('email_address');
            $telephone = $this->request->getPost('telephone');
            $password = $this->request->getPost('password');
            $re_enterPass = $this->request->getPost('re_enterPass');
            $admin_role = $this->request->getPost('role');
            $avatar = $this->request->getFile('avatar');

            $newName = $avatar->getRandomName();
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Check if the email already exists
                if (!$adminModel->isEmailUnique($email_address)) {
                    // Email already exists, handle the error (e.g., display a message)
                    return redirect()->back()->withInput()->with('error', 'Email address already inuse.');
                }

            $adminData = [
                'first_name' => $first_name,
                'middle_name'=> $middle_name,
                'last_name'=> $last_name,
                'email_address' => $email_address,
                'telephone'=> $telephone,
                'password'=> $hashedPassword,
                'role'=> $admin_role,
                'avatar' => $newName,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $inserted = $adminModel->insertAdmins($adminData);
            if($inserted){
            
                $avatar->move(ROOTPATH . 'public/backend/media/admin_images', $newName);
                session()->setFlashdata('success', 'Administrator Insert successful');
                return redirect()->to(base_url('creative/addAdminForm'));
            }else{
               session()->setFlashdata('error', 'Admin Insert Failed');
                return redirect()->to(base_url('creative/addAdminForm'))->withInput()->with('error', 'Error: Kindly check your data and try again');
            
                throw new \Exception();
            }
        }catch(\Exception $e){
            echo "error has occurred".$e->getMessage();
        }
    }
    }
    }

    public function deleteAdmins(){
        if($this->request->getMethod() === 'post' && $this->request->getPost('ids')){
            $ids = explode(',', $this->request->getPost('ids'));
            $adminsModel = model(AdminsModel::class);

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


        public function profileUpdateForm($admin_id){
            $adminModel = model(AdminModel::class);
            $rolesModel = model(RolesModel::class);
            $admins = $adminModel->getAdmins($admin_id);



             $data = [
                 'first_name' => session('first_name'),
                 'admin_id' => session('admin_id'),
                 'last_name' => session('last_name'),
                 'avatar' => session('avatar'),
                 'role' => session('role'),
                 'admins' => $admins,
                 'admin_roles' => $rolesModel->getRoles(),
                 'title' => 'All Administrators',
                 'errors' => []
             ];
     
             return view('backend/templates/admin_header', $data)
                  . view('backend/profileUpdateForm', $data)
                  . view('backend/templates/admin_footer');
        }

        /**
         * Profile Updates
         *
         * @return void
         */
        public function updateProfile(){
            $adminModel = model(AdminModel::class);
            if($this->request->getMethod() === 'post'){

                $validations = [
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

            $admin_id = $this->request->getPost('admin_id');
            $first_name = $this->request->getPost('first_name');
            $middle_name = $this->request->getPost('middle_name');
            $last_name = $this->request->getPost('last_name');
            $email_address = $this->request->getPost('email_address');
            $telephone = $this->request->getPost('telephone');
            $avatar = $this->request->getFile('avatar');
                     $newName = $avatar->getRandomName();
            $user_name = $this->request->getPostGet('user_name');
            $personal_title = $this->request->getPost('personal_title');
            $sub_title = $this->request->getPost('sub_title');
            $profesional_profile = $this->request->getPost('profesional_profile');


            $adminDirectData = [
                'first_name' => $first_name,
                'middle_name'=> $middle_name,
                'last_name'=> $last_name,
                'email_address' => $email_address,
                'telephone'=> $telephone,
                'user_name'=> $user_name,
                'personal_title'=> $personal_title,
                'sub_title' => $sub_title,
                'profesional_profile' => $profesional_profile,
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
            if($updateData){
            
                $avatar->move(ROOTPATH . 'public/backend/media/admin_images', $newName);
                session()->setFlashdata('success', 'You have successfully updated you Profile Congratulations');
                return redirect()->to(base_url('creative/profileUpdateForm/'.$admin_id));
            }else{
               session()->setFlashdata('error', 'Admin Insert Failed');
                return redirect()->to(base_url('creative/profileUpdateForm/'.$admin_id))->withInput()->with('error', 'Error: Kindly check your data and try again');
            
                throw new \Exception();
            }

                }

        }
        }
    }