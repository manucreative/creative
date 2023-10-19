<?php
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\RolesModel;
use App\Models\SettingsModel;
use App\Models\SocialMedia;

class ConfigurationsController extends BaseController{
    protected $helpers = ['form'];

    public function viewSettingsPage($key){
        $session_key = session('session_key');
        if($key !== $session_key){
            return redirect()->back();
        }else{

        $settingsModel = model(SettingsModel::class);
        $adminModel = model(AdminModel::class);
        $socialMedialModel = model(SocialMedia::class);
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
    'admin_id' => session('admin_id'),
    'last_name' => session('last_name'),
    'avatar' => session('avatar'),
    'role' => session('role'),
    'session_key' => session('session_key'),
    'token' => session('adminToken'),
    'title' => 'Pages Configurations',
    'users' => $adminModel->getAdminsUserName(),
    'socialMedia' => $socialMedialModel->getSocialMedia(session('admin_id')),
    'errors' => []
];
    //   echo '<pre>';
        // print_r($socialMedialModel->getSocialMedia(session('admin_id')));
        // echo '</pre>';
        return view('backend/templates/admin_header', $data)
            . view('backend/Configurations', $data)
            . view('backend/templates/admin_footer');
    }
    }

    public function socialMediaUpdates($key){
        $session_key = session('session_key');
        if($key !== $session_key){
            return redirect()->back();
        }else{
            $socialMediaModel = model(SocialMedia::class);
            if($this->request->getMethod() === 'post'){


                $facebook = $this->request->getPost('facebook');
                $instagram = $this->request->getPost('instagram');
                $tweeter = $this->request->getPost('tweeter');
                $whatsApp = $this->request->getPost('whatsApp');
                $tiktok = $this->request->getPost('tiktok');
                $youtube = $this->request->getPost('youtube');
                $linkedin = $this->request->getPost('linkedin');
                $telegram = $this->request->getPost('telegram');

                $owner_id = $this->request->getPost('owner');
                $socialData = $socialMediaModel->getSocialMedia($owner_id);
                $socialMediaId = $socialData['social_media_id']?? '';
                $updatedData =[
                        'facebook' => $facebook,
                        'instagram' => $instagram,
                        'tweeter' => $tweeter,
                        'whatsApp' => $whatsApp,
                        'tiktok' => $tiktok,
                        'youtube' => $youtube,
                        'linkedin' => $linkedin,
                        'telegram' => $telegram,
                        'created_at' => date('Y-m-d H:i:s')
                    ];

            $updateSocialMedia = $socialMediaModel->insertUpdateSocialMedia($socialMediaId, $owner_id, $updatedData);
            if($updateSocialMedia){

                return redirect()->back()->withInput()->with('success', 'You have successfully updated your Social Media');

            }else{

               return redirect()->back()->withInput()->with('error', 'Social media update Failed');
            }
            }

        }
    }

    public function featureConfigForm($key){
        $session_key = session('session_key');
        if($key !== $session_key){
            return redirect()->back();
        }else{

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
                return redirect()->to(base_url('creative/admin/configurations/index/key/'.$key));
            }else{
               session()->setFlashdata('error', 'Updates Failed');
                return redirect()->to(base_url('creative/admin/configurations/index/key/'.$key))->withInput()->with('error', 'Error: Kindly check your data and try again');
            }
               }
        }
    }
    }

    public function updateProfiler($key){
        $session_key = session('session_key');
        if($key !== $session_key){
            return redirect()->back();
        }else{

        $configModels = model(SettingsModel::class);
        if($this->request->getMethod() === 'post'){
            $validations = [
                'display_profile' => [
                    'babel' => 'display_profile',
                    'rules'=> 'required'
                ],
            ];
            if(!$this->validate($validations)){

                $errors = $this->validator->getErrors();
                       foreach($errors as $error){
                       return redirect()->back()->withInput()->with('error', $error);
                   }
               }else{
                $dataUpdates =[
                    'display_profile' => $this->request->getPost('display_profile')
                ];

                $runUpdate = $configModels->updateProfileDisplay(1,$dataUpdates);
                if($runUpdate){
                    session()->setFlashdata('success', 'Profiler have been Updated successful');
                    return redirect()->to(base_url('creative/admin/configurations/index/key/'.$key));
                }else{
                   session()->setFlashdata('error', 'Updates Failed');
                    return redirect()->to(base_url('creative/admin/configurations/index/key/'.$key))->withInput()->with('error', 'Error: Kindly check your data and try again');
                }
               }
        }
    }
}
}