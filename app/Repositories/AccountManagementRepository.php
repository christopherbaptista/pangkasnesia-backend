<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\User;

class AccountManagementRepository implements AccountManagementRepositoryInterface
{
	public function getUser($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    public function getPartners()
    {
        $partners = User::where('roles', 1)->get();
        return $partners;
    }

    public function getMembers()
    {
        $members = User::where('roles', 0)->get();
        return $members;
    }
}