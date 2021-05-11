<?php

namespace App\Repositories;

use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryRepository
{
    public function all()
    {
        $categories = CategoryResource::collection(Category::where('published', 1)->orderBy('order_is')->get());

        if (!$categories->isEmpty()) {
            return success([
                'categories' => $categories
            ]);
        }

        return failed('not found any category', [], 404);
    }
    public function findById($id)
    {
        $category = CategoryResource::collection(
            Category::where('published', 1)->where('id', $id)->get()
        );

        if (!$category->isEmpty()) {
            return success($category);
        }

        return failed('this category not found or not available', [], 404);
    }
}
