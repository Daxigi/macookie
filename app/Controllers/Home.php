<?php

namespace App\Controllers;

use PDO;

use App\Models\Productos_modelo;
use App\Models\Categorias_modelo;
use App\Models\Venta_modelo;
use App\Models\DetalleVenta_modelo;
use App\Models\Consulta_modelo;
use App\Models\Usuarios_modelo;
use App\Models\Usuarios_modelo_modelo;

helper('form');


class Home extends BaseController
{

    private $usuario;
    private $session;
    private $productos_modelo;
    private $categorias_modelo;
    private $usuarios_modelo;
    private $venta_modelo;
    private $detalleventa_modelo;
    private $consulta_modelo;

    public function __construct()
    {

        $this->productos_modelo = new Productos_modelo();
        $this->categorias_modelo = new Categorias_modelo();
        $this->usuarios_modelo = new Usuarios_modelo();
        $this->venta_modelo = new Venta_modelo();
        $this->detalleventa_modelo = new DetalleVenta_modelo();
        $this->consulta_modelo = new Consulta_modelo();
        $this->session = \Config\Services::session();
        $this->usuario = $this->session->get();
    }

    public function home()
    {
        $data = [
            'usuario' => $this->usuario,
            'categorias' => $this->categorias_modelo->findall(),
        ];
        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/inc/princ') . view('/inc/requeriments/footer');
    }

    public function quienesSomos()
    {
        $data = [
            'usuario' => $this->usuario,
            'categorias' => $this->categorias_modelo->findall(),
        ];
        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/inc/qs') . view('/inc/requeriments/footer');
    }

    public function comercializacion()
    {
        $data = [
            'usuario' => $this->usuario,
            'categorias' => $this->categorias_modelo->findall(),
        ];
        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/inc/comercializacion') . view('/inc/requeriments/footer');
    }

    public function informacionContacto()
    {
        $data = [
            'usuario' => $this->usuario,
            'categorias' => $this->categorias_modelo->findall(),
        ];
        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/inc/ic') . view('/inc/requeriments/footer');
    }
    public function tyu()
    {
        $data = [
            'usuario' => $this->usuario,
            'categorias' => $this->categorias_modelo->findall(),
        ];
        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/inc/tyu') . view('/inc/requeriments/footer');
    }

    public function register()
    {
        $data = [
            'usuario' => $this->usuario,
            'categorias' => $this->categorias_modelo->findall(),
        ];
        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/backend/register') . view('/inc/requeriments/footer');
    }

    public function loggin()
    {
        $data = [
            'usuario' => $this->usuario,
            'categorias' => $this->categorias_modelo->findall(),
        ];
        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/backend/loggin') . view('/inc/requeriments/footer');
    }

    public function gestionProductos()
    {
        $pathImagen = base_url('assets/uploadedFiles/');
        $productos = $this->productos_modelo->findAll();
        $data = [
            'productos' => $productos,
            'usuario' => $this->usuario,
            'pathImagen' => $pathImagen,
            'categorias' => $this->categorias_modelo->findall(),
        ];
        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/backend/gestionProductos') . view('/inc/requeriments/footer');
    }


    public function ingresar_producto()
    {
        $data = [
            'categorias'    => $this->categorias_modelo->findAll(),
            'usuario'       => $this->usuario,
        ];
        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/backend/agregar-producto') . view('/inc/requeriments/footer');
    }

    public function editarProducto($id = null)
    {
        $pathImagen = base_url('assets/uploadedFiles/');

        $data = [
            'usuario'   => $this->usuario,
            'producto'  => $this->productos_modelo->where('id', $id)->first(),
            'categorias' => $this->categorias_modelo->findAll(),
            'pathImagen' => $pathImagen
        ];

        $header = view('/inc/requeriments/head');
        $scripts = view('/inc/js/scripts');
        $navbar = view('/inc/requeriments/navbar', $data);
        $carousel = view('/inc/requeriments/carousel');
        $editarProducto = view('/backend/editarProducto');
        $footer = view('/inc/requeriments/footer.php');

        echo $header . $scripts . $navbar . $carousel . $editarProducto . $footer;
    }

