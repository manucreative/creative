<?php
namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->setAutoRoute(false);

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
use App\Controllers\backend\FaqController;

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
    $routes->post('sendMail', [ContactController::class, 'sendMail']);
    $routes->get('myPricing', [PricingController::class, 'index']);
 });

 // Admin Login
 // 
 $routes->group('creative/admin', ['namespace' => 'App\Controllers\backend'], function ($routes) {

   $routes->get('login/index/key', [AdminLoginController::class, 'index'],['filter' => 'ifLoggedIn']);
   $routes->post('adminLogin/index/key', [AdminLoginController::class, 'adminLogin']); // Process login
});

   $myKey = 'kgskj98743ojhrk40dfjk49fjwj839fir8506jd9jd0j40jdfgjowpojd';

    $routes->addRedirect('creative', 'creative/admin/login/index/key');
    $routes->addRedirect('creative/admin', 'creative/admin/login/index/key');
    $routes->addRedirect('creative/admin/dashboard', 'creative/admin/login/index/key');
    $routes->addRedirect('creative/admin/dashboard/index', 'creative/admin/login/index/key');
    $routes->addRedirect('creative/admin/dashboard/index/key', 'creative/admin/login/index/key');

 //admin Routing 
 $routes->group('creative/admin', ['namespace' => 'App\Controllers\backend', 'filter' => 'auth'],function ($routes){
   $routes->get('logOut/index/key', [AdminLoginController::class, 'logOut']);
   $routes->get('dashboard/index/key/(:segment)', [DashboardController::class, 'dashboard/$1']);
   $routes->get('unAuthorized/index/key/(:any)', [AdminsController::class, 'unAuthorized']);
   $routes->get('addAdminForm/index/key/(:any)', [AdminsController::class, 'addAdminForm']);
   $routes->post('addAdminAction/index/key/(:any)', [AdminsController::class, 'addAdminAction']);

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
    $routes->post('updateProfiler', [ConfigurationsController::class, 'updateProfiler']);

    //Service Controls
    $routes->get('addServiceForm', [ServiceController::class, 'addServiceForm']);
    $routes->post('addService', [ServiceController::class, 'addService']);
    $routes->post('deleteServices', [ServiceController::class, 'deleteServices']);
    $routes->get('updateServiceForm/(:num)', [ServiceController::class, 'updateServiceForm/$1']);
    $routes->get('viewServices/index/key/(:segment)', [ServiceController::class, 'viewServices/$1']);
    $routes->post('updateService', [ServiceController::class, 'updateService']);

    // FAQ controls
    $routes->get('addFaqs', [FaqController::class, 'addFaqs']);
    $routes->post('addFaqAction', [FaqController::class, 'addFaqAction']);
    $routes->post('deleteFaqs', [FaqController::class, 'deleteFaqs']);
    $routes->get('viewFaqs', [FaqController::class, 'viewFaqs']);
    $routes->get('updateFaqForm/(:num)', [FaqController::class, 'updateFaqForm/$1']);
    $routes->post('updateFaq', [FaqController::class, 'updateFaq']);
 });

 if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
   require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}


