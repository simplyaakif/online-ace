<?php

    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\InvoicesController;
    use App\Http\Controllers\RecoveryController;
    use Illuminate\Support\Facades\Route;

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
if (!App::environment('production')) {
    Route::get('/', [HomeController::class,'index'])->name('website.home');
    Route::get('course', [HomeController::class,'course'])->name('website.course');
    Route::resource('recoveries', RecoveryController::class,['only' => 'show']);
    Route::resource('invoices', InvoicesController::class,['only' => 'show']);


    Route::get('register-online', [HomeController::class,'registerOnline'])->name('register-online');
}
else{
 Route::get('/',function (){
     return to_route('filament.admin.auth.login');
 }) ;
}