    public function carrito()
    {
        $cart = \Config\Services::cart();
        $data = [
            'usuario'   => $this->usuario,
            'cart'      => $cart,
            'categorias' => $this->categorias_modelo->findall(),
        ];
        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/backend/carrito') . view('/inc/requeriments/footer');
    }

    public function productos($id)
    {
        $pathImagen = base_url('assets/uploadedFiles/');
        $categorias = new Categorias_modelo();

        $productosActivos = $this->productos_modelo->traerProductosActivos();

        $data = [
            'categoriasP' => $categorias->obtenerCategorias($id),
            'categorias' => $categorias->findall(),
            'usuario' => $this->usuario,
            'productosActivos' => $productosActivos,
            'pathImagen' => $pathImagen
        ];



        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/inc/productos') . view('/inc/requeriments/footer');
    }
   


    public function buscarProductos()
    {
        $campo = $this->request->getPost('campo');
        $productosResultado = $this->productos_modelo->mostrarBusqueda($campo);

        $data = [
            'productos'   => $productosResultado,
            'usuario' => $this->usuario,
            'categorias' => $this->categorias_modelo->findall(),
        ];
        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/backend/buscador') . view('/inc/requeriments/footer');
    }

    public function buscador(){
        $campo = $this->request->getPost('campo');
        $productosResultado = $this->productos_modelo->mostrarBusqueda($campo);
        $data = [
            'productos'   => $productosResultado,
            'usuario' => $this->usuario,
            'categorias' => $this->categorias_modelo->findall(),
        ];
        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/backend/resultadoBuscador') . view('/inc/requeriments/footer');

    }

    public function listar_ventas()
    {
        $data = [
            'ventas' => $this->venta_modelo->obtenerVentas(),
            'usuario' => $this->usuario,
            'categorias' => $this->categorias_modelo->findall(),
        ];

        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/backend/ventas') . view('/inc/requeriments/footer');
    }
    public function detalle_venta($id)
    {
        $data = [
            'venta' => $this->venta_modelo->obtenerVenta($id),
            'usuario' => $this->usuario,
            'categorias' => $this->categorias_modelo->findall(),
        ];

        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/backend/resumen') . view('/inc/requeriments/footer');
    }
    public function listarConsultas()
    {
        $data = [
            'consultas' => $this->consulta_modelo->obtener_consultas(),
            'usuario' => $this->usuario,
            'categorias' => $this->categorias_modelo->findall(),
        ];

        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/backend/consultas') . view('/inc/requeriments/footer');
    }

    public function compras($id)
    {
        $data = [
            'compras' => $this->venta_modelo->obtenerVentasPorCliente($id),
            'usuario' => $this->usuario,
            'categorias' => $this->categorias_modelo->findall(),
        ];
        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/backend/compras') . view('/inc/requeriments/footer');
    }
    public function resumen_compras($id)
    {
        $data = [
            'compra' => $this->detalleventa_modelo->obtenerUnaCompra($id),
            'venta' => $this->venta_modelo->where('id',$id)->get()->getRowArray(),
            'usuario' => $this->usuario,
            'categorias' => $this->categorias_modelo->findall(),
        ];
        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/backend/resumen-compra') . view('/inc/requeriments/footer');
    }

    public function agregarDireccion(){

        $data = [
            'usuario' => $this->usuario,
            'categorias' => $this->categorias_modelo->findall(),
        ];
        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/backend/especificacionVenta') . view('/inc/requeriments/footer');

    }

    public function reestablecerPassword(){
        $data = [
            'usuario' => $this->usuario,
            'categorias' => $this->categorias_modelo->findall(),
        ];
        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/backend/recuperarPassword.php') . view('/inc/requeriments/footer');
        
    }

    public function mp(){
        $data = [
            'usuario' => $this->usuario,
            'categorias' => $this->categorias_modelo->findall(),
        ];
        return  view('/inc/js/scripts') . view('/inc/requeriments/head') . view('/inc/requeriments/navbar', $data) . view('/inc/requeriments/carousel') . view('/backend/mp') . view('/inc/requeriments/footer');
    }
}
