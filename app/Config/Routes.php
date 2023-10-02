<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// gets del controllador Home orden a-z
$routes->get('/', 'Home::home');
$routes->get('/carrito', 'Home::carrito');
$routes->get('/comercializacion', 'Home::comercializacion');
$routes->get('/compras/(:num)', 'Home::compras/$1');
$routes->get('/resumen-compras/(:num)', 'Home::resumen_compras/$1');
$routes->get('/editar-producto/(:num)', 'Home::editarProducto/$1');
$routes->get('/gestion-productos', 'Home::gestionProductos');
$routes->get('/info-contacto', 'Home::informacionContacto');
$routes->get('/ingresar-productos', 'Home::ingresar_producto');
$routes->get('/listar-consultas', 'Home::listarConsultas');
$routes->get('/listar-ventas', 'Home::listar_ventas');
$routes->get('/loggin', 'Home::loggin');
$routes->get('/productos/(:num)', 'Home::productos/$1');
$routes->get('/quienes', 'Home::quienesSomos');
$routes->get('/registro', 'Home::register');
$routes->get('/resumen/(:num)', 'Home::detalle_venta/$1');
$routes->get('/terminos-y-usos', 'Home::tyu');
$routes->get('/direccion', 'Home::agregarDireccion');

// gets del controlador productos
$routes->get('/activar/(:num)', 'Productos_controller::activarProducto/$1');
$routes->get('/desactivar/(:num)', 'Productos_controller::desactivarProducto/$1');
// gets del controlador carrito
$routes->get('/agregar-carrito/(:num)', 'Carrito_controller::agregarCarrito/$1');
$routes->get('/eliminar/(:any)', 'Carrito_controller::borrar/$1');
$routes->get('/vaciar-carrito/(:any)', 'Carrito_controller::borrar/$1');
// gets del controlador usuario
$routes->get('/loggout', 'Usuario_controller::loggout');
// gets del controlador consulta
$routes->get('/leer-consultas/(:num)', 'Consulta_controller::leerConsulta/$1');
// gets del controlador ventas
$routes->get('/venta', 'ventas_controller::guardar_venta');
$routes->get('/pago', 'Home::mp');
$routes->get('/forgot-password', 'Home::reestablecerPassword');





// post del controlador usuario
$routes->post('/ingresar', 'Usuario_controller::loggin');
$routes->post('/registro', 'Usuario_controller::register');
// post del controlador productos
$routes->post('/actualizar-producto', 'Productos_controller::actualizarProducto');
$routes->post('/ingresar-productos', 'Productos_controller::agregarProducto');
$routes->post('/buscar-producto', 'home::buscarProductos');
$routes->post('/buscador', 'home::buscador');
// post del controlador consulta
$routes->post('/consultar', 'Consulta_controller::agregarConsulta');
// post del controlador carrito
$routes->post('/agregar/(:num)/(:any)', 'Carrito_controller::agregar/$1/$2');
$routes->post('/direccion-envio', 'Direccion_controller::agregarDireccion');
$routes->post('/forgot-password', 'Usuario_controller::reestablecerPassword');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
