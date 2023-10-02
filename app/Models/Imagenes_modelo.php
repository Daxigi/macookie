<?php

namespace App\Models;

use CodeIgniter\Model;

class Imagenes_modelo extends Model
{
    protected $table      = 'imagenes_productos';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $allowedFields = ['producto_id', 'nombre'];

    public function agregarImagen($data){
        return $this->insert($data);
    }

    public function obtenerImagenPorProductoID($productoID){
        $builder = $this->builder();
        $builder->where('producto_id', $productoID);
        return $builder->get()->getResultArray();
    }

    public function getImagenProducto($productoID)
    {
        $query = $this->db->query("SELECT * FROM $this->table WHERE producto_id = ?", [$productoID]);

        $images = $query->getResultArray();

        if (count($images) > 0) {
            return $images[0]['nombre'];
        } else {
            return null;
        }
    }
}