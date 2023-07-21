<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']); //"index" mostra todos
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth'); //"create"mostrar o formulário de criar com registo na base de dados
Route::get('/events/{id}', [EventController::class, 'show']); //"show" mostrar dado em específico
Route::post('/events', [EventController::class, 'store']); //"store" mostrar os dados da base de dados
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth');
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth');

Route::get('/products', function () {
    
    $search = request('search');

    return view('products', ['search' => $search]);
});

Route::get('/product/{id}', function ($id = null) {
    return view('product', ['id' => $id]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');

Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');