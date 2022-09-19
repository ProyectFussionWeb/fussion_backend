<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaFactpda extends Model
{
    use HasFactory;

    
    protected $table = 'fafactpdas';
    public $timestamps = false;

    protected $fillable = [
        'PDAS_SUCURSAL',
        'PDAS_DOCTO',
        'PDAS_FACTURA',
        'PDAS_PARTIDA',
        'PDAS_CLAVE',  
        'PDAS_ARTICULO',
        'PDAS_DESCRIPCION',
        'PDAS_BODEGA',
        'PDAS_CANTIDAD',
        'PDAS_LISTA',
        'PDAS_PUNITARIO',
        'PDAS_COSTO',
        'PDAS_IVA',
        'PDAS_IMPUESTO',
        'PDAS_RETENCION',  
        'PDAS_SERIE',
        'PDAS_PEDIMENTO',
        'PDAS_ESTATUS',
        'PDAS_TABULADOR',
        'PDAS_ESTIMACION', 
        'PDAS_TIPOEST',
        'PDAS_FECHAINICIAL',
        'PDAS_FECHAFINAL',
        'PDAS_UNIDAD',
        'PDAS_FACTOR',  
        'PDAS_MESESSININT',
        'PDAS_CANTALM',
        'PDAS_PDAPED',
        'PDAS_IEPS',
        'PDAS_ESTIMACIONCVE', 
        'PDAS_PIEPS',
        'PDAS_ARTCVESAT',
        'PDAS_UDADCVESAT',
        'PDAS_IMPORTE',
        'PDAS_IMPORTEIVA',  
        'PDAS_DESCUENTO',
        'PDAS_DESCIMPORTE',
        'PDAS_NETO',
        'PDAS_CANTIDADADUANA',
        'PDAS_UNIDADADUANA', 
        'PDAS_ARANCEL',
        'PDAS_MATPELIGROSO',
        'PDAS_CVEMATPEL',
        'PDAS_EMBALAJE',
        'PDAS_DESCEMBALAJE',  
        'PDAS_PESOENKG',
        'PDAS_DIMENSIONES',
        'PDAS_OBJIMP',
        'PDAS_NUMEROPREDIAL', 
    ];
}
