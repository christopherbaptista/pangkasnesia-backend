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

    public function edit($id)
    {
        $partners = User::findOrFail($id);

        return view('pages.admin.partners.edit')->with([
            'partners' => $partners
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = User::findOrFail($id);
        $item->update($data);

        return redirect()->route('partners.index');
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
