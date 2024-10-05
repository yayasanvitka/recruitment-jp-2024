<?php

namespace App\Http\Controllers\Api;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;

class SupplierController extends Controller
{
    public function all(Request $request) {
        try {
            $suppliers = Supplier::all();

            $message = $suppliers->isNotEmpty() ? 'Supplier found' : 'Supplier not found';

            return ResponseHelper::returnOkResponse($message, $suppliers, true);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function detail(Supplier $supplier) {
        try {
            return ResponseHelper::returnOkResponse("Supplier found", $supplier);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function create(SupplierRequest $request) {
        try {
            $validated = $request->validated();

            $newSupplier = Supplier::create($validated);

            return ResponseHelper::returnCreatedResponse("Supplier created successfully", $newSupplier);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function update(SupplierRequest $request, Supplier $supplier) {
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
