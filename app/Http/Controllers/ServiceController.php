<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\ServiceRequest;
use App\Models\ServiceGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Repositories\ServiceRepositoryInterface;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ServiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $repository;

    public function __construct(ServiceRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->repository->listItems();
        $role = $this->repository->getRole();
        if($role==2){
            return view('pages.admin.services.index')->with([
                'items' => $items
            ]);
        }
        else if($role==1){
            return view('pages.partner.services.index')->with([
                'items' => $items
            ]);
        }
        else{
            return view('pages.user.services.index')->with([
                'items' => $items
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = $this->repository->getRole();

        if($role == 2){
            return view('pages.admin.services.create');
        }
        else if ($role == 1){
            return view('pages.partner.services.create');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $data = $this->repository->handleStore($request);
        Service::create($data);
        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->repository->findItem($id);
        $role = $this->repository->getRole();

        if($role == 2){
            return view('pages.admin.services.edit')->with([
                'item' => $item
            ]);
        }
        else if($role == 1){
            return view('pages.partner.services.edit')->with([
                'item' => $item
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        $data = $this->repository->handleStore($request);

        $item = $this->repository->findItem($id);
        $item->update($data);

        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = $this->repository->findItem($id);
        $item->delete();


        return redirect()->route('services.index');
    }

    public function gallery(Request $request, $id)
    {
        $role = $this->repository->getRole();
        $service = $this->repository->findItem($id);
        $items = ServiceGallery::with('service')
            ->where('services_id', $id)
            ->get();
        if($role == 2){
            return view('pages.admin.services.gallery')->with([
                'service' => $service,
                'items' => $items
            ]);
        }
        else if($role == 1){
            return view('pages.partner.services.gallery')->with([
                'service' => $service,
                'items' => $items
            ]);
        }
        else {
            return view('pages.user.services.gallery')->with([
                'service' => $service,
                'items' => $items
            ]);
        }
    }

    public function qrcode($id)
    {
        $item = $this->repository->findItem($id);
        $viewing = "Nama Layanan : $item->name\nKategori : $item->category\nHarga : $item->price";
        $data = QrCode::size(300)->generate($viewing);
        return view('pages.user.order.qrcode')->with([
            'item' => $data
        ]);
    }
}
