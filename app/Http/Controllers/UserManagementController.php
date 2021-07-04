<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);

        return view('pages.admin.users.edit')->with([
            'users' => $users
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = User::findOrFail($id);
        $item->update($data);

        return redirect()->route('users.index');
    }

    public function index(){
        $users = User::where('roles', 0)->get();
        return view('pages.admin.users.index')->with([
            'users' => $users
        ]);
    }

    public function destroy($id){
        $user = User::findorfail($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
