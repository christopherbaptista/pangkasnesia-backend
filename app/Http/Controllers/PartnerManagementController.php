<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PartnerManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $partners = User::where('roles', 1)->get();
        return view('pages.admin.partners.index')->with([
            'partners' => $partners
        ]);
    }

    public function destroy($id){
        $user = User::findorfail($id);
        $user->delete();

        return redirect()->route('partners.index');
    }
}
