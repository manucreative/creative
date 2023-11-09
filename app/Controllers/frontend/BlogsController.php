<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;
use App\Models\ArticlesModel;

class BlogsController extends BaseController{
    public function index(){
        $articleModel = model(ArticlesModel::class);

        $data =[
            'articles' => $articleModel->getArticles(),
            'title' => 'All Articles'
        ];


        return view('frontend/templates/header')
            . view('frontend/blogs', $data)
            . view('frontend/templates/footer');
    }

    public function ownArticle($slug){

        $data =[
            'slug' => $slug 
        ];

        return view('frontend/templates/header', $data)
            . view('frontend/blogPage')
            . view('frontend/templates/footer');
    }
}