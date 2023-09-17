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
            $rolesModel = model(RolesModel::class);
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
               // session()->setFlashdata('error', 'Admin Insert Failed');
                return redirect()->to(base_url('creative/addAdminForm'))->withInput()->with('error', 'Error: Kindly check your data and try again');
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
    }