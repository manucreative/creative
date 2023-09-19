<?php
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\ServiceModel;

class ServiceController extends BaseController{

    protected $helpers = ['form'];
    public function addServiceForm(){

        $data = [
            'first_name' => session('first_name'),
            'last_name' => session('last_name'),
            'avatar' => session('avatar'),
            'role' => session('role'),
            'title' => 'Add Service',
            'errors' => []
        ];
        return view('backend/templates/admin_header', $data)
            . view('backend/addServiceForm', $data)
            . view('backend/templates/admin_footer');
    }

    public function addService(){
        $serviceModel = model(ServiceModel::class);

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

                $runQuery = $serviceModel->insertServices($dataToInsert);
                if($runQuery){
                    $service_img->move(ROOTPATH . 'public/backend/media/service_images', $ranName);
                    session()->setFlashdata('success', '1 Service Insert successful');
                    return redirect()->to(base_url('creative/addServiceForm'));
                }else{
                   session()->setFlashdata('error', 'Service Insert Failed');
                    return redirect()->to(base_url('creative/addServiceForm'))->withInput()->with('error', 'Error: Kindly check your data and try again');
                
                    throw new \Exception();
                }
    
            }
        }
    }

    public function viewServices(){

    }

    public function updateServiceForm($service_id){
        $servicesModel = model(ServiceModel::class);

        $service = $servicesModel->getServices($service_id);
            $serviceTitle = $service['service_title'];
            $shortContent = $service['service_short_content'];
            $mainContent = $service['service_main_content'];
            $service_img = $service['service_img'];

        $data = [
            'service_title' => $serviceTitle,
            'service_short_content' => $shortContent,
            'service_main_content' => $mainContent,
            'service_img' => $service_img,

            'first_name' => session('first_name'),
            'last_name' => session('last_name'),
            'avatar' => session('avatar'),
            'role' => session('role'),
            'title' => 'Add Service',
            'errors' => []
        ];
        return view('backend/templates/admin_header', $data)
            . view('backend/updateServiceForm', $data)
            . view('backend/templates/admin_footer');
    }
}