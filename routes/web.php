<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
Use App\Http\Controllers\Frontend\HomeController;
Use App\Http\Controllers\Frontend\AboutUsController;
Use App\Http\Controllers\Frontend\UserBlogController;
Use App\Http\Controllers\Frontend\OrganizationController;
Use App\Http\Controllers\Frontend\ServiceBookingController;
Use App\Http\Controllers\Frontend\ServiceStatusController;

use App\Http\Controllers\Auth\ServiceProviders_LoginController;
use App\Http\Controllers\Auth\ServiceProviders_RegisterController;
use App\Http\Controllers\Auth\SP_ForgotPasswordController;
use App\Http\Controllers\Auth\SP_ResetPasswordController;
use App\Http\Controllers\Backend\Service_providers\ServiceProvidersController;
use App\Http\Controllers\Backend\Service_providers\ServicesPostController;
Use App\Http\Controllers\Backend\Service_providers\ProfileController;
Use App\Http\Controllers\Backend\Service_providers\SpBlogController;

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Backend\Admin\DashbordController;
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\ManagePostController;
use App\Http\Controllers\Backend\Admin\Blogcontroller;
use App\Http\Controllers\Backend\Admin\AdminProfileController;
use App\Http\Controllers\Backend\Admin\MessageController;
use App\Http\Controllers\Backend\Admin\ServiceBookingManageController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */


Route::get('/',[HomeController::class,'index'])->name('home');

Route::get ('/home',[HomeController::class,'index'])->name('home');

Route::get ('/about-us',[AboutUsController::class,'Aboutus'])->name('about-us');

Route::post ('/contact-us',[AboutUsController::class,'ContactFormSubmit'])->name('contact-us');

Route::get ('/services',[HomeController::class,'showServicesCategory'])->name('services');

Route::get ('/organization/{id}',[OrganizationController::class,'organizationList'])->name('organization.list');

Route::get ('/service-details/{id}',[OrganizationController::class,'showServiceDetails'])->name('service.details');

Route::post ('/Service-Booking',[ServiceBookingController::class,'serviceBooking'])->name('event.booking');

Route::get ('/status',[ServiceStatusController::class,'showServicesStatus'])->name('status');

Route::get ('/blog',[UserBlogController::class,'showBlog'])->name('blog');

Route::get ('/blog-details/{id}',[UserBlogController::class,'showBlogDetails'])->name('blog.details');

Route::post ('/blog-review',[UserBlogController::class,'BlogReviewSubmit'])->name('blog-review.submit');

Auth::routes(['verify' => true]);
//Route::get('/home', 'HomeController@index')->name('home');

// ServiceProviders routes
Route::prefix('ServiceProvider')->group(function(){

    Route::get ('/',[ServiceProviders_LoginController::class,'showLogin'])->name('ServiceProviders.login');

    Route::post('/login', [ServiceProviders_LoginController::class,'login'])->name('ServiceProviders.login.submit');

    Route::get('/logout', [ServiceProviders_LoginController::class,'logout'])->name('ServiceProviders.logout.submit');

    Route::get('/register', [ServiceProviders_RegisterController::class,'showRegisterForm'])->name('ServiceProviders.register');

    Route::post('/register', [ServiceProviders_RegisterController::class,'Register'])->name('ServiceProviders.register.submit');

    Route::get('/ResetPassword-Email-submit',[SP_ForgotPasswordController::class,'showLinkRequestForm'])->name('SP.ForgotPassword.requestform');

    Route::post('/ResetPassword-Email-Form','Auth\SP_ForgotPasswordController@sendResetLinkEmail')->name('SP.password.email.submit');

    Route::post('/ResetPassword-Email-Form',[SP_ForgotPasswordController::class,'sendResetLinkEmail'])->name('SP.password.email.submit');

    Route::get('/Paswordreset/{token}',[SP_ResetPasswordController::class,'SPshowResetForm'])->name('SP.password.resetform');

    Route::post('/PasswordResete',[SP_ResetPasswordController::class,'ResetPassword'])->name('sp.Password.Updated');

    Route::get('/dashboard', [ServiceProvidersController::class,'index'])->name('ServicePro.dashboard');

    //---------------------ServicesPost----------------------------

    Route::get('/add-Service', [ServicesPostController::class,'showServicesPostForm'])->name('ServicePro.add-service-post');

    Route::post('/add-Service', [ServicesPostController::class,'showServicesPostForm'])->name('ServicePro.add-service-post.submit');

    Route::get('/show-Service', [ServicesPostController::class,'showServiceList'])->name('ServicePro.show-service');

    Route::get('/edit-service/{id}', [ServicesPostController::class,'EditServicePost'])->name('ServicePro.edit-service');

    Route::post('/update-service/{id}', [ServicesPostController::class,'EditServicePost'])->name('ServicePro.update-service');

    Route::get('/delete-service/{id}', [ServicesPostController::class,'DeleteServicePost'])->name('ServicePro.delete-service');

//------------------Profile Manage---------------------------

    Route::get('/profile', [ProfileController::class,'showProfile'])->name('ServicePro.profile');

    Route::get('/edit-profile', [ProfileController::class,'editProfile'])->name('ServicePro.edit.profile');

    Route::post('/update-profile', [ProfileController::class,'updateProfile'])->name('ServicePro.update_profile.submit');

    //------------------Blog-Post---------------------------

    Route::get('/add-blog', [SpBlogController::class,'showBlogPostForm'])->name('ServicePro.add-blog');

    Route::post('/add-blog', [SpBlogController::class,'showBlogPostForm'])->name('ServicePro.add-blog.submit');

    Route::get('/blog-list', [SpBlogController::class,'showBlogList'])->name('ServicePro.blog-list');

    Route::get('/delete-blog/{id}', [SpBlogController::class,'deleteBlog'])->name('ServicePro.delete-blog');

    Route::get('/edit-blog/{id}', [SpBlogController::class,'showEditBlogPostForm'])->name('ServicePro.edit-blog');

    Route::post('/edit-blog/{id}', [SpBlogController::class,'showEditBlogPostForm'])->name('ServicePro.edit-blog');

});

