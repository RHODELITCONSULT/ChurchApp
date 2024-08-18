<?php

use Illuminate\Support\Facades\Route;

//* Client Controllers
use App\Http\Controllers\Client\HomeController;

//* Admin Controllers
use App\Http\Controllers\Admin\AdminDashboardController;

// Todo => Guest Routes
Route::get("/home",[HomeController::class, 'index'])->name("home");
Route::get('/',[HomeController::class,'index'])->name("home");


//*Admin Controllers
Route::prefix("admin")->group(function(){

    Route::get("/dashboard",[AdminDashboardController::class,'index'])->name("admin:home");
});
