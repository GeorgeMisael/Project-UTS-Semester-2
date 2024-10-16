<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\SuperAdminMiddleware;

// Register
Route::get('/register', [Controllers\AuthController::class, 'index']);
Route::post('/register/submit', [Controllers\AuthController::class, 'registerStore'])->name('register.submit');

// Login
Route::get('/', Controllers\AuthController::class)->name('login');
Route::post('/', [Controllers\AuthController::class, 'authenticate'])->name('authenticate');

//Logout
Route::post('/logout', [Controllers\AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function(){

  // Dashboard
  Route::get('/dashboard', [Controllers\DashboardController::class, 'index']);


  Route::middleware(AdminMiddleware::class)->group(function(){
    //Jenis User
    Route::get('/roles', [Controllers\RoleController::class, 'index'])->name('roles.index');
    Route::post('/roles', [Controllers\RoleController::class,'store'])->name('roles.store');
    Route::get('/roles/{id}', [Controllers\RoleController::class,'edit'])->name('roles.edit');
    Route::patch('/roles/{id}', [Controllers\RoleController::class,'update'])->name('roles.update');
    Route::delete('/roles/{id}', [Controllers\RoleController::class,'destroy'])->name('roles.destroy');

    //User
    Route::get('/user', [Controllers\UserController::class,'index']);
    Route::get('/user/tambah', [Controllers\UserController::class,'create'])->name('user.tambah');
    Route::post('/user/simpan', [Controllers\UserController::class,'store'])->name('user.simpan');
    Route::post('/user/{id}', [Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::patch('/user/{id}', [Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/user/{id}', [Controllers\UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/user/{id}/reset', [Controllers\UserController::class, 'reset'])->name('users.reset');

  });

  Route::middleware(SuperAdminMiddleware::class)->group(function(){
    //Menu
    Route::get('/menu', [Controllers\MenuController::class, 'index'])->name('menu.index');
    Route::get('/menu/tambah', [Controllers\MenuController::class, 'tambah'])->name('menu.tambah');
    Route::post('/menu/simpan', [Controllers\MenuController::class, 'simpan'])->name('menu.simpan');
    Route::get('/menu/edit/{id}', [Controllers\MenuController::class, 'edit'])->name('menu.edit');
    Route::post('/menu/update/{id}', [Controllers\MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [Controllers\MenuController::class,'destroy'])->name('menu.destroy');
  });


  // API BMKG
  Route::get('/gempa', [Controllers\ApiController::class, 'gempa']);

});

Route::prefix('messages')->middleware('auth')->group(function () {
    Route::get('/', [Controllers\MessageController::class, 'index'])->name('messages.index');
    Route::post('/send', [Controllers\MessageController::class, 'store'])->name('messages.send');
    Route::get('/create', [Controllers\MessageController::class, 'create'])->name('messages.create');

    Route::get('/{message}', [Controllers\MessageController::class, 'show'])->name('messages.show');
    Route::post('/{message_id}/publish', [Controllers\MessageController::class, 'publish'])->name('messages.publish');
     // Pastikan ini ada
    Route::get('/{message}/edit', [Controllers\MessageController::class, 'edit'])->name('messages.edit');
    Route::put('/{message}', [Controllers\MessageController::class, 'update'])->name('messages.update');
    Route::delete('/{message}', [Controllers\MessageController::class, 'destroy'])->name('messages.destroy');
    Route::get('/{message_id}/edit_draft', [Controllers\MessageController::class, 'editDraft'])->name('messages.edit_draft');
    Route::put('/{message_id}/update_draft', [Controllers\MessageController::class, 'updateDraft'])->name('messages.update_draft');
});
Route::get('/email/sent', [Controllers\MessageController::class, 'sent'])->name('messages.sent');
Route::get('email/draft', [Controllers\MessageController::class, 'indexDraft'])->name('messages.draft');
Route::get('/download/document/{file}', [Controllers\MessageController::class, 'downloadDocument'])->name('download.document')->middleware('auth');

