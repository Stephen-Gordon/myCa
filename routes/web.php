<?php
//use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\User\CustomerController as UserCustomerController;

/* use Illuminate\Support\Facades\Auth;
 *//*
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



