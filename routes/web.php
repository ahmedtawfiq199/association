<?php

use App\Http\Controllers\ControlPanel\BlogController;
use App\Http\Controllers\ControlPanel\ClientController;
use App\Http\Controllers\ControlPanel\ContactController as ControlPanelContactController;
use App\Http\Controllers\ControlPanel\DashboardController;
use App\Http\Controllers\ControlPanel\OrderController as ControlPanelOrderController;
use App\Http\Controllers\ControlPanel\PageController;
use App\Http\Controllers\ControlPanel\PhotoAlbumController;
use App\Http\Controllers\ControlPanel\PlanController;
use App\Http\Controllers\ControlPanel\ProjectController;
use App\Http\Controllers\ControlPanel\SubServiceController;
use App\Http\Controllers\ControlPanel\TeamController;
use App\Http\Controllers\ControlPanel\UserController;
use App\Http\Controllers\ControlPanel\SliderController;
use App\Http\Controllers\ControlPanel\VedioAlbumController;
use App\Http\Controllers\ControlPanel\WebsitController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\ViewController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('frontend.index');
// });




// Route::get('/dashbourd', function () {
//     dd('hello');
//     return view('control-panel.dashboard');
// });

// Control Panel Routs
Route::middleware('auth')
        ->prefix('control-panel')
        ->group(function () {
            Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

            Route::get('users', [UserController::class, 'index'])->name('all-users');
            Route::get('users/create', [UserController::class, 'create'])->name('create-users');
            Route::post('users/create', [UserController::class, 'store'])->name('store-users');
            Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('edit-users');
            Route::put('users/{user}', [UserController::class, 'update'])->name('update-users');
            Route::delete('users', [UserController::class, 'destroy'])->name('delete-users');

            Route::get('setting/website-setting', [WebsitController::class, 'edit'])->name('setting-website-edit');
            Route::post('setting/website-setting', [WebsitController::class, 'update'])->name('setting-website-update');

            Route::resource('services', App\Http\Controllers\ControlPanel\ServiceController::class);
            Route::resource('subservices', SubServiceController::class);
            Route::resource('clients', ClientController::class);
            Route::resource('projects', ProjectController::class);
            Route::resource('pages', PageController::class);
            Route::resource('blogs', BlogController::class);
            Route::resource('teams', TeamController::class);
            Route::resource('orders', ControlPanelOrderController::class);
            Route::get('contacts',[ControlPanelContactController::class,'index'])->name('contacts.index');
            Route::get('contacts/{contact}',[ControlPanelContactController::class,'show'])->name('contacts.show');
            Route::delete('contacts/{contact}',[ControlPanelContactController::class,'destroy'])->name('contacts.destroy');
            Route::resource('sliders', SliderController::class);

            Route::resource('photo-album',PhotoAlbumController::class);
            Route::put('photo-album/{photo_album}/photos',[PhotoAlbumController::class,'updatePhotos'])->name('photo-album.updatePhotos');
            Route::resource('vedio-album',VedioAlbumController::class);
            
            Route::get('plans/{service}',[PlanController::class,'show'])->name('plans.show');
            Route::get('plans/create/{service}',[PlanController::class,'create'])->name('plans.create');
            Route::post('plans/create',[PlanController::class,'store'])->name('plans.store');
            Route::get('plans/{plan}/edit',[PlanController::class,'edit'])->name('plans.edit');
            Route::put('plans/{plan}/edit',[PlanController::class,'update'])->name('plans.update');
            Route::delete('plans/{plan}',[PlanController::class,'destroy'])->name('plans.destroy');
        });


// Route::as('view.')
//     ->group(function () {
//         Route::get('/',[ViewController::class,'index'])->name('index');
//         Route::get('projects',[ViewController::class,'viewProjects'])->name('projects');
//         Route::get('services',[ViewController::class, 'viewServices'])->name('services');
//         Route::get('blogs',[ViewController::class, 'viewBlogs'])->name('blogs');
//         Route::get('blogs/{blog}',[ViewController::class, 'viewSingleBlog'])->name('single.blog');
//         Route::get('projects/{project}',[ViewController::class, 'viewSingleProject'])->name('single.project');
//         Route::get('about/{page}',[ViewController::class,'viewAbout'])->name('about');
//         Route::get('contact',[ContactController::class,'viewContact'])->name('contact');
//         Route::post('contact',[ContactController::class,'store'])->name('contact.store');
//         Route::post('new-order',[OrderController::class,'store'])->name('new.order');
//     });

require __DIR__.'/auth.php';
