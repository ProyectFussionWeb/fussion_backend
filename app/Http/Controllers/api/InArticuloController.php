<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InArticulo;

class InArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $in_articulos = InArticulo::select('*');
        if(!is_null($request->text)) {
            $in_articulos = $in_articulos->where('INV_ARTICULO','like','%'.$request->text.'%')
            ->orWhere('INV_DESCRIPCION','like','%'.$request->text.'%');      
        }
        $in_articulos = $in_articulos
        ->paginate($request->perPage);
        if(sizeof($in_articulos) == 0)
        {
            return response()->json(['error'=>"No hay datos"],404);
        }else{
            return response()->json(['data'=>$in_articulos],200);
        } 
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $in_articulo = InArticulo::where('INV_ARTICULO', $id)->first();
        
        if($in_articulo){
            return response()->json(['data'=>$in_articulo],200);
        }else{
            return response()->json(['error'=>'No se encuentra articulo'],404);
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
        //
    }
}
