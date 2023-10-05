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
   $routes->get('unAuthorized/index/key/(:segment)', [AdminsController::class, 'unAuthorized/$1']);
   $routes->get('addAdminForm/index/key/(:segment)', [AdminsController::class, 'addAdminForm/$1']);
   $routes->post('addAdminAction/index/key/(:segment)', [AdminsController::class, 'addAdminAction/$1']);

    //admin updates
    $routes->get('profileUpdateForm/index/key/(:segment)/(:num)', [AdminsController::class, 'profileUpdateForm/$1/$2']);
    $routes->post('updateProfile/index/key/(:segment)', [AdminsController::class, 'updateProfile/$1']);

    //Sliders
    $routes->get('addSliderContent/index/key/(:segment)', [SliderController::class, 'addSliderContent/$1']);
    $routes->post('addSliderAction/index/key/(:segment)', [SliderController::class, 'addSliderAction/$1']);
    $routes->get('viewSliders/index/key/(:segment)', [SliderController::class, 'viewSliders/$1']);
    $routes->get('updateSliderForm/index/key/(:segment)/(:num)', [SliderController::class, 'updateSliderForm/$1/$2']);
    $routes->post('updateSlider/index/key/(:segment)', [SliderController::class, 'updateSlider/$1']);
    $routes->post('deleteSliders/index/key/(:segment)', [SliderController::class, 'deleteSliders/$1']);

    //Configurations
    $routes->get('configurations/index/key/(:segment)', [ConfigurationsController::class, 'viewSettingsPage/$1']);
    $routes->post('featureConfigForm/index/key/(:segment)',[ConfigurationsController::class, 'featureConfigForm/$1']);
    $routes->post('updateProfiler/index/key/(:segment)', [ConfigurationsController::class, 'updateProfiler/$1']);

    //Service Controls
    $routes->get('addServiceForm/index/key/(:segment)', [ServiceController::class, 'addServiceForm/$1']);
    $routes->post('addService/index/key/(:segment)', [ServiceController::class, 'addService/$1']);
    $routes->post('deleteServices/index/key/(:segment)', [ServiceController::class, 'deleteServices/$1']);
    $routes->get('updateServiceForm/index/key/(:segment)/(:segment)', [ServiceController::class, 'updateServiceForm/$1/$2']);
    $routes->get('viewServices/index/key/(:segment)', [ServiceController::class, 'viewServices/$1']);
    $routes->post('updateService/index/key/(:segment)', [ServiceController::class, 'updateService/$1']);

    // FAQ controls
    $routes->get('addFaqs/index/key/(:segment)', [FaqController::class, 'addFaqs/$1']);
    $routes->post('addFaqAction/index/key/(:segment)', [FaqController::class, 'addFaqAction/$1']);
    $routes->post('deleteFaqs/index/key/(:segment)', [FaqController::class, 'deleteFaqs/$1']);
    $routes->get('viewFaqs/index/key/(:segment)', [FaqController::class, 'viewFaqs/$1']);
    $routes->get('updateFaqForm/index/key/(:segment)/(:num)', [FaqController::class, 'updateFaqForm/$1/$2']);
    $routes->post('updateFaq/index/key/(:segment)', [FaqController::class, 'updateFaq/$1']);
 });

 if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
   require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}


