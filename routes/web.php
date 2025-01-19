<?php

use Illuminate\Support\Facades\Route;

/*
 * Use Route Controllers.
 */
use App\Http\Controllers\StartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LogViewerController;
use App\Http\Controllers\QueueJobsController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\AdminController;

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

// Post auth Start page
Route::get('/', [StartController::class, 'start'])->middleware('auth')->name('start');


/*
 * Testing
 */
Route::get('/test/{id}', [TestController::class, 'test']);

/*
 * Goals
 */
Route::get('/status', [GoalsController::class, 'status'])->middleware('auth')->name('status');
Route::get('/goals',  [GoalsController::class, 'goals']) ->middleware('auth')->name('goals');

/*
 * Opportunity
 */


/*
 * User
 */

// Register
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'register_submit'])->middleware('guest');


// Login
Route::get('/login',    [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login',    [UserController::class, 'login_submit'])->middleware('guest');

// Logout
Route::get('/logout',   [UserController::class, 'logout'])->middleware('auth');


/*
 * Admin
 */

// Development
Route::get('/logs', [LogViewerController::class, 'index'])->name('logs.index')->middleware('auth');
Route::post('/logs', [LogViewerController::class, 'clear'])->name('logs.clear')->middleware('auth');
Route::get('/jobs', [QueueJobsController::class, 'index'])->name('queue_jobs')->middleware('auth');
Route::get('/jobs/{id}/view', [QueueJobsController::class, 'job_view'])->name('job_view')->middleware('auth');

// Users
Route::get('/admin/users',   [AdminController::class, 'user_list'])->middleware('auth')->name('admin.users');
Route::get('/admin/users/{uuid}/update',   [AdminController::class, 'user_form'])->middleware('auth')->name('admin.user.form');
Route::post('/admin/users/{uuid}/update',   [AdminController::class, 'user_submit'])->middleware('auth')->name('admin.user.submit');

/*
 * Account
 */
Route::get('/account', [AccountController::class, 'update_form'])->middleware('auth')->name('account');
Route::get('/account/update', [AccountController::class, 'update_submit'])->middleware('auth')->name('account.update_form');
Route::post('/account/update', [AccountController::class, 'update_submit'])->middleware('auth')->name('account.update_submit');
Route::get('/account/onboarding', [AccountController::class, 'onboarding_form'])->middleware('auth')->name('account.onboarding_form');
Route::post('/account/onboarding', [AccountController::class, 'onboarding_submit'])->middleware('auth')->name('account.onboarding_submit');

/*
 * Stages
 */
// Route::get('/stages', [StagesController::class, 'list_stages'])->middleware('auth')->name('stages.all');
// Route::post('/stages', [StagesController::class, 'list_sort_submit'])->middleware('auth')->name('stages.sort_submit');
// Route::get('/stages/{uuid}/update', [StagesController::class, 'update_form'])->middleware('auth')->name('stages.update_form');
// Route::post('/stages/{uuid}/update', [StagesController::class, 'update_submit'])->middleware('auth')->name('stages.update_submit');

/*
 * Opportunities
 */
Route::get('/opportunities/stages', [OpportunityController::class, 'stages'])->middleware('auth')->name('opportunities.stages');
Route::get('/opportunities/{uuid}/list', [OpportunityController::class, 'in_stage'])->middleware('auth')->name('opportunities.stage.list');
Route::get('/opportunities/create', [OpportunityController::class, 'create_form'])->middleware('auth')->name('opportunities.create_form');
Route::post('/opportunities/create', [OpportunityController::class, 'create_submit'])->middleware('auth')->name('opportunities.create_submit');
Route::get('/opportunities/{uuid}/view', [OpportunityController::class, 'view'])->middleware('auth')->name('opportunities.view');
Route::get('/opportunities/{uuid}/to-stage/{stage_uuid}', [OpportunityController::class, 'move_to_stage'])->middleware('auth')->name('opportunities.to_stage');
Route::get( '/opportunities/{uuid}/update', [OpportunityController::class, 'update_form'])->middleware('auth')->name('opportunities.update_form');
Route::post('/opportunities/{uuid}/update', [OpportunityController::class, 'update_submit'])->middleware('auth')->name('opportunities.update_submit');
