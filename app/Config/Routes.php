<?php

use App\Controllers\frontend\HomeController;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\frontend\ServicesController;
use App\Controllers\frontend\PortfolioController;
use App\Controllers\frontend\AboutController;
use App\Controllers\frontend\BlogsController;
use App\Controllers\frontend\ContactController;
use App\Controllers\frontend\PricingController;

//admins Controllers
use App\Controllers\backend\DashboardController;
use App\Controllers\backend\AdminLoginController;
use App\Controllers\backend\AdminsController;
use App\Controllers\backend\SliderController;
use App\Controllers\backend\ConfigurationsController;
use App\Controllers\backend\ServiceController;

/**
 * @var RouteCollection $routes
 */

 $routes->group('', ['namespace' => 'App\Controllers\frontend'],function ($routes){
    $routes->get('/', [HomeController::class, 'index']);
    $routes->get('services', [ServicesController::class, 'index']);
    $routes->get('portfolio', [PortfolioController::class, 'index']);
    $routes->get('about', [AboutController::class, 'index']);
    $routes->get('myBlogs', [BlogsController::class, 'index']);
    $routes->get('contact', [ContactController::class, 'index']);
    $routes->get('myPricing', [PricingController::class, 'index']);
 });

 // Admin Login
 // 
 $routes->group('creative', ['namespace' => 'App\Controllers\backend'], function ($routes) {
   $routes->get('login', [AdminLoginController::class, 'index'],['filter' => 'ifLoggedIn']);
   $routes->post('adminLogin', [AdminLoginController::class, 'adminLogin']); // Process login

});
 //admin Routing 
 $routes->group('creative', ['namespace' => 'App\Controllers\backend', 'filter' => 'auth'],function ($routes){
   $routes->get('/', [DashboardController::class, 'dashboard']);
   $routes->get('dashboard', [DashboardController::class, 'dashboard']);
   $routes->get('addAdminForm', [AdminsController::class, 'addAdminForm']);
   $routes->post('addAdminAction', [AdminsController::class, 'addAdminAction']);
   $routes->get('unAuthorized', [AdminLoginController::class, 'unAuthorized']);
    $routes->get('logOut', [AdminLoginController::class, 'logOut']);

    //admin updates
    $routes->get('profileUpdateForm/(:num)', [AdminsController::class, 'profileUpdateForm/$1']);
    $routes->post('updateProfile', [AdminsController::class, 'updateProfile']);

    //Sliders
    $routes->get('addSliderContent', [SliderController::class, 'addSliderContent']);
    $routes->post('addSliderAction', [SliderController::class, 'addSliderAction']);
    $routes->get('viewSliders', [SliderController::class, 'viewSliders']);
    $routes->get('updateSliderForm/(:num)', [SliderController::class, 'updateSliderForm/$1']);
    $routes->post('updateSlider', [SliderController::class, 'updateSlider']);
    $routes->post('deleteSliders', [SliderController::class, 'deleteSliders']);

    //Configurations
    $routes->get('configurations', [ConfigurationsController::class, 'viewSettingsPage']);
    $routes->post('featureConfigForm',[ConfigurationsController::class, 'featureConfigForm']);

    //Service Controls
    $routes->get('addServiceForm', [ServiceController::class, 'addServiceForm']);
    $routes->post('addService', [ServiceController::class, 'addService']);
    $routes->post('deleteServices', [ServiceController::class, 'deleteServices']);
    $routes->get('updateServiceForm/(:num)', [ServiceController::class, 'updateServiceForm/$1']);
    $routes->get('viewServices', [ServiceController::class, 'viewServices']);
    $routes->post('updateService', [ServiceController::class, 'updateService']);
 });

