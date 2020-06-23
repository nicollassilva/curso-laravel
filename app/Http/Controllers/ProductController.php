<?php

namespace App\Http\Controllers;

use \App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;
    private $repository;

    function __construct(Request $request, Product $product) {

        $this->request = $request;
        $this->repository = $product;
        // $this->middleware('auth')->except([
        //     'index', 'show'
        // ]);

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate();

        return view('admin.pages.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        $data = $request->only('name', 'description', 'price');

        $this->repository->create($data);

        return redirect()->route('products.index');
        // dd("OK");
        // // $request->validate([
        // //     'name' => 'required|min:3|max:255',
        // //     'description' => 'nullable|min:3|max:10000',
        // //     'photo' => 'required|image'
        // // ]);

        // //dd($request->all());
        // // $request->only(['name', 'description']);
        // // dd($request->name);
        // // dd($request->has('name')) -> se existe
        // // dd($request->input('teste', 'dsiajd')); -> gero um valor default caso nao exista o campo
        // // dd($request->except('name')); -> exceto um ou mais
        // if($request->file('photo')->isValid()) {
        //     //dd($request->photo->extension());
        //     //dd($request->photo->getClientOriginalName());
        //     //$request->photo->store('products/teste');
        //     //dd($request->photo->store('products')); -> cria um arquivo com nome aleatório
        //     $nameFile = $request->name . '.' . $request->photo->extension();
        //     dd($request->photo->storeAs('products', $nameFile));
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $product = Product::where('id', $id)->first();

        if(!$product = $this->repository->find($id)) {
            return redirect()->back();
        } else {
            return view('admin.pages.products.show', [
                'product' => $product
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.products.edit', compact('id'));
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
        dd("Editando produto: {$id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->repository->where('id', $id)->first();

        if(!$product) {
            return redirect()->back();
        } else {
            $product->delete();
            return redirect()->route('products.index');
        }
    }
}
