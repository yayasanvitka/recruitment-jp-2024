<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function all(Request $request) {
        try {
            $products = Product::all();

            $message = $products->isNotEmpty() ? 'Product found' : 'Product not found';

            return ResponseHelper::returnOkResponse($message, $products);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function detail(Product $product) {
        try {
            return ResponseHelper::returnOkResponse("Product found", $product);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function create(ProductRequest $request) {
        try {
            $validated = $request->validated();

            $newProduct = Product::create($validated);

            return ResponseHelper::returnOkResponse("Product created successfully", $newProduct);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function update(ProductRequest $request, Product $product) {
        try {
            $validated = $request->validated();

            $product->update($validated);

            return ResponseHelper::returnOkResponse("Product updated successfully", $product);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function delete(Product $product) {
        try {
            $product->delete();

            return ResponseHelper::returnOkResponse("Product deleted successfully", $product);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }
}
