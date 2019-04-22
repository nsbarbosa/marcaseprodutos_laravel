<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        // nova model
        $this->product = new Product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json($this->product->with('brand')->get(),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data_request = $request->only($this->product->getModel()->fillable);
        if( $this->product->create($data_request))
            $msg = "Produto criado com sucesso!";
        else
            $msg = "Erro ao criar produto!";

        return response()->json([
            'msg' => $msg
        ]);
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
        $data = $this->product->with('brand')->find($id);
        return response()->json([
            'dados' => $data
        ]);
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
        $product = $this->product->find($id);
        $product->name = $request->name;
        $product->description = $request->description;
          return response()->json([
                $product->save()
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if($this->product->destroy($id)){
            $msg = 'Produto deletado com sucesso!';
        }            
        else{
            $msg = 'Erro ao deletar produto!';
        }
        return response()->json([
            'msg' => $msg
        ]);
    }
}
