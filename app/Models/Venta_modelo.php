<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\DetalleVenta_modelo;
use App\Models\Productos_modelo;
use App\Models\Usuarios_modelo;

class Venta_modelo extends Model
{

    protected $table = 'venta';
    protected $primeryKey = 'id';
    protected $allowedFields = ['id_cliente', 'venta_fecha', 'total_venta'];

    public function obtenerVentas()
    {
        $ventas = $this->findAll();

        $detalleModelo = new DetalleVenta_modelo();
        $usuariosModelo = new Usuarios_modelo();

        foreach ($ventas as &$venta) {
            $venta['productos'] = $detalleModelo->obtenerDetalle($venta['id']);
            $venta['usuario']   = $usuariosModelo->where('id', $venta['id_cliente'])->get()->getRowArray();
        }

        return $ventas;
    }

    public function obtenerVenta($id)
    {
        $detalleModelo = new DetalleVenta_modelo();
        $usuariosModelo = new Usuarios_modelo();

        $venta = [];
        $venta['venta'] = $this->where('id', $id)->get()->getRowArray();
        $venta['producto'] = $detalleModelo->obtenerDetalle($id);
        $venta['usuario']   = $usuariosModelo->where('id', $venta['venta']['id_cliente'])->get()->getRowArray();

        return $venta;
    }

    public function obtenerVentasPorCliente($clienteId)
    {
        $detalleModelo = new DetalleVenta_modelo();

        $ventas = $this->where('id_cliente', $clienteId)->findAll();

        $ventasConDetalles = [];
        foreach ($ventas as $venta) {
            $ventaConDetalles = [];
            $ventaConDetalles['venta'] = $venta;
            $ventaConDetalles['producto'] = $detalleModelo->obtenerDetalle($venta['id']);

            $ventasConDetalles[] = $ventaConDetalles;
        }
        return $ventasConDetalles;
    }
}
