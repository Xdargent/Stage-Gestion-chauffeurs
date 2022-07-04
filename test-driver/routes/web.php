<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RefController;
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
return redirect()->route('login');
    // return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

Route::group(['middleware'=> 'auth'],function () {
    Route::group(['middleware'=> 'role:admin,test'],function () {
        Route::get('/test', function () {
        return view('test');    
    })
    ->name('test');
    
    
        Route::get('/cars', function () {
        return view('cars');    
    })
    ->name('cars');


    // La route-ressource => Les routes "user.*"
    Route::resource("users", UserController::class);
    Route::resource("bons", BonController::class);
    Route::get('/user-images',[UserController::class,'images'])->name('users.images');
    Route::get('/remove-image',[UserController::class,'removeImages'])->name('users.remove');
	Route::get('/users-suppr',[UserController::class,'suppr'])->name('users.suppr');
    Route::post('/add-image',[UserController::class,'addImages'])->name('users.add');
    Route::resource("referants", RefController::class);
  });
});
 
require __DIR__ . '/auth.php';
