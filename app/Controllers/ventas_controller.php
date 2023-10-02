<?php

namespace App\Controllers;

use App\Models\productos_modelo;
use App\Models\Venta_modelo;
use App\Models\DetalleVenta_modelo;
use App\Models\Categorias_modelo;

class Ventas_controller extends Basecontroller
{

    private $cart;
    private $productos_modelo;
    private $venta_modelo;
    private $detalleventa_modelo;


    public function __construct()
    {
        $this->cart = \Config\Services::cart();
        $this->productos_modelo = new Productos_modelo();
        $this->venta_modelo = new Venta_modelo();
        $this->detalleventa_modelo = new DetalleVenta_modelo();
    }



    public function guardar_venta()
    {
        $cartItems = $this->cart->contents();
        $venta_id = null;
        $total_venta = 0; // Inicializar la variable para la suma del total de la venta

        foreach ($cartItems as $item) {
            $producto = $this->productos_modelo->where('id', $item['id'])->first();
            if ($producto['stock'] < $item['qty']) {
                return redirect()->route('carrito')->with('errorStock', 'No hay en existencia el stock solicitado. Cantidad actual: '.$producto['stock']. '. Del producto: '. $producto['nombre']);
            }


            // Guardar venta y obtener el ID solo una vez
            if (!$venta_id) {
                $data = [
                    'id_cliente' => session('id'),
                    'venta_fecha' => date('Y-m-d H:i:s'),
                    'total_venta'   => 0
                ];
                $venta_id = $this->venta_modelo->insert($data);
            }

            $detalle_venta = [
                'id_venta'         => $venta_id,
                'id_producto'      => $item['id'],
                'detalle_cantidad' => $item['qty'],
                'detalle_precio'   => $item['price'],
            ];

            $nuevoStock = $producto['stock'] - $item['qty'];
            $this->productos_modelo->update($item['id'], ['stock' => $nuevoStock]);

            $this->detalleventa_modelo->insert($detalle_venta);

            // Calcular la suma del total de la venta
            $total_venta += ($item['price'] * $item['qty']);
        }

        // Actualizar el campo 'total_venta' en la tabla de ventas
        $this->venta_modelo->update($venta_id, ['total_venta' => $total_venta]);

        $this->cart->destroy();
        return redirect()->route('')->with('compraExitosa','Felicitaciones! Su compra se realizo con exito!.');
    }
}
