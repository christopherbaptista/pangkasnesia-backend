<?php

namespace App\Repositories;

use App\Models\Service;
use App\Models\ServiceGallery;
use App\Http\Requests\ServiceGalleryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ServiceGalleryRepository implements ServiceGalleryRepositoryInterface
{
	public function getRole()
    {
        $role = Auth::user()->roles;
        return $role;
    }

    public function getAllService()
    {
        $items = ServiceGallery::with('service')->get();
        return $items;
    }

    public function listItems()
    {
        $items = Service::all();
        return $items;
    }

    public function handleStore(ServiceGalleryRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store(
            'assets/product', 'public'
        );
        return $data;
    }
    public function findItem($id)
    {
        $item = ServiceGallery::findOrFail($id);
        return $item;
    }
}