<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InArticulo extends Model
{
    use HasFactory;

    protected $table = 'InArticulos';
    public $timestamps = false;
    protected $fillable = [
        'INV_ARTICULO',
        'INV_CODIGO',
        'INV_DESCRIPCION',
        'INV_LARGA',
        'INV_INGLES',
        'INV_NOPARTE',
        'INV_PROVEEDOR',
        'INV_GENERAOC',
        'INV_OTROPROV',
        'INV_UNIDAD',
        'INV_LINEA',
        'INV_MARCA',
        'INV_FAMILIA',
        'INV_SERVICIO',
        'INV_MONEDA',
        'INV_P_MAX',
        'INV_P_REO',
        'INV_COSTOORIGINAL',
        'INV_CARANCEL',
        'INV_CFLETE',
        'INV_CAGENCIA',
        'INV_DESCUENTO',
        'INV_COSTO',
        'INV_COSTOP',
        'INV_LOCALIZACION',
        'INV_REVISION',
        'INV_ESPECIFICACIONES',
        'INV_TPOIMPUESTO',
        'INV_FECHAALTA',
        'INV_PRECIO1',
        'INV_PRECIO2',
        'INV_PRECIO3',
        'INV_PRECIO4',
        'INV_PRECIO5',
        'INV_PRECIO6',
        'INV_PRECIO7',
        'INV_FACTOR1',
        'INV_FACTOR2',
        'INV_FACTOR3',
        'INV_FACTOR4',
        'INV_FACTOR5',
        'INV_FORMULAS',
        'INV_CONCEPTO',
        'INV_OBSOLETO',
        'INV_FECHAOBSOLETO',
        'INV_KITS',
        'INV_FOTO',
        'INV_MARCANOMBRE',
        'INV_EQUIVAL',
        'INV_CATALOGO',
        'INV_PAGINA',
        'INV_PARTIDA',
        'INV_LLEVASERIE',
        'INV_RETENCION',
        'INV_MESESGAR',
        'INV_SALIDAAUTO',
        'INV_SUSTITUTO',
        'INV_FPROTECCION',
        'INV_DECIMALESRED',
        'INV_PERMITEPRECIOSCERO',
        'INV_ENSAMBLE',
        'INV_FECHACOSTO',
        'INV_GENERICO',
        'INV_IEPS',
        'INV_TOLERANCIA',
        'INV_CODIGOCAJA',
        'INV_CANTIDADCAJA',
        'INV_CLAVESAT',
        'INV_GUID',
        'INV_SERVER_TIMESTAMP',
        'INV_TIMESTAMP',
        'INV_FRACARANCELARIA',
        'INV_TIPOCOSTEO',
        'INV_OUTSOURCING',
        'INV_CHATARRA',
        'INV_PESOENKG'
    ];
}