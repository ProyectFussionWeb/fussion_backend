<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaCliente;
use App\Models\FaFactura;

class FaClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $fa_clientes = FaCliente::select('*');

        if (!is_null($request->text)) {
            $fa_clientes = $fa_clientes 
            ->where('CTE_SUCURSAL', $request->text);
        }

        if (!is_null($request->name)) {
            $fa_clientes = $fa_clientes 
            ->where('CTE_NOMBRE', 'like','%'.$request->name.'%'); 
        }

        $fa_clientes = $fa_clientes->paginate($request->perPage);
        if(sizeof($fa_clientes) == 0)
        {
            return response()->json(['error'=>"No hay datos"],404);
        }else{
            return response()->json(['clientes'=>$fa_clientes],200);
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
        $date = date('Y/m/d');
        $fa_clientes = new FaCliente;

        $data = $request->except(['CTE_ULTIMOMOVIMIENTO']);
        $trimmed_data = array_map('trim', $data);
        
        if( $fa_clientes->create( [...$trimmed_data, 'CTE_ULTIMOMOVIMIENTO' => trim($date)] ) ){
            return response()->json(['data'=>"Cliente Registrado"],200);
        }else{
            return response()->json(['error'=>"Error en el registro"],500);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $fa_cliente = FaCliente::where('CTE_CLIENTEID', $id)->first();
        
        if($fa_cliente){
            return response()->json(['data'=>$fa_cliente],200);
        }else{
            return response()->json(['error'=>'No se encuentra cliente'],404);
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
        $date = date('Y/m/d');
        $data = $request->except(['CTE_ULTIMOMOVIMIENTO']);
        $trimmed_data = array_map('trim', $data);
        
        if(FaCliente::where('CTE_CLIENTEID', $id)->update([...$trimmed_data, 'CTE_ULTIMOMOVIMIENTO' => trim($date)])){
            return response()->json(['data'=>"Cliente Actualizado"],200);
        }else{
            return response()->json(['data'=>"Error en actualizacion"],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fa_cliente = FaCliente::where('CTE_CLIENTEID', $id)->first();

        if($fa_cliente){
            $fa_factura = FaFactura::where('FAC_CLIENTE', $fa_cliente->CTE_CLIENTEID)->first();
            // si hay una factura a nombre de este cliente entonces no se puede eliminar
            if($fa_factura){
                return response()->json(['data'=>'No puedes borrar un cliente que ya esta siendo usado en factura o remision'],200);
            }
            
            FaCliente::where('CTE_CLIENTEID',  $id)->delete();
            return response()->json(['data'=>'Cliente eliminado'],200);
        }else{
            return response()->json(['error'=>'No se encuentra cliente'],404);
        }
        
    }

    public function count(){
        //$count = FaCliente::all()->count();
        $data = FaCliente::latest('CTE_CLIENTEID')->first();
        return response()->json(['data'=>$data->CTE_CLIENTEID],200);
    }
}
