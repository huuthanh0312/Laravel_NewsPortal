<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\SubDistrictController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\WebsiteController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Frontend\FrontController;

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

Route::get('/', function () {
    return view('main.home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


//Admin Setup Pages Routes

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin Categories Pages Routes

Route::get('admin/categories', [CategoryController::class, 'index'])->name('admin.categories');

Route::post('admin/store/category', [CategoryController::class, 'storeCategory'])->name('store.category');

Route::get('edit/category/{id}', [CategoryController::class, 'editCategory']);

Route::post('update/category/{id}', [CategoryController::class, 'updateCategory']);

Route::get('delete/category/{id}', [CategoryController::class, 'deleteCategory']);


// Admin Sub Categories Pages Routes

Route::get('admin/subcategories', [SubCategoryController::class, 'index'])->name('admin.subcategories');

Route::post('admin/store/subcategory', [SubCategoryController::class, 'storeSubCategory'])->name('store.subcategory');

Route::get('edit/subcategory/{id}', [SubCategoryController::class, 'editSubCategory']);

Route::post('update/subcategory/{id}', [SubCategoryController::class, 'updateSubCategory']);

Route::get('delete/subcategory/{id}', [SubCategoryController::class, 'deleteSubCategory']);

// Admin Districts Pages Routes

Route::get('admin/districts', [DistrictController::class, 'index'])->name('admin.districts');

Route::post('admin/store/district', [DistrictController::class, 'storeDistrict'])->name('store.district');

Route::get('edit/district/{id}', [DistrictController::class, 'editDistrict']);

Route::post('update/district/{id}', [DistrictController::class, 'updateDistrict']);

Route::get('delete/district/{id}', [DistrictController::class, 'deleteDistrict']);


// Admin Districts Pages Routes

Route::get('admin/subdistricts', [SubDistrictController::class, 'index'])->name('admin.subdistricts');

Route::post('admin/store/subdistrict', [SubDistrictController::class, 'storeSubDistrict'])->name('store.subdistrict');

Route::get('edit/subdistrict/{id}', [SubDistrictController::class, 'editSubDistrict']);

Route::post('update/subdistrict/{id}', [SubDistrictController::class, 'updateSubDistrict']);

Route::get('delete/subdistrict/{id}', [SubDistrictController::class, 'deleteSubDistrict']);

// Admin Post Pages Routes

Route::get('admin/post', [PostController::class, 'index'])->name('all.post');

Route::get('admin/create/post', [PostController::class, 'createPost'])->name('create.post');

Route::post('store/post', [PostController::class, 'storePost'])->name('store.post');

    //ajax get subcategory and sub district
Route::get('get/subcategory/{id}', [PostController::class, 'getSubcategory']);

Route::get('get/subdistrict/{id}', [PostController::class, 'getSubDistrict']);

Route::get('edit/post/{id}', [PostController::class, 'editPost']);

Route::post('update/post/{id}', [PostController::class, 'updatePost']);

Route::get('delete/post/{id}', [PostController::class, 'deletePost']);

//Setings Pages Routes

    //Social Pages Routes

Route::get('social/setting', [SettingController::class, 'socialSetting'])->name('social.setting');

Route::post('update/social/{id}', [SettingController::class, 'updateSocial']);

    //Seo Pages Routes
Route::get('seo/setting', [SettingController::class, 'seoSetting'])->name('seo.setting');

Route::post('update/seo/{id}', [SettingController::class, 'updateSeo']);

    //LiveTV Pages Routes
Route::get('livetv/setting', [SettingController::class, 'livetvSetting'])->name('livetv.setting');

Route::post('update/livetv/{id}', [SettingController::class, 'updateLivetv']);

Route::get('active/livetv/{id}', [SettingController::class, 'activeLivetv']);

Route::get('inactive/livetv/{id}', [SettingController::class, 'inactiveLivetv']);


    //LiveTV Pages Routes
Route::get('notice/setting', [SettingController::class, 'noticeSetting'])->name('notice.setting');

Route::post('update/notice/{id}', [SettingController::class, 'updateNotice']);

Route::get('active/notice/{id}', [SettingController::class, 'activeNotice']);

Route::get('inactive/notice/{id}', [SettingController::class, 'inactiveNotice']);

//Website links Pages Routes
Route::get('website/setting', [WebsiteController::class, 'index'])->name('all.website');

Route::post('add/website', [WebsiteController::class, 'storeWebsite'])->name('store.website');

Route::get('edit/website/{id}', [WebsiteController::class, 'editWebsite']);

Route::post('update/website/{id}', [WebsiteController::class, 'updateWebsite']);

Route::get('delete/website/{id}', [WebsiteController::class, 'deleteWebsite']);

//Gallery Pages Routes

Route::get('photo/gallery', [GalleryController::class, 'photoGallery'])->name('photo.gallery');

Route::post('add/photo', [GalleryController::class, 'addPhoto'])->name('add.photo');

Route::get('edit/photo/{id}', [GalleryController::class, 'editPhoto']);

Route::post('update/photo/{id}', [GalleryController::class, 'updatePhoto']);

Route::get('delete/photo/{id}', [GalleryController::class, 'deletePhoto']);

Route::get('video/gallery', [GalleryController::class, 'videoGallery'])->name('video.gallery');

Route::post('add/video', [GalleryController::class, 'addVideo'])->name('add.video');

Route::get('edit/video/{id}', [GalleryController::class, 'editVideo']);

Route::post('update/video/{id}', [GalleryController::class, 'updateVideo']);

Route::get('delete/video/{id}', [GalleryController::class, 'deleteVideo']);

//Front Pages Routes

Route::get('en/language', [FrontController::class, 'enLanguage'])->name('en.language');

Route::get('vi/language', [FrontController::class, 'viLanguage'])->name('vi.language');