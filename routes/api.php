<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SupplierController;

Route::post('/login', [AuthController::class, 'login']); // POST /login

Route::prefix("suppliers")->middleware("auth:sanctum")->group(function () {
    Route::prefix("/v1")->group(function () { 
        Route::get("/", [SupplierController::class, "all"]); // GET /suppliers
        Route::post("/", [SupplierController::class, "create"]); // POST /suppliers
        Route::get("/{supplier}", [SupplierController::class, "detail"]); // GET /suppliers/{supplier}
        Route::put("/{supplier}", [SupplierController::class, "update"]); // PUT /suppliers/{supplier}
        Route::delete("/{supplier}", [SupplierController::class, "delete"]); // DELETE /suppliers/{supplier}
    });  
});

Route::prefix("categories")->middleware("auth:sanctum")->group(function () {
    Route::prefix("/v1")->group(function () { 
        Route::get("/", [CategoryController::class, "all"]); // GET /categories
        Route::post("/", [CategoryController::class, "create"]); // POST /categories
        Route::get("/{category}", [CategoryController::class, "detail"]); // GET /categories/{category}
        Route::put("/{category}", [CategoryController::class, "update"]); // PUT /categories/{category}
        Route::delete("/{category}", [CategoryController::class, "delete"]); // DELETE /categories/{category}
    });  
});