<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\AccountManagementRepositoryInterface;

class UserManagementController extends Controller
{
    private $repository;
    public function __construct(AccountManagementRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth');
    }

    public function edit($id)
    {
        $users = $this->repository->getUser($id);;

        return view('pages.admin.users.edit')->with([
            'users' => $users
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = $this->repository->getUser($id);;
        $item->update($data);

        return redirect()->route('users.index');
    }

    public function index(){
        $users = $this->repository->getMembers();
        return view('pages.admin.users.index')->with([
            'users' => $users
        ]);
    }

    public function destroy($id){
        $user = $this->repository->getUser($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
