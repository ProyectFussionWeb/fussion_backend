<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\FaClienteController;
use App\Http\Controllers\api\InArticuloController;
use App\Http\Controllers\api\SatEstadoController;
use App\Http\Controllers\api\InSucursalController;
use App\Http\Controllers\api\FaAgenteController;
use App\Http\Controllers\api\FaZonaController;
use App\Http\Controllers\api\FaCondicionController;
use App\Http\Controllers\api\SatRFiscalController;
use App\Http\Controllers\api\SatUsoCFDIController;
use App\Http\Controllers\api\FaFacturaController;
use App\Http\Controllers\api\FaFactpdaController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::controller(UserController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::get('test/{id}', 'testApi');
    

});


//Route::get('showfafacturas/{id}', [FaFacturaController::class, 'show']);
//Route::resource('fafactpdas',FaFactpdaController::class);
        
Route::middleware('auth:sanctum')->group( function () {
    //Route::resource('faclientes', FaClienteController::class);
    Route::post('faclientes', [FaClienteController::class, 'index']);
    Route::post('storefaclientes', [FaClienteController::class, 'store']);
    Route::get('showfaclientes/{id}', [FaClienteController::class, 'show']);
    Route::put('updatefaclientes/{id}', [FaClienteController::class, 'update']);
    Route::delete('destroyfaclientes/{id}', [FaClienteController::class, 'destroy']);
    Route::get('countfaclientes', [FaClienteController::class, 'count']);
    //--------------------------------------------------------------

    //----InArticulos---------------------------------------------
    Route::post('inarticulos', [InArticuloController::class, 'index']);
    Route::get('showinarticulos/{id}', [InArticuloController::class, 'show']);


    //------------------------------------------------
    Route::resource('satestados', SatEstadoController::class);

    //--InSucursales
    Route::post('insucursales', [InSucursalController::class, 'index']);
    //--

     //--FaAgentes
     Route::post('faagentes', [FaAgenteController::class, 'index']);
     //--

      //--FaZonas
      Route::post('fazonas', [FaZonaController::class, 'index']);
      //--

       //--FaCondiciones
       Route::post('facondiciones', [FaCondicionController::class, 'index']);
       //--

       //--SatRfiscal
       Route::resource('satrfiscal', SatRFiscalController::class);
       //--

       //--satUsoCFDI
       Route::resource('satusocfdi', SatUsoCFDIController::class);
       //--

       //--FaFacturas
       Route::post('fafacturas', [FaFacturaController::class, 'index']);
       Route::post('storefafacturas', [FaFacturaController::class, 'store']);
       Route::get('showfafacturas/{id}', [FaFacturaController::class, 'show']);
       Route::put('updatefafacturas/{id}', [FaFacturaController::class, 'update']);
       Route::delete('destroyfafacturas/{id}', [FaFacturaController::class, 'destroy']);
       Route::get('countfafacturas', [FaFacturaController::class, 'count']);

       //--FaFactpda
       Route::resource('fafactpdas',FaFactpdaController::class);
       Route::post('storefafactpdas', [FaFactpdaController::class, 'store']);
       
       
       

});
