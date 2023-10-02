<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Venta_modelo_modelo;

class Direccion_modelo extends Model
{

    protected $table = 'direccion';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_venta','id_cliente', 'ciudad', 'calle', 'numero','codigoPostal', 'descripcion'];
}
