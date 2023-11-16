<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\ArticlesModel;

class BlogsController extends BaseController{
    public function index($title){
        $title = 'all Articles';
        $articleModel = model(ArticlesModel::class);

        $data =[
            'articles' => $articleModel->getArticles(),
            'title' => $title
        ];

       return view('frontend/templates/header', $data)
            . view('frontend/blogs', $data)
            . view('frontend/templates/footer');
    }

    public function ownArticle($user_name, $slug, $title){
        $articlesModel = model(ArticlesModel::class);
        $adminModel = model(AdminModel::class);
        $articles = $articlesModel->getArticlesByUrl($slug);
        $author_id = $articles['author_id'];
        $cat_id = $articles['cat_id'];
        $title = $articles['meta_title'];
        $findAuthor = $articlesModel->getArticleByAdminId($author_id);
        $related_cat = $articlesModel->getArticleByCategories($cat_id);
        $author = $adminModel->getAdminById($author_id);
        $data =[
            'title' => $title,
            'slug' => $slug,
            'articles' => $articlesModel->getArticles(),
            'user_name' => $user_name,
            'article_title' => $articles['article_title'],
            'author_id' => $articles['author_id'],
            'meta_description' => $articles['meta_description'],
            'short_content' => $articles['short_content'],
            'article_content' => $articles['article_content'],
            'cat_id' => $articles['cat_id'],
            'author' => $author,
            'article_img' => $articles['article_img'],
            'article_date' => $articles['updated_at'],
            'category' => $articles['cat_name'],
            'allUserArticles' => $findAuthor,
            'relatedCats' => $related_cat

        ];

        return view('frontend/templates/header', $data)
            . view('frontend/blogPage', $data)
            . view('frontend/templates/footer');
    }
}