<?php

namespace App\Http\Controllers\Api;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\WarehouseRequest;

class WarehouseController extends Controller
{
    public function all(Request $request) {
        try {
            $warehouses = Warehouse::all();

            $message = $warehouses->isNotEmpty() ? 'Warehouse found' : 'Warehouse not found';

            return ResponseHelper::returnOkResponse($message, $warehouses, true);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function detail(Warehouse $warehouse) {
        try {
            $warehouse->load(["products"]);

            $warehouse["product_count"] = $warehouse->products->count();

            return ResponseHelper::returnOkResponse("Warehouse found", $warehouse);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function create(WarehouseRequest $request) {
        try {
            $validated = $request->validated();

            $newWareHouse = Warehouse::create($validated);

            if(!empty($validated['products'])) {
                $newWareHouse->products()->sync($validated['products']);
            }

            $newWareHouse->load("products");

            return ResponseHelper::returnCreatedResponse("Warehouse created successfully", $newWareHouse);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function update(WarehouseRequest $request, Warehouse $warehouse) {
        try {
            $validated = $request->validated();

            $warehouse->update($validated);

            if(!empty($validated['products'])) {
                $warehouse->products()->sync($validated['products']);
            }

            $warehouse->load("products");

            return ResponseHelper::returnOkResponse("Warehouse updated successfully", $warehouse);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function delete(Warehouse $warehouse) {
        try {
            $warehouse->products()->detach();

            $warehouse->delete();

            return ResponseHelper::returnOkResponse("Warehouse deleted successfully", $warehouse);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }
}
