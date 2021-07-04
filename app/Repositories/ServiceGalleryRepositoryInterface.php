<?php 

namespace App\Repositories;

use App\Http\Requests\ServiceGalleryRequest;

interface ServiceGalleryRepositoryInterface
{
	public function getRole();

	public function getAllService();

    public function listItems();

    public function handleStore(ServiceGalleryRequest $request);

    public function findItem($id);
}