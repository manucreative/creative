<?php
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\SliderModel;

class SliderController extends BaseController{

    protected $helpers = ['form'];
    public function addSliderContent(){

        $data = [
            'first_name' => session('first_name'),
            'admin_id' => session('admin_id'),
            'last_name' => session('last_name'),
            'avatar' => session('avatar'),
            'role' => session('role'),
            'session_key' => session('session_key'),
            'title' => 'Manuu Creative Dashboard',
            'errors' => []
        ];
        return view('backend/templates/admin_header', $data)
            . view('backend/addSlider_view', $data)
            . view('backend/templates/admin_footer');
    }

    public function addSliderAction(){
        $sliderModel = model(SliderModel::class);
        if($this->request->getMethod() === 'post'){
            $validations = [
                'sub_header' => [
                    'babel' => 'sub_header',
                    'rules'=> 'required'
                ],
                'main_header' => [
                    'babel' => 'main_header',
                    'rules'=> 'required'
                ],
                'short_desc' => [
                    'babel' => 'short_desc',
                    'rules'=> 'required'
                ],
                'btn_mssage' => [
                    'babel' => 'btn_mssage',
                    'rules'=> 'required'
                ],
                'slider_img' => [
                    'babel' => 'slider_img',
                    'rules' => [
                        'uploaded[slider_img]',
                        'is_image[slider_img]',
                        'mime_in[slider_img,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    ]
                ],
            ];
            if(!$this->validate($validations)){

                $errors = $this->validator->getErrors();
                       foreach($errors as $error){
                       return redirect()->back()->withInput()->with('error', $error);
                   }
               }else{

            $sub_header = $this->request->getPost('sub_header');
            $main_header = $this->request->getPost('main_header');
            $short_desc = $this->request->getPost('short_desc');
            $btn_mssage = $this->request->getPost('btn_mssage');
            $slider_img = $this->request->getFile('slider_img');

            $newImgName = $slider_img->getRandomName();

            $sliderData =[
            'sub_header' => $sub_header,
            'main_header'=> $main_header,
            'short_desc'=> $short_desc,
            'btn_mssage'=> $btn_mssage,
            'slider_img' => $newImgName,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $insertData = $sliderModel->insertSliders($sliderData);
        if($insertData){
            $slider_img->move(ROOTPATH . 'public/backend/media/slider_images', $newImgName);
            session()->setFlashdata('success', '1 Slider has been Insert successful');
            return redirect()->to(base_url('creative/addSliderContent'));
        }else{
           session()->setFlashdata('error', 'Slider Insert Failed');
            return redirect()->to(base_url('creative/addSliderContent'))->withInput()->with('error', 'Error: Kindly check your data and try again');
        
        }
    }

        }
    }
   public function viewSliders(){
    $sliderModel = model(SliderModel::class);
    $i = 1;
    $data=[
    'sliders' => $sliderModel->getSliders(),
    'first_name' => session('first_name'),
    'admin_id' => session('admin_id'),
    'last_name' => session('last_name'),
    'avatar' => session('avatar'),
    'role' => session('role'),
    'session_key' => session('session_key'),
    'i'=> $i,
    'title' => 'Viewing all Sliders'
];
return view('backend/templates/admin_header', $data)
    . view('backend/viewAllSliders', $data)
    . view('backend/templates/admin_footer');
   }

   
   public function updateSliderForm($slider_id){
    $sliderModel = model(SliderModel::class);

    $sliders = $sliderModel->getSliders($slider_id);

         $sliderId = $sliders['slider_id'];
        $subHeader = $sliders['sub_header'];
        $mainHeader = $sliders['main_header'];
        $shortDesc = $sliders['short_desc'];
        $btnMssage = $sliders['btn_mssage'];
        $sliderImg = $sliders['slider_img'];

    $data = [
        'slider_id' => $sliderId,
        'sub_header' => $subHeader,
        'main_header' => $mainHeader,
        'short_desc' => $shortDesc,
        'btn_mssage' => $btnMssage,
        'slider_img' => $sliderImg,

        'first_name' => session('first_name'),
        'admin_id' => session('admin_id'),
        'last_name' => session('last_name'),
        'avatar' => session('avatar'),
        'role' => session('role'),
        'session_key' => session('session_key'),
        'title' => 'Update Slider',
        'errors' => []
    ];
    return view('backend/templates/admin_header', $data)
        . view('backend/updateSliderForm', $data)
        . view('backend/templates/admin_footer');
   }

   public function updateSlider(){
    $sliderModel = model(SliderModel::class);
    if($this->request->getMethod() === 'post'){
        $validations = [
            'sub_header' => [
                'babel' => 'sub_header',
                'rules'=> 'required'
            ],
            'main_header' => [
                'babel' => 'main_header',
                'rules'=> 'required'
            ],
            'short_desc' => [
                'babel' => 'short_desc',
                'rules'=> 'required'
            ],
            'btn_mssage' => [
                'babel' => 'btn_mssage',
                'rules'=> 'required'
            ],
            'slider_img' => [
                'babel' => 'slider_img',
                'rules' => [
                    'uploaded[slider_img]',
                    'is_image[slider_img]',
                    'mime_in[slider_img,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                ]
            ],
        ];
        if(!$this->validate($validations)){

            $errors = $this->validator->getErrors();
                   foreach($errors as $error){
                   return redirect()->back()->withInput()->with('error', $error);
               }
           }else{

        $slider_id = $this->request->getPost('slider_id');
        $sub_header = $this->request->getPost('sub_header');
        $main_header = $this->request->getPost('main_header');
        $short_desc = $this->request->getPost('short_desc');
        $btn_mssage = $this->request->getPost('btn_mssage');
        $slider_img = $this->request->getFile('slider_img');

        $newImgName = $slider_img->getRandomName();

        $sliderData =[
        'sub_header' => $sub_header,
        'main_header'=> $main_header,
        'short_desc'=> $short_desc,
        'btn_mssage'=> $btn_mssage,
        'slider_img' => $newImgName,
        'created_at' => date('Y-m-d H:i:s')
    ];

    $updateData = $sliderModel->updateSliders($slider_id, $sliderData);
    if($updateData){
        $slider_img->move(ROOTPATH . 'public/backend/media/slider_images', $newImgName);
        session()->setFlashdata('success', 'Slider has been updated successful');
        return redirect()->to(base_url('creative/updateSliderForm/'.$slider_id));
    }else{
       session()->setFlashdata('error', 'Slider Insert Failed');
        return redirect()->back()->withInput()->with('error', 'Error: Kindly check your data and try again');
    }
    }
    }
    }
   public function deleteSliders(){
    if($this->request->getMethod() === 'post' && $this->request->getPost('ids')){
        $ids = explode(',', $this->request->getPost('ids'));
        $sliderModel = model(SliderModel::class);

        $delete = $sliderModel->deleteSliders($ids);

        if ($delete === true) {
            $deletedCount = count($ids);
            $message = "A total of $deletedCount Slider(s) have been deleted.";
            echo '<span style="background-color: green; color:black; padding:10px">' . $message .'</span>';
            sleep(3);
        }
        else {

            echo '<span style="background-color: red; color:black; padding:10px;">Something went wrong during slider deletion</span>';
        }
    }else{
        echo '<span style="background-color: red; color:black; padding:10px;">You must select at least one row for deletion</span>';
    }
   }
}