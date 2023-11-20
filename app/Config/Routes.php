<?php
namespace Config;

use App\Controllers\frontend\HomeController;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\frontend\ServicesController;
use App\Controllers\frontend\PortfolioController;
use App\Controllers\frontend\AboutController;
use App\Controllers\frontend\BlogsController;
use App\Controllers\frontend\ContactController;
use App\Controllers\frontend\PricingController;
use App\Controllers\frontend\TeamController;

//admins Controllers
use App\Controllers\backend\DashboardController;
use App\Controllers\backend\AdminLoginController;
use App\Controllers\backend\AdminsController;
use App\Controllers\backend\SliderController;
use App\Controllers\backend\ConfigurationsController;
use App\Controllers\backend\ServiceController;
use App\Controllers\backend\FaqController;
use App\Controllers\backend\ArticlesController;
use App\Controllers\frontend\MembershipController;

/**
 * @var RouteCollection $routes
 */

    $routes->group('', ['namespace' => 'App\Controllers\frontend'],function ($routes){
    $routes->get('/', [HomeController::class, 'index/$1']);
    $routes->get('services', [ServicesController::class, 'index/$1/$2']);
    $routes->get('portfolio', [PortfolioController::class, 'index/$1']);
    $routes->get('about', [AboutController::class, 'index/$1']);
    $routes->get('team', [TeamController::class, 'team/$1']);
    $routes->get('team/membershipForm', [MembershipController::class, 'membershipForm/$1']);
    $routes->get('team/membershipForm/verificationSend', [MembershipController::class, 'verificationSend/$1']);
    $routes->post('team/membership', [MembershipController::class, 'membership']);
    $routes->get('team/membership/verification/(:segment)', [MembershipController::class, 'mailVerification/$1']);
    $routes->get('team/membershipForm/verificationSuccess', [MembershipController::class, 'verificationSuccess/$1']);
    $routes->get('team/(:segment)', [TeamController::class, 'teamDetails/$1/$2']);
    $routes->get('team/(:segment)/(:segment)', [BlogsController::class, 'ownArticle/$1/$2']);
    $routes->get('articles', [BlogsController::class, 'index/$1']);
   //  $routes->get('articles/(:segment)', [BlogsController::class, 'ownArticle/$1/$2']);
    $routes->get('contact', [ContactController::class, 'index/$1']);
    $routes->post('sendMail', [ContactController::class, 'sendMail']);
    $routes->get('myPricing', [PricingController::class, 'index/$1']);
   
 });

 // Admin Login
 // 
 $routes->group('creative/admin', ['namespace' => 'App\Controllers\backend'], function ($routes) {

   $routes->get('login/index/key', [AdminLoginController::class, 'index'],['filter' => 'ifLoggedIn']);
   $routes->get('forgotPass/index/key', [AdminLoginController::class, 'sendMail']);
   $routes->post('userMailSend/index/key', [AdminLoginController::class, 'userMailSend']);
   $routes->get('mailSendSuccess/index/key',[AdminLoginController::class, 'mailSendSuccess']);
   $routes->get('resetPasswordForm/index/key/(:segment)', [AdminLoginController::class, 'resetPasswordForm/$1']);
   $routes->post('updatePassword/index/key', [AdminLoginController::class, 'updatePassword']);
   $routes->post('adminLogin/index/key', [AdminLoginController::class, 'adminLogin']);
   $routes->get('unAuthorized/index/key/(:segment)', [AdminLoginController::class, 'unAuthorized/$1']);
   $routes->get('logOut/index/key', [AdminLoginController::class, 'logOut']);
});

    $routes->addRedirect('creative', 'creative/admin/login/index/key');
    $routes->addRedirect('creative/admin', 'creative/admin/login/index/key');
    $routes->addRedirect('creative/admin/dashboard', 'creative/admin/login/index/key');
    $routes->addRedirect('creative/admin/dashboard/index', 'creative/admin/login/index/key');
    $routes->addRedirect('creative/admin/dashboard/index/key', 'creative/admin/login/index/key');

 //admin Routing  , 'filter' => 'authentication'
 $routes->group('creative/admin', ['namespace' => 'App\Controllers\backend', 'filter' => 'authentication'],function ($routes){
   $routes->get('dashboard/index/key/(:segment)', [DashboardController::class, 'dashboard/$1']);
   $routes->get('addAdminForm/index/key/(:segment)', [AdminsController::class, 'addAdminForm/$1']);
   $routes->post('addAdminAction/index/key/(:segment)', [AdminsController::class, 'addAdminAction/$1']);

    //admin updates
    $routes->get('profileUpdateForm/index/key/(:segment)/(:segment)', [AdminsController::class, 'profileUpdateForm/$1/$2']);
    $routes->get('updateUserForm/index/key/(:segment)/(:segment)', [AdminsController::class, 'updateUserForm/$1/$2']);
    $routes->post('updateProfile/index/key/(:segment)', [AdminsController::class, 'updateProfile/$1']);
    $routes->get('viewAllUsers/index/key/(:segment)', [AdminsController::class, 'viewAllUsers/$1']);
    $routes->post('deleteAdmins/index/key/(:segment)', [AdminsController::class, 'deleteAdmins/$1']);

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
    $routes->post('socialMediaUpdates/index/key/(:segment)', [ConfigurationsController::class, 'socialMediaUpdates/$1']);

    //Service Controls
    $routes->get('addServiceForm/index/key/(:segment)', [ServiceController::class, 'addServiceForm/$1']);
    $routes->post('addService/index/key/(:segment)', [ServiceController::class, 'addService/$1']);
    $routes->post('deleteServices/index/key/(:segment)', [ServiceController::class, 'deleteServices/$1']);
    $routes->get('updateServiceForm/index/key/(:segment)/(:segment)', [ServiceController::class, 'updateServiceForm/$1/$2']);
    $routes->get('viewServices/index/key/(:segment)', [ServiceController::class, 'viewServices/$1']);
    $routes->get('viewOwnerService/index/key/(:segment)', [ServiceController::class, 'viewIndividualService/$1']);
    $routes->post('updateService/index/key/(:segment)', [ServiceController::class, 'updateService/$1']);

    // FAQ controls
    $routes->get('addFaqs/index/key/(:segment)', [FaqController::class, 'addFaqs/$1']);
    $routes->post('addFaqAction/index/key/(:segment)', [FaqController::class, 'addFaqAction/$1']);
    $routes->post('deleteFaqs/index/key/(:segment)', [FaqController::class, 'deleteFaqs/$1']);
    $routes->get('viewFaqs/index/key/(:segment)', [FaqController::class, 'viewFaqs/$1']);
    $routes->get('updateFaqForm/index/key/(:segment)/(:num)', [FaqController::class, 'updateFaqForm/$1/$2']);
    $routes->post('updateFaq/index/key/(:segment)', [FaqController::class, 'updateFaq/$1']);

    //Articles Controls
    $routes->get('addArticleForm/index/key/(:segment)', [ArticlesController::class, 'addArticleForm/$1']);
    $routes->post('addArticle/index/key/(:segment)', [ArticlesController::class, 'addArticle/$1']);
    $routes->post('deleteArticles/index/key/(:segment)', [ArticlesController::class, 'deleteArticles/$1']);
    $routes->get('updateArticlesForm/index/key/(:segment)/(:segment)', [ArticlesController::class, 'updateArticlesForm/$1/$2']);
    $routes->get('viewArticles/index/key/(:segment)', [ArticlesController::class, 'viewArticles/$1']);
    $routes->get('viewOwnerArticles/index/key/(:segment)', [ArticlesController::class, 'viewOwnerArticles/$1']);
    $routes->post('updateArticle/index/key/(:segment)', [ArticlesController::class, 'updateArticle/$1']);
    $routes->post('imageUploads/index/key/(:segment)', [ArticlesController::class, 'imageUploads/$1']);

 });


