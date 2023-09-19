<?php
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\RolesModel;
use App\Models\SettingsModel;

class ConfigurationsController extends BaseController{
    protected $helpers = ['form'];

    public function viewSettingsPage(){

        $settingsModel = model(SettingsModel::class);
        $features = $settingsModel->getAllFeatures();
        $arrayFeatures = json_decode($features, true);

        if (isset($arrayFeatures[0]['features'])) {
            $features2 = json_decode($arrayFeatures[0]['features'], true);
        
         $array1 = $features2[0];
        $array2 = $features2[1];
        $array3 = $features2[2];
}
$data = [
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

    'first_name' => session('first_name'),
    'last_name' => session('last_name'),
    'avatar' => session('avatar'),
    'role' => session('role'),
    'title' => 'Pages Configurations',
    'errors' => []
];
        return view('backend/templates/admin_header', $data)
            . view('backend/Configurations', $data)
            . view('backend/templates/admin_footer');
    }

    public function featureConfigForm(){
        $settingsModel = model(SettingsModel::class);
        if($this->request->getMethod() === 'post'){
            $validations = [
                'feature_title1' => [
                    'babel' => 'feature_title1',
                    'rules'=> 'required'
                ],
                'feature_desc1' => [
                    'babel' => 'feature_desc1',
                    'rules'=> 'required'
                ],
                'feature_background1' => [
                    'babel' => 'feature_background1',
                    'rules'=> 'required'
                ],
                'feature_title2' => [
                    'babel' => 'feature_title2',
                    'rules'=> 'required'
                ],
                'feature_title3' => [
                    'babel' => 'feature_title3',
                    'rules'=> 'required'
                ],
                'feature_desc2' => [
                    'label' => 'feature_desc2',
                    'rules' => 'required',
                ],
                'feature_desc3' => [
                    'babel' => 'feature_desc3',
                    'rules'=> 'required'
                ],
                'feature_background2' => [
                    'label' => 'feature_background2',
                    'rules' => 'required',
                ],
                'feature_background3' => [
                    'babel' => 'feature_background3',
                    'rules'=> 'required'
                ],
                'feature_icon1' => [
                    'babel' => 'feature_icon1',
                    'rules' => [
                        'uploaded[feature_icon1]',
                        'is_image[feature_icon1]',
                        'mime_in[feature_icon1,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    ]
                ],
                'feature_icon2' => [
                    'babel' => 'feature_icon2',
                    'rules' => [
                        'uploaded[feature_icon2]',
                        'is_image[feature_icon2]',
                        'mime_in[feature_icon2,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    ]
                ],
                'feature_icon3' => [
                    'babel' => 'feature_icon3',
                    'rules' => [
                        'uploaded[feature_icon3]',
                        'is_image[feature_icon3]',
                        'mime_in[feature_icon3,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    ]
                ],
            ];

            if(!$this->validate($validations)){

                $errors = $this->validator->getErrors();
                       foreach($errors as $error){
                       return redirect()->back()->withInput()->with('error', $error);
                   }
               }else{

            $feature_title1 = $this->request->getPost('feature_title1');
            $feature_desc1 = $this->request->getPost('feature_desc1');
            $feature_background1 = $this->request->getPost('feature_background1');
            $feature_icon1 = $this->request->getFile('feature_icon1');

            $icon1 = $feature_icon1->getRandomName();

            $feature_title2 = $this->request->getPost('feature_title2');
            $feature_desc2 = $this->request->getPost('feature_desc2');
            $feature_background2 = $this->request->getPost('feature_background2');
            $feature_icon2 = $this->request->getFile('feature_icon2');

            $icon2 = $feature_icon2->getRandomName();

            $feature_title3 = $this->request->getPost('feature_title3');
            $feature_desc3 = $this->request->getPost('feature_desc3');
            $feature_background3 = $this->request->getPost('feature_background3');
            $feature_icon3 = $this->request->getFile('feature_icon3');

            $icon3 = $feature_icon3->getRandomName();

            $updatedData =[
                [
                    'feature_title1' => $feature_title1,
                    'feature_desc1' => $feature_desc1,
                    'feature_background1' => $feature_background1,
                    'feature_icon1' => $icon1,
                ],
                [
                    'feature_title2' => $feature_title2,
                    'feature_desc2' => $feature_desc2,
                    'feature_background2' => $feature_background2,
                    'feature_icon2' => $icon2,
                ],
                [
                    'feature_title3' => $feature_title3,
                    'feature_desc3' => $feature_desc3,
                    'feature_background3' => $feature_background3,
                    'feature_icon3' => $icon3,
                ],
            ];

            $updateFeatures = $settingsModel->updateFeatures(1, $updatedData);
            if($updateFeatures){
                $feature_icon1->move(ROOTPATH . 'public/backend/media/feature_icons/icon1', $icon1);
                $feature_icon2->move(ROOTPATH . 'public/backend/media/feature_icons/icon2', $icon2);
                $feature_icon3->move(ROOTPATH . 'public/backend/media/feature_icons/icon3', $icon3);

                session()->setFlashdata('success', 'Features Updated successful');
                return redirect()->to(base_url('creative/configurations'));
            }else{
               session()->setFlashdata('error', 'Updates Failed');
                return redirect()->to(base_url('creative/configurations'))->withInput()->with('error', 'Error: Kindly check your data and try again');
            }
               }
        }
    }
}