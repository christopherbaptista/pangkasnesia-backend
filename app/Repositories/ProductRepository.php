<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductGallery;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductRepository implements ProductRepositoryInterface
{
	public function getRole()
    {
        $role = Auth::user()->roles;
        return $role;
    }

    public function listItems()
    {
        $items = Product::all();
        return $items;
    }

    public function handleStore(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        return $data;
    }
    public function findItem($id)
    {
        $item = Product::findOrFail($id);
        return $item;
    }
}