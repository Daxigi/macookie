<?php

namespace App\Models;

use CodeIgniter\Model;

class Productos_modelo extends Model
{
    protected $table      = 'productos';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $allowedFields = ['nombre', 'categoria_id', 'precio', 'stock', 'estado', 'descripcion', 'imagen'];

    public function agregarProducto($data)
    {
        return $this->insert($data);
    }

    public function traerProductosActivos()
    {
        $builder = $this->builder();
        $builder->where('estado', "SI")->where('stock >', 0);
        return $builder->get()->getResultArray();
    }

    public function mostrarBusqueda($campo)
    {
        $builder = $this->builder();
        $productos = $builder->like('nombre', $campo, 'both', null, true)->get()->getResultArray();
        
        return $productos;
    }

    public function obtenerProductoID($id)
    {
        $builder = $this->builder();
        $builder->where('id', $id);
        return $builder->get()->getRowArray();
    }

    public function obtenerProductosDelCarrito($carrito){
        $productos = [];
        foreach($carrito as $item){
            $producto = $this->obtenerProductoID($item['id']);
            array_push($productos, $producto);
        }
        return $productos;
    }
}
