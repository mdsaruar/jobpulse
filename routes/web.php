<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\packageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Backend\jobController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\SkillController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\JobsController;
use App\Http\Controllers\backend\VendorController;
use App\Http\Controllers\Backend\backendController;
use App\Http\Controllers\Backend\JobTypeController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\StockHistoryController;
use App\Http\Controllers\Backend\JobApplicationController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


//Routing Group without Middleware

/*
|--------------------------------------------------------------------------
| Admin Web Routes with admin prefix
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

Route::prefix('admin')->group(function () {
    Route::get('/', [backendController::class, 'index'])->name('admin.dashboard');

/*
|--------------------------------------------------------------------------
| Packages Routes
|--------------------------------------------------------------------------
*/

Route::get('/packages', [packageController::class, 'show'])->name('packages.show');
Route::get('package/create', [packageController::class, 'create'])->name('package.create');
Route::post('package/store', [packageController::class, 'store'])->name('package.store');



/*
|--------------------------------------------------------------------------
| Admin Job Section Job Routes
|--------------------------------------------------------------------------
*/

Route::get('/jobs', [jobController::class, 'show'])->name('jobs.show');
Route::get('job/create', [jobController::class, 'create'])->name('job.create');
Route::post('job/store', [jobController::class, 'store'])->name('job.store');


/*
|--------------------------------------------------------------------------
| Category Routes
|--------------------------------------------------------------------------
*/

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');




/*
|--------------------------------------------------------------------------
| TobType Routes
|--------------------------------------------------------------------------
*/

Route::get('/job_type_list', [JobTypeController::class, 'index'])->name('JobType.index');
Route::get('/job_type/create', [JobTypeController::class, 'create'])->name('JobType.create');
Route::post('/job_type/store', [JobTypeController::class, 'store'])->name('JobType.store');
Route::get('/job_type/edit/{id}', [JobTypeController::class, 'edit'])->name('JobType.edit');
Route::post('/job_type/{id}', [JobTypeController::class, 'update'])->name('JobType.update');
Route::delete('/job_type/{id}', [JobTypeController::class, 'destroy'])->name('JobType.destroy');


/*
|--------------------------------------------------------------------------
| skill Routes
|--------------------------------------------------------------------------
*/

Route::get('/skills', [SkillController::class, 'index'])->name('skill.index');
Route::get('/skill/create', [SkillController::class, 'create'])->name('skill.create');
Route::post('/skill/store', [SkillController::class, 'store'])->name('skill.store');
Route::get('/skill/edit/{id}', [SkillController::class, 'edit'])->name('skill.edit');
Route::post('/skill/{id}', [SkillController::class, 'update'])->name('skill.update');
Route::delete('/skill/{id}', [SkillController::class, 'destroy'])->name('skill.destroy');

/*
|--------------------------------------------------------------------------
| Job Routes
|--------------------------------------------------------------------------
*/

Route::get('/jobs', [JobController::class, 'index'])->name('job.index');
Route::get('/job/create', [JobController::class, 'create'])->name('job.create');
Route::post('/job/store', [JobController::class, 'store'])->name('job.store');
Route::get('/job/edit/{id}', [JobController::class, 'edit'])->name('job.edit');
Route::post('/job/{id}', [JobController::class, 'update'])->name('job.update');
Route::delete('/job/{id}', [JobController::class, 'destroy'])->name('job.destroy');


/*
|--------------------------------------------------------------------------
| Job Application Routes
|--------------------------------------------------------------------------
*/

Route::get('/JobApplication', [JobApplicationController::class, 'index'])->name('job.application.index');
Route::get('/JobApplication/edit/{id}', [JobApplicationController::class, 'update'])->name('job.application.edit');
Route::post('/JobApplication/edit/{id}', [JobApplicationController::class, 'update'])->name('job.application.update');




/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['role:superadmin']], function () {
    Route::get('/users', [UserController::class, 'UserList'])->name('users.list');
});



Route::get('/company_list', [UserController::class, 'CompanyList'])->name('company.list');
// Route::get('/job/create', [JobController::class, 'create'])->name('job.create');
// Route::post('/job/store', [JobController::class, 'store'])->name('job.store');
Route::get('/user/edit/{id}', [JobController::class, 'edit'])->name('user.edit');
Route::post('/user/{id}', [JobController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [JobController::class, 'destroy'])->name('user.destroy');






});


});


/*
|--------------------------------------------------------------------------
| End of Admin Web Routes with admin prefix
|--------------------------------------------------------------------------
*/

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/AssignRole', [UserController::class, 'AssignRole']);

/*
|--------------------------------------------------------------------------
| Frontend Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home_page', [HomeController::class, 'home_page'])->name('home_page');
Route::get('/jobs',[JobsController::class,'index'])->name('jobs');
Route::get('/jobs/detail/{id}',[JobsController::class,'detail'])->name('jobDetail');
Route::post('/apply-job',[JobsController::class,'applyJob'])->name('applyJob');
Route::post('/save-job',[JobsController::class,'saveJob'])->name('saveJob');

Route::get('/registration', [UserController::class, 'create'])->name('account.registration');
Route::get('/userLogin', [UserController::class, 'userLogin'])->name('account.login');
Route::post('/user/create', [UserController::class, 'Store'])->name('account.processRegistration');
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('account.authenticate');
Route::get('/account/profile', [UserController::class, 'profile'])->name('account.profile');
Route::get('/user/logout', [UserController::class, 'logout'])->name('account.logout');







