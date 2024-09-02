<?php

use App\Http\Controllers\Admin\{
    AuthController,
    AdminController,
    CarouselController,
    ExpertController,
    TestimonialController,
    AdvantageController,
    ServiceController as AdminService,

};

use App\Http\Controllers\Web\{
    BookingController,
    ContacController,
    ServiceController,
    MainController,
    AboutController,
    TeamController,
    TestController,
    CodeTestController ,
    AuthController as WebAuthController,
};
use Illuminate\Support\Facades\Route;

//WEB
Route::get ('/', [MainController::class , 'index']);
Route::get ('/home', [MainController::class , 'index'])->name('home');
Route::get ('/about',[AboutController::class , 'about'])->name('about');
Route::get ('/booking',[BookingController::class, 'booking'])->name('booking');
Route::get ('/contact',[ContacController::class,'contact'])->name('contact');
Route::get ('/service',[ServiceController::class, 'service'])->name('service');
Route::get ('/team',[TeamController::class,'team'])->name('team');
Route::get ('/test',[TestController::class,'test'])->name('test');
Route::get ('/codeTest',[CodeTestController::class,'codeTest'])->name('codeTest');
Route::get('/login', [WebAuthController::class , 'login'])->name('login');
Route::post('/login', [WebAuthController::class , 'loginPost'])->name('loginPost');
Route::get('/register', [WebAuthController::class , 'register'])->name('register');
Route::post('/register', [WebAuthController::class , 'registerPost'])->name('registerPost');



//ADMIN
Route::group(['prefix' => '/admin', 'as' => 'admin.', 'middleware' => 'isLogin'], function (){
    Route::get ('/', [AdminController::class , 'dashboard'])->name('dashboard');
    Route::get('/logout', [AuthController::class , 'logout'])->name('logout');
    Route::resource('/carousels' , CarouselController::class);
    Route::resource('/expert', ExpertController::class);
    Route::resource('/testimonial', TestimonialController::class);
    Route::resource('/advantage', AdvantageController::class);
    Route::resource('/service', AdminService::class);

});
Route::group(['prefix' => '/admin', 'as' => 'admin.','middleware' => 'isNotLogin'], function (){
    Route::get('/login', [AuthController::class , 'login'])->name('login');
    Route::post('/login', [AuthController::class , 'loginPost'])->name('loginPost');
});


