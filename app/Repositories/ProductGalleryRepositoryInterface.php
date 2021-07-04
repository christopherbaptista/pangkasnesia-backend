<?php 

namespace App\Repositories;

use App\Http\Requests\ProductGalleryRequest;

interface ProductGalleryRepositoryInterface
{
	public function getRole();

	public function getAllProduct();

    public function listItems();

    public function handleStore(ProductGalleryRequest $request);

    public function findItem($id);
}