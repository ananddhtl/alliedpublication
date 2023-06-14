<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PublicUserController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookSubCategoryController;
use App\Http\Controllers\BookChildCategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\UserDistrictController;
use App\Http\Controllers\SliderImagesController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.main');
});
Route::get('/aboutus', function () {
    return view('frontend.about');
});
Route::get('/services', function () {
    return view('frontend.service');
});
Route::get('/contactus', function () {
    return view('frontend.contact');
});
Route::get('/books', function () {
    return view('frontend.books');
});
Route::get('/login', function () {
    return view('frontend.login');
});
Route::get('/register', function () {
    return view('frontend.register');
});
Route::get('/forgetpassword', function () {
    return view('frontend.forgetpassword');
});
Route::get('/changepassword', function () {
    return view('frontend.changepassword');
});
Route::get('/userdashboard', function () {
    return view('frontend.dashboard');
});
Route::get('/admin-dashboard', function () {
    return view('backend.main');
});

Route::get('/childCatagory', function () {
    return view('backend.childcatagory');
});
Route::get('/adminlogin', function () {
    return view('backend.login');
});
Route::get('/admin-dashboard', function () {
    return view('backend.dashboard');
});


Route::get('/login/google',[AuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);



Route::post('/addContactForm', [MailController::class, 'sendContactForm']);

//Route for the user register
Route::post('/registerUser', [PublicUserController::class, 'store']);
Route::post('/user-login', [PublicUserController::class, 'login']);
Route::get('/logout-user', function () {
    session()->forget('sessionUserPassword');
    return redirect('/');
});
//Route for public users
Route::post('/changeUserPassword', [PublicUserController::class, 'updatePassword']);
Route::get('/userdashboard', [PublicUserController::class, 'getPublicUserDetails']);
Route::post('/user-forgetpassword', [PublicUserController::class, 'forgetPassword']);
//Route for services
Route::post('/postServices', [ServicesController::class, 'store']);
Route::get('/admin-services', [ServicesController::class, 'index']);
Route::get('/editservicesData/{id}', [ServicesController::class, 'edit']);
Route::post('/updateservicesData/{id}', [ServicesController::class, 'update']);
Route::get('/deleteServicesData/{id}', [ServicesController::class, 'destroy']);

//Route for catagory
Route::post('/postCatagory', [BookCategoryController::class, 'store']);
Route::get('/catagory', [BookCategoryController::class, 'index']);
Route::get('/deleteCatagory/{id}', [BookCategoryController::class, 'destroy']);
Route::get('/editCategory/{id}', [BookCategoryController::class, 'edit']);
Route::post('/updateCategory/{id}', [BookCategoryController::class, 'update']);

//Route for sub catagory
Route::post('/postsubCatagory', [BookSubCategoryController::class, 'store']);
Route::get('/subCatagory', [BookSubCategoryController::class, 'index']);
Route::get('/deleteSubCatagory/{id}', [BookSubCategoryController::class, 'destroy']);
Route::get('/editsubCategory/{id}', [BookSubCategoryController::class, 'edit']);
Route::post('/updateSubCategory/{id}', [BookSubCategoryController::class, 'update']);

//Route for child catagory
Route::post('/postchildCatagory', [BookChildCategoryController::class, 'store']);
Route::get('/childCatagory', [BookChildCategoryController::class, 'index']);
Route::get('/deletechildCatagory/{id}', [BookChildCategoryController::class, 'destroy']);

//Route for author
Route::post('/postAuthor', [AuthorController::class, 'store']);
Route::get('/author', [AuthorController::class, 'index']);
Route::get('/deleteAuthor/{id}', [AuthorController::class, 'destroy']);
Route::get('/editAuthor/{id}', [AuthorController::class, 'edit']);
Route::post('/updateAuthor/{id}', [AuthorController::class, 'update']);

//Route for the data of frontend.
Route::get('/services', [FrontendController::class, 'getServices']);
Route::get('/books', [FrontendController::class, 'getBooksData']);
Route::get('/searchresults', [FrontendController::class, 'getSearchResults']);
Route::get('/', [FrontendController::class, 'getHomePage']);
Route::get('/register', [FrontendController::class, 'forRegisteration']);



//Route for user roles
Route::post('/postUserRoles', [UserRoleController::class, 'store']);
Route::get('/userrole', [UserRoleController::class, 'index']);
Route::get('/deleteUserRole/{id}', [UserRoleController::class, 'destroy']);
Route::get('/editUserRole/{id}', [UserRoleController::class, 'edit']);
Route::post('/updateUserRole/{id}', [UserRoleController::class, 'update']);

//Route for user district
Route::post('/postUserDistrict', [UserDistrictController::class, 'store']);
Route::get('/userdistrict', [UserDistrictController::class, 'index']);
Route::get('/editUserDistrict/{id}', [UserDistrictController::class, 'edit']);
Route::post('/updateUserDistrict/{id}', [UserDistrictController::class, 'update']);
Route::get('/deleteUserDistrict/{id}', [UserDistrictController::class, 'destroy']);


//Route for the slider images
Route::post('/postSliderImages', [SliderImagesController::class, 'store']);
Route::get('/sliderimages', [SliderImagesController::class, 'index']);
Route::get('/deleteSliderImages/{id}', [SliderImagesController::class, 'destroy']);
Route::get('/editSliderImages/{id}', [SliderImagesController::class, 'edit']);
Route::post('/updateSliderImages/{id}', [SliderImagesController::class, 'update']);


//Route for the reviews
Route::post('/postReviews', [TestimonialsController::class, 'store']);
Route::get('/reviews', [TestimonialsController::class, 'index']);
Route::get('/deleteReviews/{id}', [TestimonialsController::class, 'destroy']);
Route::get('/editReviews/{id}', [TestimonialsController::class, 'edit']);
Route::post('/updateReviews/{id}', [TestimonialsController::class, 'update']);


//Route for dynamic footer
Route::post('/postFooters', [FooterController::class, 'store']);
Route::get('/footers', [FooterController::class, 'index']);
Route::get('/deleteFooters/{id}', [FooterController::class, 'destroy']);
Route::get('/editFooters/{id}', [FooterController::class, 'edit']);
Route::post('/updateFooters/{id}', [FooterController::class, 'update']);

//Route for teams
Route::post('/postTeams', [TeamController::class, 'store']);
Route::get('/team', [TeamController::class, 'index']);
Route::get('/deleteteam/{id}', [TeamController::class, 'destroy']);
Route::get('/editteam/{id}', [TeamController::class, 'edit']);
Route::post('/updateTeams/{id}', [TeamController::class, 'update']);

//Route for admins
Route::get('/acceptuser', [PublicUserController::class, 'acceptuser']);
Route::post('/updateUser/{id}', [PublicUserController::class, 'updateUser']);


//Route for books
Route::post('/postBooks', [BookController::class, 'store']);
Route::get('/addbooks', [BookController::class, 'index']);
Route::get('/deleteBooks/{id}', [BookController::class, 'destroy']);
Route::get('/editBooks/{id}', [BookController::class, 'edit']);
Route::post('/updateBooks/{id}', [BookController::class, 'update']);
