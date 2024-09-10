<?php

use App\Http\Controllers\Admin\{AuthController,
    AdminController,
    CarouselController,
    ContactController,
    ExpertController,
    SettingController,
    TestimonialController,
    AdvantageController,
    ServiceController as AdminService,
    ClientController,
};

use App\Http\Controllers\Web\{
    BookingController,
    ContacController,
    ServiceController,
    MainController,
    AboutController,
    TeamController,
    TestController,
    CodeTestController,
    AuthController as WebAuthController,

};
use Illuminate\Support\Facades\Route;

//WEB
Route::get('/', [MainController::class, 'index']);
Route::get('/home', [MainController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/booking', [BookingController::class, 'booking'])->name('booking');
Route::get('/contact', [ContacController::class, 'contact'])->name('contact');
Route::get('/service', [ServiceController::class, 'service'])->name('service');
Route::get('/team', [TeamController::class, 'team'])->name('team');
Route::get('/test', [TestController::class, 'test'])->name('test');

Route::name('login-register.')->group(function () {
    Route::get('/login', [WebAuthController::class, 'login'])->name('login');
    Route::get('/register', [WebAuthController::class, 'register'])->name('register');
    Route::post('/login', [WebAuthController::class, 'loginPost'])->name('loginPost');
    Route::post('/register', [WebAuthController::class, 'registerPost'])->name('registerPost');
    Route::get('/forget-password', [WebAuthController::class, 'forgetPaswsord'])->name('forgetPassword');
    Route::post('/forget-password-post', [WebAuthController::class, 'forgetPaswsordPost'])->name('forgetPasswordPost');
});
Route::get('/logout', [WebAuthController::class, 'logout'])->name('logout');

//ADMIN
Route::group(['prefix' => '/admin', 'as' => 'admin.', 'middleware' => 'isLogin'], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('/carousels', CarouselController::class);
    Route::resource('/expert', ExpertController::class);
    Route::resource('/testimonial', TestimonialController::class);
    Route::resource('/advantage', AdvantageController::class);
    Route::resource('/service', AdminService::class);
    Route::get('/client', [ClientController::class, 'index'])->name('client');
    Route::resource('/contact', ContactController::class)->only(['index', 'edit', 'update', 'destroy']);
    Route::resource('/setting', SettingController::class)->only(['index', 'update']);
});
Route::group(['prefix' => '/admin', 'as' => 'admin.', 'middleware' => 'isNotLogin'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');
});


