<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class OrderController extends Controller
{
    public function create(OrderRequest $request)
    {
        $user = User::find($request->user_id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $products = Product::whereIn('id', $request->product_ids)->get();
        logger()->info($products);
        logger()->info('test');
        if ($products->count() !== count($request->product_ids)) {
            return response()->json(['message' => 'One or more products not found'], 404);
        }
        // Calculate total price
        $totalPrice = 0;
        foreach($request->product_ids as $productId) {
            $product = $products->where('id', $productId)->first();
            if ($product) {
                $totalPrice += $product->price;
            }
        }
        $validatedData = $request->validated();
        $validatedData['total_price'] = $totalPrice;
        $order = $user->orders()->create($validatedData);

        return new OrderResource($order);
    }

    public function index($userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return OrderResource::collection($user->orders);
    }
    public function all()
    {
        $returned_data = Order::paginate(10);
        return OrderResource::collection($returned_data);
    }
}
