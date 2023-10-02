<?php

namespace App\Models;
use CodeIgniter\Model;

class Consulta_modelo extends Model{

    protected $table = 'consultas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre','motivo','correo','consulta','leido'];


    public function crear_consulta($data) {
        return $this->insert($data);
    }

    public function obtener_consultas(){
        $consultas = [];
        $consultas = $this->findAll();
        return $consultas;
    }
}
