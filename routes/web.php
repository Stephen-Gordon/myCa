<?php
//use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\User\CustomerController as UserCustomerController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;



//Each link has a particular route

//Find the route in Web.php

//Web.php decides where to route

//then goes to the controller

//Controller then deceides which View / Page to load

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');

Route::get('user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');

Route::get('/',[PageController::class, 'welcome'])->name('welcome');
Route::get('/about',[PageController::class, 'about'])->name('about');

Route::get('user/customers/', [UserCustomerController::class, 'index'])->name('user.customers.index');
Route::get('user/customers/{id}', [UserCustomerController::class, 'show'])->name('user.customers.show');

//Admin

//Goes to the controller and calls a function
Route::get('/admin/customers/create', [AdminCustomerController::class, 'create'])->name('admin.customers.create');

Route::get('/admin/customers/', [AdminCustomerController::class, 'index'])->name('admin.customers.index');
Route::get('/admin/customers/{id}', [AdminCustomerController::class, 'show'])->name('admin.customers.show');
Route::get('/admin/customers/{id}/edit', [AdminCustomerController::class, 'edit'])->name('admin.customers.edit');
Route::post('/admin/customers/store', [AdminCustomerController::class, 'store'])->name('admin.customers.store');
Route::put('/admin/customers/{id}', [AdminCustomerController::class, 'update'])->name('admin.customers.update');
Route::delete('/admin/customers/{id}', [AdminCustomerController::class, 'destroy'])->name('admin.customers.destroy');





