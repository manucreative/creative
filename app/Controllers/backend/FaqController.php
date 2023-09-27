<?php
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\FagModel;

class FaqController extends BaseController{

    protected $helpers = ['form'];
    public function addFaqs(){

        $data = [
            'first_name' => session('first_name'),
            'admin_id' => session('admin_id'),
            'last_name' => session('last_name'),
            'avatar' => session('avatar'),
            'role' => session('role'),
            'title' => 'Add FAQ',
            'errors' => []
        ];
        return view('backend/templates/admin_header', $data)
            . view('backend/addFaq', $data)
            . view('backend/templates/admin_footer');
    }

    public function addFaqAction(){
        $faqModel = model(FagModel::class);
        if($this->request->getMethod() === 'post'){
            $validations = [
                'faq_question' => [
                    'label' => 'faq question',
                    'rules' => 'required',
                ],
                'faq_answer' => [
                    'label' => 'faq answer',
                    'rules' => 'required',
                ],
            ];
            if(!$this->validate($validations)){
                $errors = $this->validator->getErrors();
                    foreach($errors as $error){
                    return redirect()->back()->withInput()->with('error', $error);
                }
            }else{
                try{
                $faqQuestion = $this->request->getPost('faq_question');
                $faqAnswer = $this->request->getPost('faq_answer');

                $PostData =[
                    'faq_question' => $faqQuestion,
                    'faq_answer' => $faqAnswer,
                    'created_at' => date('Y-m-d H:i:s')
                ];

                $insertData = $faqModel->insertFaq($PostData);
                if($insertData){
                    session()->setFlashdata('success', '1 Faq Inserted successful');
                    return redirect()->to(base_url('creative/addFaqs'));
                }else{
                //    session()->setFlashdata('error', 'Faq Insert Failed');
                    return redirect()->to(base_url('creative/addFaqs'))->withInput()->with('error', 'Error: Kindly check your data and try again');
                
                    throw new \Exception();
                }
            }catch(\Exception $e){
                echo "error:". $e->getMessage();
            }
            }
        }
        
    }
}