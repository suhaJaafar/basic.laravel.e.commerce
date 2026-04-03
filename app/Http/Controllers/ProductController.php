<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    public function create(ProductRequest $request)
    {
        $user = User::find($request->user_id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $product = $user->products()->create($request->validated());
        return new ProductResource($product);
    }

    public function index($userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return ProductResource::collection($user->products);
    }

    public function all()
    {
        $returned_data = Product::with('orders')->paginate(10);
        return ProductResource::collection($returned_data);
    }


}
