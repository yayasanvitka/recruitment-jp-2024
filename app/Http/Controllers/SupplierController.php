<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Supplier;
use App\Http\Requests\SupplierCreateRequest;
use App\Http\Requests\SupplierUpdateRequest;

class SupplierController extends Controller
{
    public function all() {
        try {
            $suppliers = Supplier::all();

            $message = $suppliers->isNotEmpty() ? "Supplier found" : "Supplier not found";

            return ResponseHelper::returnOkResponse($message, $suppliers);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function create(SupplierCreateRequest $request) {
        try {
            $validated = $request->validated(); 

            $createdSupplier = Supplier::create($validated);

            return ResponseHelper::returnCreatedResponse("Supplier created successfully", $createdSupplier);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function update(SupplierUpdateRequest $request, Supplier $supplier) {
        try {
            $validated = $request->validated(); 

            $supplier->update($validated);

            return ResponseHelper::returnOkResponse("Supplier updated successfully", $supplier);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function delete(Supplier $supplier) {
        try {
            $supplier->delete();

            return ResponseHelper::returnOkResponse("Supplier deleted successfully", $supplier);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }
} 
