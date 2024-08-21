<?php

use Illuminate\Support\Facades\Route;

//* Client Controllers
use App\Http\Controllers\Client\HomeController;

//* Admin Controllers
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CMS\HeaderSectionController;

// Todo => Guest Routes
Route::get("/home",[HomeController::class, 'index'])->name("home");
Route::get('/',[HomeController::class,'index'])->name("home");


//*Admin Controllers
Route::prefix("admin")->group(function(){

    Route::get("/dashboard",[AdminDashboardController::class,'index'])->name("admin:home");

    Route::get("header/list", [HeaderSectionController::class, 'index'])->name("admin:header:list");

    Route::get("header/create", [HeaderSectionController::class, 'create'])->name("admin:header:create");

    Route::post("header/store", [HeaderSectionController::class, 'store'])->name("admin:header:store");

    Route::get("header/delete/{id}", [HeaderSectionController::class, 'delete'])->name("admin:header:delete");

    Route::get("header/edit/{id}", [HeaderSectionController::class, 'edit'])->name("admin:header:edit");

    Route::post("header/update/{id}", [HeaderSectionController::class, 'update'])->name("admin:header:update");
});
