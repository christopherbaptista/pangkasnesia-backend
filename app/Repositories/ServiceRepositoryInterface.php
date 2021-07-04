<?php 

namespace App\Repositories;

use App\Http\Requests\ServiceRequest;

interface ServiceRepositoryInterface
{
	public function getRole();

	public function listItems();

    public function handleStore(ServiceRequest $request);

    public function findItem($id);
}