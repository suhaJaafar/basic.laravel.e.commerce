<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function get()
    {
        $returned_data = User::with('products')->with('orders')->paginate(10);
        return UserResource::collection($returned_data);
    }

    public function post(UserRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);

        return new UserResource($user);
    }
}
