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
 $routes->group('creative/admin/index/key', ['namespace' => 'App\Controllers\backend'], function ($routes) {
   $routes->get('login', [AdminLoginController::class, 'index'],['filter' => 'ifLoggedIn']);
   $routes->post('adminLogin', [AdminLoginController::class, 'adminLogin']); // Process login
   

});
   $sessionKey = session()->get('session_key');
    $routes->addRedirect('creative', 'creative/admin/index/key/'.$sessionKey.'/dashboard');
    $routes->addRedirect('creative/admin', 'creative/admin/index/key/'.$sessionKey.'/dashboard');
    $routes->addRedirect('creative/admin/index', 'creative/admin/index/key/'.$sessionKey.'/dashboard');
    $routes->addRedirect('creative/admin/index/key/dashboard', 'creative/admin/index/key/'.$sessionKey.'/dashboard');

 //admin Routing 
 $routes->group('creative/admin/index/key/'.$sessionKey, ['namespace' => 'App\Controllers\backend', 'filter' => 'auth'],function ($routes){
   $routes->get('dashboard', [DashboardController::class, 'dashboard']);
   $routes->get('unAuthorized', [AdminsController::class, 'unAuthorized']);
   $routes->get('addAdminForm', [AdminsController::class, 'addAdminForm']);
   $routes->post('addAdminAction', [AdminsController::class, 'addAdminAction']);
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
    $routes->post('updateProfiler', [ConfigurationsController::class, 'updateProfiler']);

    //Service Controls
    $routes->get('addServiceForm', [ServiceController::class, 'addServiceForm']);
    $routes->post('addService', [ServiceController::class, 'addService']);
    $routes->post('deleteServices', [ServiceController::class, 'deleteServices']);
    $routes->get('updateServiceForm/(:num)', [ServiceController::class, 'updateServiceForm/$1']);
    $routes->get('viewServices', [ServiceController::class, 'viewServices']);
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


