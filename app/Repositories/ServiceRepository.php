<?php

namespace App\Repositories;

use App\Models\Service;
use App\Models\ServiceGallery;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ServiceRepository implements ServiceRepositoryInterface
{
	public function getRole()
    {
        $role = Auth::user()->roles;
        return $role;
    }

    public function listItems()
    {
        $items = Service::all();
        return $items;
    }

    public function handleStore(ServiceRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        return $data;
    }
    public function findItem($id)
    {
        $item = Service::findOrFail($id);
        return $item;
    }
}