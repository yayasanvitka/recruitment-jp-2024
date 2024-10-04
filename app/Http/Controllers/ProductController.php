<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(Request $request) {
        try {
            $products = Product::all();
            return ResponseHelper::returnOkResponse($products);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function create(CreateProductRequest $request) {
        try {
            $validated = $request->validated();

            $createdProduct = Product::create($validated);            

            return ResponseHelper::returnOkResponse($createdProduct);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }
}
