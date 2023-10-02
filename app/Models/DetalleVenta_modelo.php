<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Productos_modelo;

class DetalleVenta_modelo extends Model
{

    protected $table = 'detalle_venta';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_producto', 'id_venta', 'detalle_cantidad', 'detalle_precio'];

    public function obtenerDetalle($id)
    {
        $builder = $this->builder();
        $modeloProducto = new Productos_modelo();

        $detalleProductos = $builder->where('id_venta', $id)->get()->getResultArray();

        $productos = [];
        foreach ($detalleProductos as $detalle) {
            $producto = $modeloProducto->obtenerProductoID($detalle['id_producto']);
            $producto['precio'] = $detalle['detalle_precio'];
            $producto['cantidad'] = $detalle['detalle_cantidad'];
            $productos[] = $producto;
        }

        return $productos;
    }



    public function obtenerUnaCompra($id)
    {
        $detalleModelo = new DetalleVenta_modelo();
        $productoModelo = new Productos_modelo();
    
        $compra = $detalleModelo->select('detalle_venta.*, productos.*, categoria_producto.nombre as nombre_categoria')
            ->join('productos', 'productos.id = detalle_venta.id_producto')
            ->join('categoria_producto', 'categoria_producto.id = productos.categoria_id')
            ->where('detalle_venta.id_venta', $id)
            ->get()
            ->getResultArray();
        return $compra;
    }
}
