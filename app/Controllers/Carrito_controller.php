<?php

namespace App\Controllers;

use App\Models\productos_modelo;
use App\Models\Venta_modelo;
use App\Models\DetalleVenta_modelo;
use App\Models\Categorias_modelo;

class Carrito_controller extends Basecontroller
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



    public function agregarCarrito($id)
    {
        $request = \Config\Services::request();
        $producto = $this->productos_modelo->obtenerProductoID($id);
        $data = array(
            'id' => $producto['id'],
            'name' => $producto['nombre'],
            'price' => $producto['precio'],
            'qty' => 1,
        );

        $this->cart->insert($data);

        return redirect()->route('carrito');
    }

    public function borrar($id)
    {
        if ($id == "all") {
            $this->cart->destroy();
        } else {
            $this->cart->remove($id);
        }

        return redirect()->route('carrito');
    }

    public function agregar($id,$rowid){
        $producto = $this->productos_modelo->where('id', $id)->get()->getRowArray();
        $cantidad = $this->request->getPost('cantidad');
        $items = [
            'rowid' => $rowid,
            'id' => $producto['id'],
            'qty'=> $cantidad
        ];
        $this->cart->update($items);
        
        return redirect()->route('carrito');
    }

    
}
