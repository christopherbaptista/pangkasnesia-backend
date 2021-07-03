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
