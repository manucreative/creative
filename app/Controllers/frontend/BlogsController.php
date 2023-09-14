<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;

class BlogsController extends BaseController{
    public function index(){

        return view('frontend/templates/header')
            . view('frontend/blogs')
            . view('frontend/templates/footer');
    }
}