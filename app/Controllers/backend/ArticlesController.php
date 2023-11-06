<?php

namespace App\Controllers\backend;

use App\Controllers\BaseController;
use App\Models\ActivationModel;
use App\Models\ArticleCatModel;
use App\Models\ArticlesModel;

class ArticlesController extends BaseController
{
    protected $helpers = ['form'];
    public function addArticleForm($key)
    {
        $session_key = session('session_key');
        if($key !== $session_key){
            return redirect()->back();
        }else{
        $activationModel = model(ActivationModel::class);
        $categoryModel = model(ArticleCatModel::class);
        $article_key = bin2hex(random_bytes(8));
        $data = [
            'first_name' => session('first_name'),
            'activations' => $activationModel->getActivations(),
            'categories' => $categoryModel->getArticlesCategories(),
            'admin_id' => session('admin_id'),
            'last_name' => session('last_name'),
            'token' => session('adminToken'),
            'avatar' => session('avatar'),
            'session_key' =>session('session_key'),
            'role' => session('role'),
            'article_key' => $article_key,
            'title' => 'Add Service',
            'errors' => []
        ];
        return view('backend/templates/admin_header', $data)
            . view('backend/addArticleForm', $data)
            . view('backend/templates/admin_footer');
        }
    }

    public function addArticle($key)
    {
        $session_key = session('session_key');
        if($key !== $session_key){
            return redirect()->back();
        }else{
        $articleModel = model(ArticlesModel::class);

        if($this->request->getMethod() === 'post'){
            $validations = [
                'article_title' => [
                    'label' => 'Article title',
                    'rules' => 'required',
                ],
                'article_key' => [
                    'label' => 'article Key',
                    'rules' => 'required',
                ],
                'owner' => [
                    'label' => 'article orner',
                    'rules' => 'required',
                ],
                'modifier' => [
                    'label' => 'modifier',
                    'rules' => 'required',
                ],
                'short_content' => [
                    'label' => 'short content',
                    'rules' => 'required',
                ],
                'article_content' => [
                    'label' => 'article content',
                    'rules' => 'required',
                ],
                'category' => [
                    'label' => 'category',
                    'rules' => 'required',
                ],
            ];
            if(!$this->validate($validations)){
                $errors = $this->validator->getErrors();
                    foreach($errors as $error){
                    return redirect()->back()->withInput()->with('error', $error);
                }
            }else{

                $active_id = $this->request->getPost('activation_id');
                $article_key = $this->request->getPost('article_key');
                $owner = $this->request->getPost('owner');
                $modifier = $this->request->getPost('modifier');
                $article_title = $this->request->getPost('article_title');
                $short_content = $this->request->getPost('short_content');
                $article_content = $this->request->getPost('article_content');
                $cat_id = $this->request->getPost('cat_id');
                $article_img = $this->request->getFile('article_img');

                if ($article_img->isValid()&& $article_img->isFile() && in_array($article_img->getMimeType(), ['image/jpg', 'image/jpeg', 'image/gif', 'image/png', 'image/webp'])) {
                    $newName = $article_img->getRandomName();
                    $article_img->move(ROOTPATH . 'public/backend/media/article_images', $newName);
    
                } else {
    
                    // Use a default image
                    $defaultImagePath = ROOTPATH . 'public/backend/assets/img/user.png';
                    $randString = rand(1000,10000000);
                    $newFile = ROOTPATH . 'public/backend/media/article_images/'.$randString.'.png';
    
                    // Check if the default image exists
                    if (file_exists($defaultImagePath)) {
                        copy($defaultImagePath, $newFile);
    
                    }
    
                    $newName = $randString.'.png';
    
                }

                $dataToInsert =[
                    'activation_id' => $active_id,
                    'article_title' => $article_title,
                    'owner' => $owner,
                    'modifier' => $modifier,
                    'article_key' => $article_key,
                    'short_content' => $short_content,
                    'article_content' => $article_content,
                    'cat_id' => $cat_id,
                    'article_img' => $newName,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                $runQuery = $articleModel->addArticle($dataToInsert);
                if($runQuery){
                    return redirect()->back()->withInput()->with('success', '1 Article has been Inserted successful');
                }else{
                return redirect()->back()->withInput()->with('error', 'Error: Kindly check your data and try again');
                
                    throw new \Exception();
                }
    
            }
        }
    }
    }

    public function deleteArticles($key)
    {
        //
    }

    public function updateArticlesForm($key, $article_key)
    {
        //
    }

    public function viewArticles($key)
    {
        $session_key = session()->get('session_key');
        if($key !== $session_key){
            return redirect()->back();
        }else{
        $articles = model(ArticlesModel::class);
        $allArticles = $articles->getArticles();
 
         $data = [
             'first_name' => session('first_name'),
             'admin_id' => session('admin_id'),
             'last_name' => session('last_name'),
             'avatar' => session('avatar'),
             'role' => session('role'),
             'session_key' => session('session_key'),
             'token' => session('adminToken'),
             'articles' => $allArticles,
             'title' => 'All Articles',
             'i' => $i = 1
         ];
 
         return view('backend/templates/admin_header', $data)
              . view('backend/viewAllArticles', $data)
              . view('backend/templates/admin_footer');
    }
}

    public function viewOwnerArticles($key)
    {
        $session_key = session('session_key');
        if($key !== $session_key){
            return redirect()->back();
        }else{
            $articles = model(ArticlesModel::class);
            $owner = session('admin_id');
            $allArticles = $articles->getArticles(false, $owner);
       
        $i = 1;
        $data=[
        'articles' => $allArticles,
        'first_name' => session('first_name'),
        'admin_id' => session('admin_id'),
        'last_name' => session('last_name'),
        'session_key' =>session('session_key'),
        'token' => session('adminToken'),
        'avatar' => session('avatar'),
        'role' => session('role'),
        'i'=> $i,
        'title' => 'Viewing my Articles'
    ];
        //  echo '<pre>';
        // print_r($servicesModel->getOwnerService($owner));
        // echo '</pre>';
    return view('backend/templates/admin_header', $data)
        . view('backend/viewAllArticles', $data)
        . view('backend/templates/admin_footer');
}
    }

    public function updateArticle($key)
    {
        //
    }
}