Route::prefix('admin')->group(function(){

    Route::get('/', [AdminLoginController::class,'showLoginForm'])->name('admin.login');

    Route::post('/login', [AdminLoginController::class,'login'])->name('admin.login.submit');

    Route::get('/logout', [AdminLoginController::class,'logout'])->name('admin.logout');

    Route::get('/dashboard', [DashbordController::class,'index'])->name('admin.dashboard');

    // ------------------------ category -------------------------------------------
    Route::match(['get','post'],'/add-category', [CategoryController::class,'addCategory'])->name('admin.add-category');

    Route::get('/show-category', [CategoryController::class,'showCategory'])->name('admin.show-category');

    Route::get('/edit-category/{id}', [CategoryController::class,'editCategory'])->name('admin.edit-category');

    Route::post('/update-category/{id}', [CategoryController::class,'editCategory'])->name('admin.update-category');

    Route::get('/delete-category/{id}', [CategoryController::class,'deleteCategory'])->name('admin.delete-category');

    //--Manage-servicesPost---
    Route::get('/Services-list', [ManagePostController::class,'showServicesList'])->name('admin.services-list');

    Route::get('/delete-service/{id}', [ManagePostController::class,'deleteService'])->name('admin.delete-service');

    Route::get('/booking-list', [ServiceBookingManageController::class,'showUnapprovedBookingList'])->name('admin.booking-list');

    Route::get('/approved-booking/{id}', [ServiceBookingManageController::class,'showUnapprovedBookingList'])->name('admin.approved-booking');

    Route::get('/unapproved-booking/{id}', [ServiceBookingManageController::class,'ChangeUnapprovedBookingList'])->name('admin.unapproved-booking');

    Route::get('/delete-booking/{id}', [ServiceBookingManageController::class,'deleteBooking'])->name('admin.delete-booking');

    Route::get('/blog-list', [BlogController::class,'showBlogList'])->name('admin.blog-list');

    Route::get('/approved-blog/{id}', [BlogController::class,'showBlogList'])->name('admin.approved-blog');

    Route::get('unapproved-blog/{id}', [BlogController::class,'changeBlogList'])->name('admin.unapproved-blog');

    Route::get('/delete-blog/{id}', [BlogController::class,'deleteBlog'])->name('admin.delete-blog');

    Route::get('/message-list', [MessageController::class,'showMessageList'])->name('admin.message-list');

    Route::get('/delete-message/{id}', [MessageController::class,'deleteMessage'])->name('admin.delete-message');

    Route::get('/review-list', [BlogController::class,'showBlogReviewList'])->name('admin.review-list');

    Route::get('/delete-review/{id}', [BlogController::class,'deleteReview'])->name('admin.delete-review');

    Route::get('/profile', [AdminProfileController::class,'showProfile'])->name('admin.show-profile');

    Route::get('/edit-profile', [AdminProfileController::class,'editProfile'])->name('admin.edit.profile');

    Route::post('/update-profile', [AdminProfileController::class,'updateProfile'])->name('admin.update_profile.submit');

});


