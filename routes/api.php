<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\WarehouseController;

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

Route::prefix("products")->middleware("auth:sanctum")->group(function () {
    Route::prefix("/v1")->group(function () { 
        Route::get("/", [ProductController::class, "all"]); // GET /products
        Route::post("/", [ProductController::class, "create"]); // POST /products
        Route::get("/{product}", [ProductController::class, "detail"]); // GET /products/{product}
        Route::put("/{product}", [ProductController::class, "update"]); // PUT /products/{product}
        Route::delete("/{product}", [ProductController::class, "delete"]); // DELETE /products/{product}
    });  
});

Route::prefix("warehouses")->middleware("auth:sanctum")->group(function () {
    Route::prefix("/v1")->group(function () { 
        Route::get("/", [WarehouseController::class, "all"]); // GET /warehouses
        Route::post("/", [WarehouseController::class, "create"]); // POST /warehouses
        Route::get("/{warehouse}", [WarehouseController::class, "detail"]); // GET /warehouses/{warehouse}
        Route::put("/{warehouse}", [WarehouseController::class, "update"]); // PUT /warehouses/{warehouse}
        Route::delete("/{warehouse}", [WarehouseController::class, "delete"]); // DELETE /warehouses/{warehouse}
    });  
});