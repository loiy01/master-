<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $query = Product::query();

    if ($request->has('search') && !empty($request->search)) {
        $query->where('name', 'LIKE', '%' . $request->search . '%')
              ->orWhere('description', 'LIKE', '%' . $request->search . '%');
    }

    $products = $query->get();

    return view('auth.user.products.products', compact('products'));
}


    
}
