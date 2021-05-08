<?php

namespace App\Repositories;

use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryRepository
{
    public function all()
    {
        $categories = CategoryResource::collection(Category::where('published',1)->orderBy('order_is')->get());
            if (!$categories->isEmpty()) {
                return response()->json([
                'status' => 200,
                'categories' => $categories
                ]);
            }

        return response()->json(['status' => 404,'message'=>'not found any category']);

    }    
    public function findById($id)
    {

        $category = CategoryResource::collection(
            Category::where('published',1)->where('id', $id)->get()
        );
        if (!$category->isEmpty()) {

            return response()->json(['status' => 200, 'category' => $category]);

        }

        return response()->json(['status' => 404,'message'=>'this category not found or not available']);
    }
   

}
