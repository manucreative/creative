<?php
namespace App\Controllers\backend;
use App\Controllers\BaseController;
use App\Models\FaqModel;

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
        $faqModel = model(FaqModel::class);
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

    public function viewFaqs(){
        $faqModel = model(FaqModel::class);
        $i = 1;
        $data = [
            'first_name' => session('first_name'),
            'admin_id' => session('admin_id'),
            'last_name' => session('last_name'),
            'avatar' => session('avatar'),
            'role' => session('role'),
            'faqs' => $faqModel->getFaq(),
            'title' => 'View All FAQs',
            'i' => $i,
            'errors' => []
        ];
        return view('backend/templates/admin_header', $data)
            . view('backend/viewFaqs', $data)
            . view('backend/templates/admin_footer');

    }

    public function updateFaqForm($faq_id){
        $faqModel = model(FaqModel::class);

        $data = [
            'first_name' => session('first_name'),
            'admin_id' => session('admin_id'),
            'last_name' => session('last_name'),
            'avatar' => session('avatar'),
            'role' => session('role'),
            'faq' => $faqModel->getFaq($faq_id),
            'title' => 'Add FAQ',
            'errors' => []
        ];
        return view('backend/templates/admin_header', $data)
            . view('backend/updateFaqForm', $data)
            . view('backend/templates/admin_footer');
    }


    public function updateFaq(){
        $faqModel = model(FaqModel::class);
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
                $faqId = $this->request->getPost('faq_id');
                $faqQuestion = $this->request->getPost('faq_question');
                $faqAnswer = $this->request->getPost('faq_answer');

                $PostData =[
                    'faq_question' => $faqQuestion,
                    'faq_answer' => $faqAnswer,
                    'created_at' => date('Y-m-d H:i:s')
                ];

                $insertData = $faqModel->updateFaqs($faqId, $PostData);
                if($insertData){
                    session()->setFlashdata('success', '1 Faq Updated successful');
                    return redirect()->to(base_url('creative/updateFaqForm/'. $faqId));
                }else{
                    return redirect()->to(base_url('creative/updateFaqForm/'. $faqId))->withInput()->with('error', 'Error: Kindly check your data and try again');
                
                    throw new \Exception();
                }
            }catch(\Exception $e){
                echo "error:". $e->getMessage();
            }
            }
        }
    }


    public function deleteFaqs(){
        if($this->request->getMethod() === 'post' && $this->request->getPost('ids')){
            $ids = explode(',', $this->request->getPost('ids'));
            $faqModel = model(FaqModel::class);

            $delete = $faqModel->deleteFaqs($ids);

            if ($delete === true) {
                $deletedCount = count($ids);
                $message = "A total of $deletedCount FAQ(s) have been deleted.";
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