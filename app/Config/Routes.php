<?php

use App\Controllers\frontend\HomeController;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\frontend\ServicesController;
use App\Controllers\frontend\PortfolioController;
use App\Controllers\frontend\AboutController;
use App\Controllers\frontend\BlogsController;
use App\Controllers\frontend\ContactController;

/**
 * @var RouteCollection $routes
 */

 $routes->group('manucreative', ['namespace' => 'App\Controllers\frontend'],function ($routes){
    $routes->get('/', [HomeController::class, 'index']);
    $routes->get('services', [ServicesController::class, 'index']);
    $routes->get('portfolio', [PortfolioController::class, 'index']);
    $routes->get('about', [AboutController::class, 'index']);
    $routes->get('myBlogs', [BlogsController::class, 'index']);
    $routes->get('contact', [ContactController::class, 'index']);
 });

