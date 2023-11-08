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
                'short_content' => [
                    'label' => 'short content',
                    'rules' => 'required',
                ],
                'article_content' => [
                    'label' => 'article content',
                    'rules' => 'required',
                ],
                'cat_id' => [
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
                $owner = session()->get('admin_id');
                $modifier = session()->get('admin_id');
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
                    'author_id' => session('admin_id'),
                    'modifier_id' => session('admin_id'),
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
                    return redirect()->to(base_url('creative/admin/addArticleForm/index/key/'.$key))->with('success', '1 Article has been Inserted successful');
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
        $session_key = session('session_key');
        if($key !== $session_key){
            return redirect()->back();
        }else{

        if($this->request->getMethod() === 'post' && $this->request->getPost('ids')){
            $ids = explode(',', $this->request->getPost('ids'));
            $articlesModel = model(ArticlesModel::class);

            $delete = $articlesModel->deleteArticles($ids);

            if ($delete === true) {
                $deletedCount = count($ids);
                $message = "A total of $deletedCount Articles(s) have been deleted.";
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

    public function updateArticlesForm($key, $article_key)
    {
        $token = $this->request->getGet('token');
        $adminToken = session('adminToken');
        $session_key = session('session_key');
       

        if($key !== $session_key){
            return redirect()->back();
        }elseif($token !== $adminToken){
             return redirect()->back();
        }

        else{
        $activationModel = model(ActivationModel::class);
        $articleModel = model(ArticlesModel::class);
        $articleCatModel = model(ArticleCatModel::class);


        $article = $articleModel->getArticles( $article_key, false);
            $article_id = $article['article_id'];
            $article_key = $article['article_key'];
            $article_title = $article['article_title'];
            $short_content = $article['short_content'];
            $article_content = $article['article_content'];

            $article_img = $article['article_img'];

            $currentActivationId = $article['activation_id'];
            $currentCatId = $article['cat_id'];
        $data = [
            'article_id' => $article_id,
            'activations' => $activationModel->getActivations(),
            'categories' => $articleCatModel->getArticlesCategories(),
            'currentActivationId' =>$currentActivationId,
            'currentCatId' => $currentCatId,
            'article_key' => $article_key,
            'article_title' => $article_title,
            'short_content' => $short_content,
            'article_content' => $article_content,
            'article_img' => $article_img,

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
            . view('backend/updateArticlesForm', $data)
            . view('backend/templates/admin_footer');
    }
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
        $session_key = session('session_key');
        $adminToken = session('adminToken');
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
               
                'short_content' => [
                    'label' => 'short content',
                    'rules' => 'required',
                ],
                'article_content' => [
                    'label' => 'article content',
                    'rules' => 'required',
                ],
                'cat_id' => [
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

                $article_id = $this->request->getPost('article_id');
                $active_id = $this->request->getPost('activation_id');
                $article_key = $this->request->getPost('article_key');
                $owner = session()->get('admin_id');
                $modifier = session()->get('admin_id');
                $article_title = $this->request->getPost('article_title');
                $short_content = $this->request->getPost('short_content');
                $article_content = $this->request->getPost('article_content');
                $cat_id = $this->request->getPost('cat_id');
                $existingArticleFilename = $this->request->getPost('existing_articleImg');
                $article_img = $this->request->getFile('article_img');

                if ($article_img->isValid()&& $article_img->isFile() && in_array($article_img->getMimeType(), ['image/jpg', 'image/jpeg', 'image/gif', 'image/png', 'image/webp'])) {
                    $newName = $article_img->getRandomName();
                    $article_img->move(ROOTPATH . 'public/backend/media/article_images', $newName);
    
    
                    $existingArticle = $articleModel->getArticlesById($article_id);
                    if (empty($existingArticle)) {
                        return false;
                    }
                            $existingImagePath = ROOTPATH . 'public/backend/media/article_images/' . $existingArticle['article_img'];
                            if (file_exists($existingImagePath)) {
                                unlink($existingImagePath);
                            }
                } elseif (!empty($existingArticleFilename)) {
                    // Use the existing filename if available
                    $newName = $existingArticleFilename;
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

                $dataToUpdate =[
                    'activation_id' => $active_id,
                    'article_title' => $article_title,
                    'author_id' => $owner,
                    'modifier_id' => $modifier,
                    'article_key' => $article_key,
                    'short_content' => $short_content,
                    'article_content' => $article_content,
                    'cat_id' => $cat_id,
                    'article_img' => $newName,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                $runQuery = $articleModel->updateArticles($article_id, $dataToUpdate);
                if($runQuery){
                    return redirect()->to(base_url('creative/admin/updateArticlesForm/index/key/'.$key.'/'.$article_key.'?token='.$adminToken))->with('success', 'Article has been updated successful');
                }else{
                return redirect()->back()->withInput()->with('error', 'Error: There was an error during update process');
                
                    throw new \Exception();
                }
    
            }
        }
    }
    }
}
