<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\User;

interface AccountManagementRepositoryInterface
{
	public function getUser($id);

    public function getPartners();

    public function getMembers();
}