<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Category;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    public function all() {
        try {
            $categories = Category::all();

            $message = $categories->isNotEmpty() ? "Category found" : "Category not found";

            return ResponseHelper::returnOkResponse($message, $categories);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function create(CategoryCreateRequest $request) {
        try {
            $validated = $request->validated(); 

            $createdCategory = Category::create($validated);

            return ResponseHelper::returnCreatedResponse("Category created successfully", $createdCategory);
        } catch (\Throwable $th) {
            return ResponseHelper::throwInternalError($th);
        }
    }

    public function update(CategoryUpdateRequest $request, Category $category) {
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
