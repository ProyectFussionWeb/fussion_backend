<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaFactura;
use App\Models\FaFactpda;
use App\Models\InUnidad;


class FaFacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fa_facturas = FaFactura::select('*');

        

        if (!is_null($request->factura)) {
            $fa_facturas = $fa_facturas 
            ->where('FAC_FACTURA', $request->factura);
        }

        if (!is_null($request->fecha) && is_null($request->factura)){
            $year = date('Y');
            if($request->fecha >= 1 && $request->fecha < 13) {
                $mes_presente_anio = $year.'-'.$request->fecha;
                $fa_facturas = $fa_facturas->whereDate('FAC_FECHA','like','%'.$mes_presente_anio.'%');
                
            }
            if($request->fecha == 13) {
                $fa_facturas = $fa_facturas->whereDate('FAC_FECHA','like','%'.$year.'%');      
            }
            if($request->fecha == 14) {
                $last_year = $year - 1;
                $fa_facturas = $fa_facturas->whereDate('FAC_FECHA','like','%'.$last_year.'%');      
            }
            if($request->fecha == 15) {
                $last_year = $year - 2;
                $fa_facturas = $fa_facturas->whereDate('FAC_FECHA','like','%'.$last_year.'%');      
            }
           
        }

        $fa_facturas = $fa_facturas
        ->with(['articulos','agente'])
        ->orderBy('FAC_FECHA', 'DESC')
        ->paginate($request->perPage);
        if(sizeof($fa_facturas) == 0)
        {
            return response()->json(['error'=>"No hay datos"],404);
        }else{
            return response()->json(['data'=>$fa_facturas],200);
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
    
        $fa_factura = new FaFactura;

        $data = $request->all();
  
        if( $fa_factura->create($data['fact']) ){
            $cont = 1;
            foreach($data['articulos'] as $articulo){

                $FaFactpda = new FaFactpda();

                $FaFactpda->PDAS_SUCURSAL = $articulo['PDAS_BODEGA'];
                $FaFactpda->PDAS_DOCTO = $articulo['PDAS_DOCTO'];
                $FaFactpda->PDAS_FACTURA = $data['fact']['FAC_FACTURA'];
                $FaFactpda->PDAS_PARTIDA = $cont++;
                $FaFactpda->PDAS_CLAVE = '';
                $FaFactpda->PDAS_ARTICULO = $articulo['PDAS_ARTICULO'];
                $FaFactpda->PDAS_DESCRIPCION = $articulo['PDAS_DESCRIPCION'];
                $FaFactpda->PDAS_BODEGA = $articulo['PDAS_BODEGA'];
                $FaFactpda->PDAS_CANTIDAD = $articulo['PDAS_CANTIDAD'];
                $FaFactpda->PDAS_LISTA = $data['fact']['FAC_LISTA'];
                $FaFactpda->PDAS_PUNITARIO = $articulo['PDAS_PUNITARIO'];
                $FaFactpda->PDAS_COSTO = '';

                $FaFactpda->PDAS_IVA = $articulo['PDAS_IVA'];
                $FaFactpda->PDAS_IMPUESTO = $articulo['PDAS_IMPUESTO'];
                $FaFactpda->PDAS_RETENCION = $data['fact']['FAC_TRETENCION'];
                $FaFactpda->PDAS_SERIE = '';
                $FaFactpda->PDAS_PEDIMENTO = '';
                $FaFactpda->PDAS_ESTATUS = '';
                $FaFactpda->PDAS_ESTIMACION = '';

                $FaFactpda->PDAS_TIPOEST = '';
                $FaFactpda->PDAS_FECHAINICIAL = date('Y-m-d');
                $FaFactpda->PDAS_FECHAFINAL = date('Y-m-d');
                $FaFactpda->PDAS_UNIDAD = $articulo['PDAS_UNIDAD'];
                $FaFactpda->PDAS_FACTOR = '1.0';
                $FaFactpda->PDAS_MESESSININT = '0';
                $FaFactpda->PDAS_CANTALM = '1.0';
                $FaFactpda->PDAS_PDAPED = '0';
                $FaFactpda->PDAS_IEPS = '0.0';

                $FaFactpda->PDAS_ESTIMACIONCVE = '0.0';
                $FaFactpda->PDAS_PIEPS = '0.0';
                $FaFactpda->PDAS_ARTCVESAT = $articulo['PDAS_ARTCVESAT'];

                $unidad = InUnidad::where('UNI_DESCRIPCION',$articulo['PDAS_UNIDAD'])->first();
                $FaFactpda->PDAS_UDADCVESAT = $unidad->UNI_CVESAT;

                $FaFactpda->PDAS_IMPORTE = $articulo['PDAS_IMPORTE'];
                $FaFactpda->PDAS_IMPORTEIVA = $articulo['PDAS_IMPORTEIVA'];
                $FaFactpda->PDAS_DESCUENTO = $articulo['PDAS_DESCUENTO'];
                $FaFactpda->PDAS_DESCIMPORTE = $articulo['PDAS_DESCIMPORTE'];
                $FaFactpda->PDAS_NETO = $articulo['PDAS_NETO'];

                $FaFactpda->PDAS_CANTIDADADUANA = '0.0';
                $FaFactpda->PDAS_UNIDADADUANA = '';
                $FaFactpda->PDAS_ARANCEL = '';
                $FaFactpda->PDAS_MATPELIGROSO = 'N';
                $FaFactpda->PDAS_CVEMATPEL = '';
                $FaFactpda->PDAS_EMBALAJE = '';
                $FaFactpda->PDAS_DESCEMBALAJE = '';
                $FaFactpda->PDAS_PESOENKG = '0.0';
                $FaFactpda->PDAS_DIMENSIONES = '';
                $FaFactpda->PDAS_OBJIMP = $articulo['PDAS_OBJIMP'];
                $FaFactpda->PDAS_NUMEROPREDIAL = $articulo['PDAS_NUMEROPREDIAL'];

                $FaFactpda->save();

                /*
                $FaFactpda->PDAS_SUCURSAL = $data['fact']['FAC_SUCURSAL'];
                $FaFactpda->PDAS_DOCTO = $data['fact']['FAC_DOCTO'];
                $FaFactpda->PDAS_FACTURA = $data['fact']['FAC_FACTURA'];
                $FaFactpda->PDAS_PARTIDA = $cont++;
                $FaFactpda->PDAS_CLAVE = '';
                $FaFactpda->PDAS_ARTICULO = $articulo['INV_ARTICULO'];
                $FaFactpda->PDAS_DESCRIPCION = $articulo['INV_DESCRIPCION'];
                $FaFactpda->PDAS_BODEGA = $data['fact']['FAC_SUCURSAL'];
                $FaFactpda->PDAS_CANTIDAD = '1.0';
                $FaFactpda->PDAS_LISTA = $data['fact']['FAC_LISTA'];
                $FaFactpda->PDAS_PUNITARIO = $articulo['INV_PRECIO1'];
                $FaFactpda->PDAS_COSTO = $data['fact']['FAC_CCOSTO'];

                $FaFactpda->PDAS_IVA = $data['fact']['FAC_IVA']/100;
                $FaFactpda->PDAS_IMPUESTO = $articulo['INV_PRECIO1']*($data['fact']['FAC_IVA']/100);
                $FaFactpda->PDAS_RETENCION = $data['fact']['FAC_TRETENCION'];
                $FaFactpda->PDAS_SERIE = '';
                $FaFactpda->PDAS_PEDIMENTO = '';
                $FaFactpda->PDAS_ESTATUS = '';
                $FaFactpda->PDAS_ESTIMACION = '';

                $FaFactpda->PDAS_TIPOEST = '';
                $FaFactpda->PDAS_FECHAINICIAL = date('Y-m-d');
                $FaFactpda->PDAS_FECHAFINAL = date('Y-m-d');
                $FaFactpda->PDAS_UNIDAD = $articulo['INV_UNIDAD'];
                $FaFactpda->PDAS_FACTOR = '1.0';
                $FaFactpda->PDAS_MESESSININT = '0';
                $FaFactpda->PDAS_CANTALM = '1.0';
                $FaFactpda->PDAS_PDAPED = '0';
                $FaFactpda->PDAS_IEPS = '0.0';

                $FaFactpda->PDAS_ESTIMACIONCVE = '0.0';
                $FaFactpda->PDAS_PIEPS = '0.0';
                $FaFactpda->PDAS_ARTCVESAT = $articulo['INV_CLAVESAT'];

                $unidad = InUnidad::where('UNI_DESCRIPCION',$articulo['INV_UNIDAD'])->first();
                $FaFactpda->PDAS_UDADCVESAT = $unidad->UNI_CVESAT;

                $FaFactpda->PDAS_IMPORTE = $articulo['INV_PRECIO1'];
                $FaFactpda->PDAS_IMPORTEIVA = $articulo['INV_PRECIO1']*($data['fact']['FAC_IVA']/100);
                $FaFactpda->PDAS_DESCUENTO = $articulo['INV_DESCUENTO'];
                $FaFactpda->PDAS_DESCIMPORTE = '0.0';
                $FaFactpda->PDAS_NETO = $articulo['INV_PRECIO1'];

                $FaFactpda->PDAS_CANTIDADADUANA = '0.0';
                $FaFactpda->PDAS_UNIDADADUANA = '';
                $FaFactpda->PDAS_ARANCEL = '';
                $FaFactpda->PDAS_MATPELIGROSO = 'N';
                $FaFactpda->PDAS_CVEMATPEL = '';
                $FaFactpda->PDAS_EMBALAJE = '';
                $FaFactpda->PDAS_DESCEMBALAJE = '';
                $FaFactpda->PDAS_PESOENKG = '0.0';
                $FaFactpda->PDAS_DIMENSIONES = '';
                $FaFactpda->PDAS_OBJIMP = '';
                $FaFactpda->PDAS_NUMEROPREDIAL = '';

                $FaFactpda->save();*/
            }
            return response()->json(['data'=>'Factura guardada' ],200);
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
        $fa_factura = FaFactura::where('FAC_FACTURA', $id)->first();
        
        if($fa_factura){
            $fa_factura->articulos;
            return response()->json(['data'=>$fa_factura],200);
        }else{
            return response()->json(['error'=>'No se encuentra factura'],404);
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

        $data = $request->all();
       
        if(FaFactura::where('FAC_FACTURA', $id)->update($data['fact'])){
            
            foreach($data['articulos'] as $articulo){
                FaFactpda::where(['PDAS_PARTIDA' => $articulo['PDAS_PARTIDA'], 'PDAS_FACTURA' => $id])->update($articulo);    
            }
            
            return response()->json(['data'=>"Factura Actualizado"],200);
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
        $fa_factura = FaFactura::where('FAC_FACTURA', $id)->first();

        if($fa_factura){
             
            FaFactura::where('FAC_FACTURA',  $id)->delete();
            return response()->json(['data'=>'Factura eliminada'],200);
        }else{
            return response()->json(['error'=>'No se encuentra factura'],404);
        }
    }

    public function count(){
        $date = date("Y-m-d");
        $data = FaFactura::latest('FAC_FACTURA')->first();
        return response()->json([
            'data'=>$data->FAC_FACTURA,
            'date'=> $date
        ],200);
    }
}
