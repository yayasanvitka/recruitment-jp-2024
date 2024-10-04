<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
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