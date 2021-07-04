<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\ServiceRequest;
use App\Models\ServiceGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Service::all();
        $role = Auth::user()->roles;
        if($role==2){
            return view('pages.admin.services.index')->with([
                'items' => $items
            ]);
        }
        elseif($role==1){
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
        $role = Auth::user()->roles;

        if($role == 2){
            return view('pages.admin.services.create');
        }
        else{
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
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

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
        $item = Service::findOrFail($id);
        $role = Auth::user()->roles;

        if($role == 2){
            return view('pages.admin.services.edit')->with([
                'item' => $item
            ]);
        }
        else{
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
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $item = Service::findOrFail($id);
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
        $item = Service::findOrFail($id);
        $item->delete();


        return redirect()->route('services.index');
    }

    public function gallery(Request $request, $id)
    {
        $role = Auth::user()->roles;
        $service = Service::findorFail($id);
        $items = ServiceGallery::with('service')
            ->where('services_id', $id)
            ->get();
        if($role == 2){
            return view('pages.admin.services.gallery')->with([
                'service' => $service,
                'items' => $items
            ]);
        }
        else{
            return view('pages.user.partner.gallery')->with([
                'service' => $service,
                'items' => $items
            ]);
        }
    }

}
