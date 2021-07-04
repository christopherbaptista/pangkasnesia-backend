<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductGallery;
use App\Http\Requests\ProductRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Repositories\ProductRepositoryInterface;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $repository;

    public function __construct(ProductRepositoryInterface $repository)
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
            return view('pages.admin.products.index')->with([
                'items' => $items
            ]);
        }
        elseif($role==1){
            return view('pages.partner.products.index')->with([
                'items' => $items
            ]);
        }
        else{
            return view('pages.user.products.index')->with([
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
            return view('pages.admin.products.create');
        }
        else{
            return view('pages.partner.products.create');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $data = $this->repository->handleStore($request);
        Product::create($data);
        return redirect()->route('products.index');
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
            return view('pages.admin.products.edit')->with([
                'item' => $item
            ]);
        }
        else{
            return view('pages.partner.products.edit')->with([
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
    public function update(ProductRequest $request, $id)
    {
        $data = $this->repository->handleStore($request);
        $item = $this->repository->findItem($id);
        $item->update($data);

        return redirect()->route('products.index');
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

        ProductGallery::where('products_id', $id)->delete();

        return redirect()->route('products.index');
    }

    public function gallery(Request $request, $id)
    {
        $role = $this->repository->getRole();
        $product = $this->repository->findItem($id);
        $items = ProductGallery::with('product')
            ->where('products_id', $id)
            ->get();
        if($role == 2){
            return view('pages.admin.products.gallery')->with([
                'product' => $product,
                'items' => $items
            ]);
        }
        else{
            return view('pages.user.partner.gallery')->with([
                'product' => $product,
                'items' => $items
            ]);
        }
    }
}
