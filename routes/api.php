<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;

Route::prefix('/suppliers')->group(function() {
    Route::prefix('/v1')->group(function() {
        Route::get("/", [SupplierController::class, "all"]); // GET /suppliers/v1
        Route::post("/", [SupplierController::class, "create"]); // POST /suppliers/v1
        Route::put("/{supplier}", [SupplierController::class, "update"]); // PUT /suppliers/v1/:id
        Route::delete("/{supplier}", [SupplierController::class, "delete"]); // DELETE /suppliers/v1/:id
    });
});

