<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {

    }

    public function registration(Request $request)
    {
        $rules = [
            'email' => 'required|string|email|max:255|unique:users',
        ];

        $this->validate($request, $rules);
    }

}
