<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function all(Request $request) {
        try {
            $categories = Category::all();

            $message = $categories->isNotEmpty() ? 'Category found' : 'Category not found';

            return ResponseHelper::returnOkResponse($message, $categories, true);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function detail(Category $category) {
        try {
            return ResponseHelper::returnOkResponse("Category found", $category);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function create(CategoryRequest $request) {
        try {
            $validated = $request->validated();

            $newCategory = Category::create($validated);

            return ResponseHelper::returnOkResponse("Category created successfully", $newCategory);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function update(CategoryRequest $request, Category $category) {
        try {
            $validated = $request->validated();

            $category->update($validated);

            return ResponseHelper::returnOkResponse("Category updated successfully", $category);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function delete(Category $category) {
        try {
            $category->delete();

            return ResponseHelper::returnOkResponse("Category deleted successfully", $category);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }
}
