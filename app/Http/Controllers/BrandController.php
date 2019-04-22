<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    protected $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = new Brand;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json($this->brand->all(),200);
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
        $data_request = $request->only($this->brand->getModel()->fillable);
        if( $this->brand->create($data_request))
            $msg = "Marca criada com sucesso!";
        else
            $msg = "Erro ao criar marca!";

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
        $data = $this->brand->with('product')->find($id);
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
        $brand = $this->brand->find($id);
        $brand->name = $request->name;
        $brand->description = $request->description;
          return response()->json([
                $brand->save()
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
        if($this->brand->destroy($id)){
            $msg = 'Marca deletada com sucesso!';
        }            
        else{
            $msg = 'Erro ao deletar marca!';
        }
        return response()->json([
            'msg' => $msg
        ]);
    }
}
