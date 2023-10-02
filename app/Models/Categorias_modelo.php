<?php

namespace App\Models;

use CodeIgniter\Model;

class Categorias_modelo extends Model
{
    protected $table      = 'categoria_producto';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $allowedFields = ['nombre','estado'];

    public function obtenerCategorias($id){
        if($id == 0){
            $categorias = $this->findAll();
        }else{
            $categorias = [];
            $categoria = $this->where('id', $id)->get()->getRowArray();
            $categorias[] = $categoria;
        }
        return $categorias;
    }
}