<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaCliente extends Model
{
    use HasFactory;

    protected $table = 'faClientes';
    public $timestamps = false;
    protected $fillable = [
        'CTE_SUCURSAL',
        'CTE_CLIENTEID',
        'CTE_NOMBRE',
        'CTE_DIRECCION',
        'CTE_DIRECCION1',
        'CTE_CIUDAD',
        'CTE_RFC',
        'CTE_TELEFONO',
        'CTE_FAX',
        'CTE_CONTACTO',
        'CTE_AGENTE',
        'CTE_ZONA',
        'CTE_LISTA',
        'CTE_CONDICION',
        'CTE_DESCUENTO',
        'CTE_LIMITE',
        'CTE_ANTICIPO',
        'CTE_SALDO',
        'CTE_PFM',
        'CTE_CLAVE',
        'CTE_CORREO',
        'CTE_FECHAALTA',
        'CTE_FECHANACIMIENTO',
        'CTE_SEXO',
        'CTE_ULTIMOMOVIMIENTO',
        'CTE_PAQUETERIA',
        'CTE_VENCIDO',
        'CTE_ESSUCURSAL',
        'CTE_PITEX',
        'CTE_CUENTAGL',
        'CTE_FECHAPUNTOS',
        'CTE_PASSWORD',
        'CTE_FABRICA',
        'CTE_TPOVENTA',
        'CTE_COLONIA',
        'CTE_DIRECCION2',
        'CTE_EMPLEADO',
        'CTE_DEPARTAMENTO',
        'CTE_OBSERVACIONES',
        'CTE_CUENTAGLFONGAR',
        'CTE_COMISION',
        'CTE_NUMEXT',
        'CTE_NUMINT',
        'CTE_LOCALIDAD',
        'CTE_REFERENCIA',
        'CTE_ESTADO',
        'CTE_PAIS',
        'CTE_CPOSTAL',
        'CTE_ADDENDA',
        'CTE_BLOQUEAR',
        'CTE_GRUPO',
        'CTE_DIASPVENC',
        'CTE_DIASVENCIDO',
        'CTE_METODOPAGO',
        'CTE_CTANAL',
        'CTE_CTADLS',
        'CTE_PIVA',
        'CTE_DOCTORS',
        'CTE_CVEPAIS',
        'CTE_REGIDTRIB',
        'CTE_USOCFDI',
        'CTE_INCOTERM',
        'CTE_COMPLEMENTOS',
        'CTE_CVESTADO',
        'CTE_CVEESTADO',
        'CTE_NUMEXPORCONFIABLE',
        'CTE_SINIMPTOCERO',
        'CTE_CVECOLONIA',
        'CTE_REGFISCAL',
        'CTE_CVEMUNICIPIO',
        'CTE_CVELOCALIDAD' 
    ];
}
