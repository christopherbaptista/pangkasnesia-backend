<?php 

namespace App\Repositories;

use App\Http\Requests\ProductRequest;

interface ProductRepositoryInterface
{
	public function getRole();

	public function listItems();

    public function handleStore(ProductRequest $request);

    public function findItem($id);
}