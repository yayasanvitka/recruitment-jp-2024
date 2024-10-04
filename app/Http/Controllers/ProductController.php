<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    public function all(Request $request) {
        try {
            $products = Product::all();

            $message = $products->isNotEmpty() ? "Product found" : "Product not found";

            return ResponseHelper::returnOkResponse($message, $products);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function create(ProductCreateRequest $request) {
        try {
            $validated = $request->validated();

            $createdProduct = Product::create($validated);            

            return ResponseHelper::returnOkResponse("Product created successfully", $createdProduct);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function update(ProductUpdateRequest $request, Product $product) {
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
