<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaFactpda;

class FaFactpdaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fa_factpdas = FaFactpda::all();
        if(sizeof($fa_factpdas) == 0)
        {
            return response()->json(['error'=>"No hay datos"],404);
        }else{
            return response()->json(['data'=>$fa_factpdas],200);
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

        $FaFactpda = new FaFactpda();

        /*$FaFactpda->description = $request->input('description');
        $report->date = date("Y/m/d");
        $report->id_report_type = $request->input('id_report_type');
        $report->id_user = $userId;
        $report->report_by = $user->id_profile;

        $FaFactpda->save();*/
        return response()->json([
            'data'=>$request->all()
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fa_factpda = FaFactpda::where('PDAS_FACTURA', $id)->get();
        
        if($fa_factpda){
            return response()->json(['data'=>$fa_factpda],200);
        }else{
            return response()->json(['error'=>'No se encuentra registro'],404);
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
