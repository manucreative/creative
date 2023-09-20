<?php
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\SliderModel;

class SliderController extends BaseController{

    protected $helpers = ['form'];
    public function addSliderContent(){

        $data = [
            'first_name' => session('first_name'),
            'last_name' => session('last_name'),
            'avatar' => session('avatar'),
            'role' => session('role'),
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
    'last_name' => session('last_name'),
    'avatar' => session('avatar'),
    'role' => session('role'),
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

        // $slider_id = $sliders['slider_id'];
        $sub_header = $sliders['sub_header'];
        $main_header = $sliders['main_header'];
        $short_desc = $sliders['short_desc'];
        $btn_mssage = $sliders['btn_mssage'];
        $slider_img = $sliders['slider_img'];

    $data = [
        'slider_id' => $slider_id,
        'sub_header' => $sub_header,
        'main_header' => $main_header,
        'short_desc' => $short_desc,
        'btn_mssage' => $btn_mssage,
        'slider_img' => $slider_img,

        'first_name' => session('first_name'),
        'last_name' => session('last_name'),
        'avatar' => session('avatar'),
        'role' => session('role'),
        'title' => 'Add Service',
        'errors' => []
    ];
    return view('backend/templates/admin_header', $data)
        . view('backend/updateSliderForm', $data)
        . view('backend/templates/admin_footer');
   }

//    public function updateSlider(){

//    }

//    public function deleteSliders(){

//    }
}