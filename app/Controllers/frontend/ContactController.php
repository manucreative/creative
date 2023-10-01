<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;
use App\Models\FaqModel;

class ContactController extends BaseController{

    protected $helpers = ['form'];
    public function index(){
        $faqModel = model(FaqModel::class);
        $data = [
            'title' => 'Add FAQ',
            'errors' => [],
            'faqs' => $faqModel->getFaq(),
        ];

        return view('frontend/templates/header', $data)
            . view('frontend/contact', $data)
            . view('frontend/templates/footer');
    }

    public function sendMail(){
        if($this->request->getMethod() === 'post'){
            $validations = [
                'name' => [
                    'label' => ' name',
                    'rules' => 'required',
                ],
                'user_email' => [
                    'label' => 'email',
                    'rules' => 'required',
                ],
                'subject' => [
                    'label' => 'subject',
                    'rules' => 'required',
                ],
                'message' => [
                    'label' => 'message',
                    'rules' => 'required',
                ],
            ];

            if(!$this->validate($validations)){
                $errors = $this->validator->getErrors();
                    foreach($errors as $error){
                    return redirect()->back()->withInput()->with('error', $error);
                }
            }else{
                $name = $this->request->getPost('name');
                $user_email = $this->request->getPost('user_email');
                $subject = $this->request->getPost('subject');
                $message = $this->request->getPost('message');

                    $smtp_mail = \Config\Services::email();
                    $body = "You have received a new message from your website contact.<br><br>"
                            . "Here are the details:<br>"
                            . "Name: $name<br>"
                            . "Email: $user_email<br>"
                            . "Message:<br>$message";
                    $smtp_mail->setFrom( $user_email,$name,);
                    $smtp_mail->setTo(['emmanuelkirui34@gmail.com', 'manwiks2@gmail.com']);
                    $smtp_mail->setSubject($subject);
                    $smtp_mail->setMessage($body);
                    if($smtp_mail->send()){
                        session()->setFlashdata('success', 'Your Message has been send');
                        return redirect()->to(base_url('contact'));
                    }else{
                        $data = $smtp_mail->printDebugger(['headers']);
                        return redirect()->to(base_url('contact'))->withInput()->with('error', $data);

                        throw new \Exception();
                    }
            }

        }

    }
}