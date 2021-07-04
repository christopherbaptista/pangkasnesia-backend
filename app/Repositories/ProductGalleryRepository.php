<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductGallery;
use App\Http\Requests\ProductGalleryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductGalleryRepository implements ProductGalleryRepositoryInterface
{
	public function getRole()
    {
        $role = Auth::user()->roles;
        return $role;
    }

    public function getAllProduct()
    {
        $items = ProductGallery::with('product')->get();
        return $items;
    }

    public function listItems()
    {
        $items = Product::all();
        return $items;
    }

    public function handleStore(ProductGalleryRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store(
            'assets/product', 'public'
        );
        return $data;
    }
    public function findItem($id)
    {
        $item = ProductGallery::findOrFail($id);
        return $item;
    }
}