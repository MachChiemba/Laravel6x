<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PhpParser\Node\Stmt\If_;
use Symfony\Component\VarDumper\VarDumper;

class ProductController extends Controller
{
    protected $request;
    private $repository;

    public function _construct(Request $request, Product $product){
        $this-> request = $request;
        $this-> repository = $product;
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //Aula 43
        //$products = Product::All();
        //$products = Product::get();
        //$products = Product::paginate(); Exibe apenas os 15 primeiros
        $products = Product::latest()->paginate();
        //var_dump($products);
        //print_r($products);
        //die();
        return view("admin.pages.products.index",['products'=> $products,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        //Aula 46
       $date = $request ->only('name','description','price'); 

       //$this->repository->create($date);
       Product::create($date);

       return redirect()->route('Products.index');
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*if(!$product=$this->repository->find($id));
        return redirect()->back();*/
          /*Com a segunda linha de codigo funciona Melhor*/

        $product = Product::where('id',$id)->first();
        return view('admin.pages.products.show',["product" =>$product]);
         }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $product = Product::where('id',$id)->first();
        //return redirect()->back();
        return view('admin.pages.products.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductRequest $request, $id)
    {
       $product = Product::where('id',$id)->first();
       $product->update($request->all());
       return redirect()->route('Products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Aula 47
      /*$product = $this->repository->where('id',$id)->first();
      if(!$product)
      return redirect()->back();*/
      
      $product = Product::where('id',$id)->first();
      $product -> delete();
      return redirect()->route('Products.index');     
    }

    /**
     * Search Products
     */
    public function search(Request $request)
     {
      
        $products=Product::search( $request->filter);
        //$products = $this->repository->search($request->filter); 
        return view("admin.pages.products.index",['products'=> $products,]);
         
     }
}
