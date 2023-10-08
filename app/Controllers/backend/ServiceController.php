<?php
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\ServiceModel;

class ServiceController extends BaseController{

    protected $helpers = ['form'];
    public function addServiceForm($key){
        $session_key = session('session_key');
        if($key !== $session_key){
            return redirect()->back();
        }else{
        $service_key = bin2hex(random_bytes(8));
        $data = [
            'first_name' => session('first_name'),
            'admin_id' => session('admin_id'),
            'last_name' => session('last_name'),
            'avatar' => session('avatar'),
            'session_key' =>session('session_key'),
            'role' => session('role'),
            'service_key' => $service_key,
            'title' => 'Add Service',
            'errors' => []
        ];
        return view('backend/templates/admin_header', $data)
            . view('backend/addServiceForm', $data)
            . view('backend/templates/admin_footer');
        }
    }

    public function addService($key){
        $session_key = session('session_key');
        if($key !== $session_key){
            return redirect()->back();
        }else{
        $serviceModel = model(ServiceModel::class);

        if($this->request->getMethod() === 'post'){
            $validations = [
                'service_title' => [
                    'label' => 'service title is',
                    'rules' => 'required',
                ],
                'service_key' => [
                    'label' => 'service Key is',
                    'rules' => 'required',
                ],
                'owner' => [
                    'label' => 'orner is',
                    'rules' => 'required',
                ],
                'service_short_content' => [
                    'label' => 'service short content is',
                    'rules' => 'required',
                ],
                'service_main_content' => [
                    'label' => 'service main content is',
                    'rules' => 'required',
                ],
                'service_img' => [
                    'babel' => 'service Image',
                    'rules' => [
                        'uploaded[service_img]',
                        'is_image[service_img]',
                        'mime_in[service_img,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    ]
                ],
            ];
            if(!$this->validate($validations)){
                $errors = $this->validator->getErrors();
                    foreach($errors as $error){
                    return redirect()->back()->withInput()->with('error', $error);
                }
            }else{

                $service_key = $this->request->getPost('service_key');
                $owner = $this->request->getPost('owner');
                $service_title = $this->request->getPost('service_title');
                $service_short_content = $this->request->getPost('service_short_content');
                $service_main_content = $this->request->getPost('service_main_content');
                $service_img = $this->request->getFile('service_img');

                $ranName = $service_img->getRandomName();

                $dataToInsert =[
                    'service_title' => $service_title,
                    'owner' => $owner,
                    'service_key' => $service_key,
                    'service_short_content' => $service_short_content,
                    'service_main_content' => $service_main_content,
                    'service_img' => $ranName,
                    'created_at' => date('Y-m-d H:i:s')
                ];

                $runQuery = $serviceModel->insertServices($dataToInsert);
                if($runQuery){
                    $service_img->move(ROOTPATH . 'public/backend/media/service_images', $ranName);
                    session()->setFlashdata('success', '1 Service Insert successful');
                    return redirect()->to(base_url('creative/admin/addServiceForm/index/key/'.$key));
                }else{
                //    session()->setFlashdata('error', 'Service Insert Failed');
                    return redirect()->to(base_url('creative/admin/addServiceForm/index/key/'.$key))->withInput()->with('error', 'Error: Kindly check your data and try again');
                
                    throw new \Exception();
                }
    
            }
        }
    }
}

    public function viewServices($key){
        $session_key = session('session_key');
        if($key !== $session_key){
            return redirect()->back();
        }else{
        $servicesModel = model(ServiceModel::class);
        $i = 1;
        $data=[
        'services' => $servicesModel->getServices(),
        'first_name' => session('first_name'),
        'admin_id' => session('admin_id'),
        'last_name' => session('last_name'),
        'session_key' =>session('session_key'),
        'token' => session('adminToken'),
        'avatar' => session('avatar'),
        'role' => session('role'),
        'i'=> $i,
        'title' => 'Viewing all Service'
    ];
    return view('backend/templates/admin_header', $data)
        . view('backend/viewAllServices', $data)
        . view('backend/templates/admin_footer');
}
    }

    public function viewIndividualService($key){
        $session_key = session('session_key');
        if($key !== $session_key){
            return redirect()->back();
        }else{
        $servicesModel = model(ServiceModel::class);
        $owner = session('admin_id');
        $i = 1;
        $data=[
        'services' => $servicesModel->getOwnerService($owner),
        'first_name' => session('first_name'),
        'admin_id' => session('admin_id'),
        'last_name' => session('last_name'),
        'session_key' =>session('session_key'),
        'token' => session('adminToken'),
        'avatar' => session('avatar'),
        'role' => session('role'),
        'i'=> $i,
        'title' => 'Viewing all Service'
    ];
        //  echo '<pre>';
        // print_r($servicesModel->getOwnerService($owner));
        // echo '</pre>';
    return view('backend/templates/admin_header', $data)
        . view('backend/viewIndividualService', $data)
        . view('backend/templates/admin_footer');
}
    }

    public function updateServiceForm($key,$service_key){
        $token = $this->request->getGet('token');
        $adminToken = session('adminToken');
        $session_key = session('session_key');

        if($key !== $session_key){
            return redirect()->back();
        }elseif($token !== $adminToken){
             return redirect()->back();
        }
        else{

        $servicesModel = model(ServiceModel::class);
        $service = $servicesModel->getServices($service_key);
            $service_id = $service['service_id'];
            $service_key = $service['service_key'];
            $serviceTitle = $service['service_title'];
            $shortContent = $service['service_short_content'];
            $mainContent = $service['service_main_content'];
            $service_img = $service['service_img'];

        $data = [
            'service_id' => $service_id,
            'service_key' => $service['service_key'],
            'service_title' => $serviceTitle,
            'service_short_content' => $shortContent,
            'service_main_content' => $mainContent,
            'service_img' => $service_img,

            'first_name' => session('first_name'),
            'admin_id' => session('admin_id'),
            'last_name' => session('last_name'),
            'avatar' => session('avatar'),
            'role' => session('role'),
            'session_key' => session('session_key'),
            'token' => session('adminToken'),
            'title' => 'Add Service',
            'errors' => []
        ];
        return view('backend/templates/admin_header', $data)
            . view('backend/updateServiceForm', $data)
            . view('backend/templates/admin_footer');
    }
}
    public function updateService($key){
        $session_key = session('session_key');
        $adminToken = session('adminToken');
        if($key !== $session_key){
            return redirect()->back();
        }else{

        $serviceModel = model(ServiceModel::class);
        $service_id = $this->request->getPost('service_id');
        $service_key = $this->request->getPost('service_key');
        if($this->request->getMethod() === 'post'){
            $validations = [
                'service_title' => [
                    'label' => 'service title is',
                    'rules' => 'required',
                ],
                'service_short_content' => [
                    'label' => 'service short content is',
                    'rules' => 'required',
                ],
                'service_main_content' => [
                    'label' => 'service main content is',
                    'rules' => 'required',
                ],
                'service_img' => [
                    'babel' => 'service Image',
                    'rules' => [
                        'uploaded[service_img]',
                        'is_image[service_img]',
                        'mime_in[service_img,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    ]
                ],
            ];
            if(!$this->validate($validations)){
                $errors = $this->validator->getErrors();
                    foreach($errors as $error){
                    return redirect()->back()->withInput()->with('error', $error);
                }
            }else{
                $service_title = $this->request->getPost('service_title');
                $service_short_content = $this->request->getPost('service_short_content');
                $service_main_content = $this->request->getPost('service_main_content');
                $service_img = $this->request->getFile('service_img');

                $ranName = $service_img->getRandomName();

                $dataToInsert =[
                    'service_title' => $service_title,
                    'service_short_content' => $service_short_content,
                    'service_main_content' => $service_main_content,
                    'service_img' => $ranName,
                    'created_at' => date('Y-m-d H:i:s')
                ];

                $runQuery = $serviceModel->updateServices($service_id, $dataToInsert);
                if($runQuery){
                    $service_img->move(ROOTPATH . 'public/backend/media/service_images', $ranName);
                    session()->setFlashdata('success', 'Service Updated successful');
                    return redirect()->to(base_url('creative/admin/updateServiceForm/index/key/'.$key.'/'.$service_key.'?token='.$adminToken));
                }else{
                   session()->setFlashdata('error', 'update Insert Failed');
                    return redirect()->to(base_url('creative/admin/updateServiceForm/index/key/'.$key.'/'.$service_key.'?token='.$adminToken))->withInput()->with('error', 'Error: Kindly check your data and try again');
                
                    throw new \Exception();
                }
    
            }
        }
    }
}

    public function deleteServices($key){
        $session_key = session('session_key');
        if($key !== $session_key){
            return redirect()->back();
        }else{

        if($this->request->getMethod() === 'post' && $this->request->getPost('ids')){
            $ids = explode(',', $this->request->getPost('ids'));
            $serviceModel = model(ServiceModel::class);

            $delete = $serviceModel->deleteService($ids);

            if ($delete === true) {
                $deletedCount = count($ids);
                $message = "A total of $deletedCount Service(s) have been deleted.";
				echo '<span style="background-color: green; color:black; padding:10px">' . $message .'</span>';
                sleep(3);
			}
            else {

				echo '<span style="background-color: red; color:black; padding:10px;">Something went wrong during service deletion</span>';
			}
        }else{
            echo '<span style="background-color: red; color:black; padding:10px;">You must select at least one row for deletion</span>';
        }
    }
}
}