<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\TaskAPIController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UtilController::class, 'loadWelcome'])->name('welcome');

Route::get('/hello/{message}', function ($message) {
    return '<h1>Hello '.$message.'</h1>';
});

//rota dashboard
Route::get('/dashboard', [DashboardController::class, 'home'])
    ->middleware('auth')
    ->name('dashboard.home');


//rota de homepage
Route::get('/home', [UtilController::class, 'loadHomepage'])->name('home');  //nome q eu dou a este caminho p/ q possa chamar interna/

//rota ver users
Route::get('/users', [UserController::class, 'allUsers'] )->name('users.all');

//rota add users
Route::get('/add-users', [UserController::class, 'addUsers'] )->name('users.add');

//rota de apagar users
Route::get('/delete-users/{id}', [UserController::class, 'deleteUsers'] )->name('users.delete');

//rota para ver /editar users
Route::get('/edit-users/{id}',[UserController::class, 'editUsers'] )->name('users.edit')->middleware('auth');

//rota de registar users
Route::post('/store-users', [UserController::class, 'storeUser'])->name('users.store');

//rota de actualizar users
Route::put('/update-user', [UserController::class, 'updateUser'])->name('users.update');



//rota p/ ver Tasks
Route::get('/tasks', [TaskController::class, 'allTasks'] )->name('tasks.all');

//rota de apagar tasks
Route::get('/delete-tasks/{id}', [TaskController::class, 'deleteTasks'])->name('tasks.delete');

//rota para ver/ editar tasks
Route::get('/edit-tasks/{id}', [TaskController::class, 'editTasks'])->name('tasks.edit');

//rota p/ mostrar o formulário de adicionar tasks
Route::get('/add-tasks', [TaskController::class, 'addTasks'])->name('tasks.add');

//rota p/ guardar a task
Route::post('/store-tasks', [TaskController::class, 'storeTasks'])->name('tasks.store');



//rota p/ ver tabela prendas de natal
Route::get('/gifts', [GiftController::class, 'allGifts'] )->name('gifts.all');

//rota de apagar tasks
Route::get('/delete-gifts/{id}', [GiftController::class, 'deleteGifts'])->name('gifts.delete');

//rota para ver/ editar tasks
Route::get('/edit-gifts/{id}', [GiftController::class, 'editGifts'])->name('gifts.edit');

//rota p/ mostrar o formulário de adicionar tasks
Route::get('/add-gifts', [GiftController::class, 'addGifts'])->name('gifts.add');

//rota p/ guardar a task
Route::post('/store-gifts', [GiftController::class, 'storeGifts'])->name('gifts.store');

//rota p/ atualizar a prenda
Route::put('/update-gifts', [GiftController::class, 'updateGifts'])->name('gifts.update');



//rota fallback
Route::fallback(function(){
    return view('utils.fallback');
});
