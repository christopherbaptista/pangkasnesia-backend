<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\AccountManagementRepositoryInterface;

class PartnerManagementController extends Controller
{
    private $repository;
    public function __construct(AccountManagementRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth');
    }

    public function edit($id)
    {
        $partners = $this->repository->getUser($id);

        return view('pages.admin.partners.edit')->with([
            'partners' => $partners
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = $this->repository->getUser($id);
        $item->update($data);

        return redirect()->route('partners.index');
    }

    public function index(){
        $partners = $this->repository->getPartners();
        return view('pages.admin.partners.index')->with([
            'partners' => $partners
        ]);
    }

    public function destroy($id){
        $user = $this->repository->getUser($id);
        $user->delete();

        return redirect()->route('partners.index');
    }
}
