<?php

use App\Http\Controllers\FactorController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\LogRController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarrantyController;
use App\Jobs\ProductCreateJob;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//TEST
Route::get('test', function(){
    ProductCreateJob::dispatch();
});

//REGISTER
Route::post('register', [LogRController::class, 'register'])->name('register');

//LOGIN
Route::post('login', [LogRController::class, 'login'])->name('login');

//LOGOUT
Route::post('logout', [LogRController::class, 'logout'])->name('logout');

//USER
Route::group(['prefix' => 'Users', 'as' => 'Users', 'middleware' => 'auth:sanctum'], function () {
    //users_list
    Route::get('index', [UserController::class, 'index'])->name('index');
    //users_create
    Route::post('create', [UserController::class, 'create'])->name('create');
    //users_update
    Route::put('update', [UserController::class, 'update'])->name('update');
    //users_delete
    Route::delete('delete', [UserController::class, 'delete'])->name('delete');
    //me
    Route::get('Me', [UserController::class, 'Me'])->name('Me');
});

//PRODUCT
Route::group(['prefix' => 'Products', 'as' => 'Products'], function () {
    //products_list
    Route::get('index', [ProductController::class, 'index'])->name('index');
    //products_create
    Route::post('create', [ProductController::class, 'create'])->name('create');
    //add_image
    Route::post('AddImage/{id}', [ProductController::class, 'AddImage'])->name('AddImage');
    //product_update
    Route::put('update', [ProductController::class, 'update'])->name('update');
    //product_delete
    Route::delete('delete', [ProductController::class, 'delete'])->name('delete');
});

//ORDER
Route::group(['prefix' => 'Orders', 'as' => 'Orders'], function () {
    //users_list
    Route::get('index', [OrderController::class, 'index'])->name('index');
    //users_create
    Route::post('create', [OrderController::class, 'create'])->name('create');
    //users_update
    Route::put('update', [OrderController::class, 'update'])->name('update');
    //users_delete
    Route::delete('delete', [OrderController::class, 'delete'])->name('delete');
});

//FACTOR
Route::group(['prefix' => 'Factors', 'as' => 'Factors'], function () {
    //users_list
    Route::get('index', [FactorController::class, 'index'])->name('index');
    //users_create
    Route::post('create', [FactorController::class, 'create'])->name('create');
    //users_update
    Route::put('update', [FactorController::class, 'update'])->name('update');
    //users_delete
    Route::delete('delete', [FactorController::class, 'delete'])->name('delete');
});

//LABEL
Route::group(['prefix' => 'Labels', 'as' => 'Labels'], function () {
    //users_list
    Route::get('index', [LabelController::class, 'index'])->name('index');
    //users_create
    Route::post('create', [LabelController::class, 'create'])->name('create');
    //users_update
    Route::put('update', [LabelController::class, 'update'])->name('update');
    //users_delete
    Route::delete('delete', [LabelController::class, 'delete'])->name('delete');
});

//MESSAGE
Route::group(['prefix' => 'Messages', 'as' => 'Messages'], function () {
    //users_list
    Route::get('index', [MessageController::class, 'index'])->name('index');
    //users_create
    Route::post('create', [MessageController::class, 'create'])->name('create');
    //users_update
    Route::put('update', [MessageController::class, 'update'])->name('update');
    //users_delete
    Route::delete('delete', [MessageController::class, 'delete'])->name('delete');
});

//NOTE
Route::group(['prefix' => 'Notes', 'as' => 'Notes'], function () {
    //users_list
    Route::get('index', [NoteController::class, 'index'])->name('index');
    //users_create
    Route::post('create', [NoteController::class, 'create'])->name('create');
    //users_update
    Route::put('update', [NoteController::class, 'update'])->name('update');
    //users_delete
    Route::delete('delete', [NoteController::class, 'delete'])->name('delete');
});

//TASK
Route::group(['prefix' => 'Tasks', 'as' => 'Tasks'], function () {
    //tasks_list
    Route::get('index', [TaskController::class, 'index'])->name('index');
    //tasks_create
    Route::post('create', [TaskController::class, 'create'])->name('create');
    //tasks_update
    Route::put('update', [TaskController::class, 'update'])->name('update');
    //tasks_delete
    Route::delete('delete', [TaskController::class, 'delete'])->name('delete');
});

//TEAM
Route::group(['prefix' => 'Teams', 'as' => 'Teams'], function () {
    //teams_list
    Route::get('index', [TeamController::class, 'index'])->name('index');
    //teams_create
    Route::post('create', [TeamController::class, 'create'])->name('create');
    //teams_update
    Route::put('update', [TeamController::class, 'update'])->name('update');
    //teams_delete
    Route::delete('delete', [TeamController::class, 'delete'])->name('delete');
});

//TICKET
Route::group(['prefix' => 'Tickets', 'as' => 'Tickets'], function () {
    //tickets_list
    Route::post('index', [TicketController::class, 'index'])->name('index');
    //tickets_create
    Route::post('create', [TicketController::class, 'create'])->name('create');
    //tickets_update
    Route::put('update', [TicketController::class, 'update'])->name('update');
    //tickets_delete
    Route::delete('delete', [TicketController::class, 'delete'])->name('delete');
});

//WARRANTY
Route::group(['prefix' => 'Warranties', 'as' => 'Warranties'], function () {
    //warrenties_list
    Route::get('index', [WarrantyController::class, 'index'])->name('index');
    //warrenties_create
    Route::post('create', [WarrantyController::class, 'create'])->name('create');
    //warrenties_update
    Route::put('update', [WarrantyController::class, 'update'])->name('update');
    //warrenties_delete
    Route::delete('delete', [WarrantyController::class, 'delete'])->name('delete');
});

//MEDIA
Route::group(['prefix' => 'Media', 'as' => 'Media'], function () {
    //media_list
    Route::get('index', [MediaController::class, 'index'])->name('index');
    //media_create
    Route::post('create', [MediaController::class, 'create'])->name('create');
    //media_update
    Route::put('update', [MediaController::class, 'update'])->name('update');
    //media_delete
    Route::delete('delete', [MediaController::class, 'delete'])->name('delete');
    //media_download
    Route::post('download', [MediaController::class, 'download'])->name('download');
});
