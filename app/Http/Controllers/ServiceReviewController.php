<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceReviewRequest;
use App\Models\Service;
use App\Models\ServiceReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceReviewController extends Controller
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
        $items = ServiceReview::with('service')->get();
        $role = Auth::user()->roles;

        if($role == 2){
            return view('pages.admin.service-reviews.index')->with([
                'items' => $items
            ]);
        }
        else if($role == 1){
            return view('pages.partner.service-reviews.index')->with([
                'items' => $items
            ]);
        }
        else {
            return view('pages.user.service-reviews.index')->with([
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
        $services = Service::all();
        $role = Auth::user()->roles;
        if($role == 0){
            return view('pages.user.service-reviews.create')->with([
                'services' => $services
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceReviewRequest $request)
    {
        $data = $request->all();
        ServiceReview::create($data);
        return redirect()->route('service-reviews.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ServiceReview::findOrFail($id);
        $item->delete();

        return redirect()->route('service-reviews.index');
    }
}
