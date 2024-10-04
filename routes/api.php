<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoryController;

Route::prefix('/suppliers')->group(function() {
    Route::prefix('/v1')->group(function() {
        Route::get("/", [SupplierController::class, "all"]); // GET /suppliers/v1
        Route::post("/", [SupplierController::class, "create"]); // POST /suppliers/v1
        Route::put("/{supplier}", [SupplierController::class, "update"]); // PUT /suppliers/v1/:id
        Route::delete("/{supplier}", [SupplierController::class, "delete"]); // DELETE /suppliers/v1/:id
    });
});

Route::prefix('/categories')->group(function() {
    Route::prefix('/v1')->group(function() {
        Route::get("/", [CategoryController::class, "all"]); // GET /categories/v1
        Route::post("/", [CategoryController::class, "create"]); // POST /categories/v1
        Route::put("/{category}", [CategoryController::class, "update"]); // PUT /categories/v1/:id
        Route::delete("/{category}", [CategoryController::class, "delete"]); // DELETE /categories/v1/:id
    });
});