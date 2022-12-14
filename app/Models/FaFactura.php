<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaFactura extends Model
{
    use HasFactory;

    protected $table = 'faFacturas';
    public $timestamps = false;
    protected $fillable = [
        'FAC_SUCURSAL',
        'FAC_DOCTO',
        'FAC_FACTURA',
        'FAC_FECHA',
        'FAC_REMISION',
        'FAC_CLIENTE',
        'FAC_CCOSTO',
        'FAC_PEDIDO',
        'FAC_LISTA',
        'FAC_PEDIDOCLIENTE',
        'FAC_AGENTE',
        'FAC_CONDICIONES',
        'FAC_SOBREPRECIO',
        'FAC_FLETE',
        'FAC_CARGO',
        'FAC_COMISION',
        'FAC_DESCTO1',
        'FAC_DESCTO2',
        'FAC_DESCTO3',
        'FAC_DESCTOPAC',
        'FAC_DESCTOPROM',
        'FAC_SUBTOTAL',
        'FAC_TOTAL',
        'FAC_DOLAR',
        'FAC_FECHAPAGO',
        'FAC_PAGADO',
        'FAC_FECHANOTA',
        'FAC_NOTASCREDITO',
        'FAC_ULTIMOCARGO',
        'FAC_NOTASCARGO',
        'FAC_SALDO',
        'FAC_CANCELADA',
        'FAC_ANTICIPO',
        'FAC_ZONA',
        'FAC_PLAZO',
        'FAC_IVA',
        'FAC_IMPTOENCA',
        'FAC_IMPTOPDAS',
        'FAC_RETENCION',
        'FAC_PRETENCION',
        'FAC_GENERADA',
        'FAC_IVAINCLUIDO',
        'FAC_NOMBRE',
        'FAC_DIRECCION',
        'FAC_DIRECCION1',
        'FAC_CIUDAD',
        'FAC_RFC',
        'FAC_MONEDA',
        'FAC_TIPOCAMBIO',
        'FAC_CONSIGNADO',
        'FAC_LABFOB',
        'FAC_LLEVARSALDO',
        'FAC_TRETENCION',
        'FAC_RETENCIONPDAS',
        'FAC_AMORTIZACIONANT',
        'FAC_OBSERVACIONES',
        'FAC_STATUS_PRECIO',
        'FAC_STATUS_CXC',
        'FAC_AUTORIZO_PRECIO',
        'FAC_AUTORIZO_CXC',
        'FAC_CORTE',
        'FAC_FECHAAUTORIZACION',
        'FAC_IMPRESIONES',
        'FAC_SUCREMISION',
        'FAC_DOC',
        'FAC_POLIZAVTF',
        'FAC_USUARIO',
        'FAC_CARGOIVA',
        'FAC_ESDIGITAL',
        'FAC_CADENAORIGINAL',
        'FAC_SERIE',
        'FAC_NUMAPROB',
        'FAC_CONCEPTOOBRA',
        'FAC_FECHACAN',
        'FAC_POLIZACAN',
        'FAC_USUARIOCAN',
        'FAC_ANOAPROB',
        'FAC_HORA',
        'FAC_ESTADO',
        'FAC_CPOSTAL',
        'FAC_VTAFACURA',
        'FAC_UUID',
        'FAC_RET_DESIVA',
        'FAC_RET_IVA',
        'FAC_RET_ISR',
        'FAC_RENTA',
        'FAC_HONORARIOS',
        'FAC_CONSTRUCCION',
        'FAC_DOCTOS',
        'FAC_IEPS',
        'FAC_PAC',
        'FAC_IMPUESTO',
        'FAC_NETO',
        'FAC_NOFISCAL',
        'FAC_TCREEVAL',
        'FAC_FORMAPAGO',
        'FAC_VERCFDI',
        'FAC_METODOPAGO',
        'FAC_DESCUENTO',
        'FAC_FACANTICIPO',
        'FAC_TIVA',
        'FAC_RETSINNOTA',
        'FAC_SUSTITUYE',
        'FAC_TIPORELACION',
        'FAC_FACRELACIONADO',
        'FAC_RETENDESCUENTO',
        'FAC_TURNO',
        'FAC_ESTATUS_ENTREGA',
        'FAC_USUARIO_ENTREGA',
        'FAC_TIPOENTREGA',
        'FAC_KMS',
        'FAC_CONFVEH',
        'FAC_TIPOESTACION',
        'FAC_SALIDA_FECHA',
        'FAC_SALIDA_HORA',
        'FAC_LLEGADA_FECHA',
        'FAC_LLEGADA_HORA',
        'FAC_CPVER',
        'FAC_OPERADOR',
        'FAC_REMOLQUE',
        'FAC_TRACTOR',
        'FAC_IDORIGEN',
        'FAC_IDDESTINO',
        'FAC_CANAL',
        'FAC_UNIDADPESO',
        'FAC_PAISOD',
        'FAC_ORIGEN',
        'FAC_IGPDAD',
        'FAC_IGMESES',
        'FAC_IGANIO',
        'FAC_RESICO'
    ];

    /*protected $appends = [
        'partida'
    ];

    public function getPartidaAttribute(): string
    {
       
        return 'ajaaaaaaaaa';
    }*/

    public function articulos(){
        return $this->hasMany(FaFactpda::class,"PDAS_FACTURA", "FAC_FACTURA");
    }
    public function agente(){
        return $this->belongsTo(FaAgente::class,"FAC_AGENTE", "AGE_AGENTE");
    }
}
