<?php

namespace App\Controllers;

use App\Models\Productos_modelo;
use App\Models\Categorias_modelo;

class Productos_controller extends BaseController
{

    private $productos_modelo;
    private $session;

    public function __construct()
    {
        $this->productos_modelo = new Productos_modelo();
        $this->session = \Config\Services::session();
    }
    public function agregarProducto()
    {
        try {
            //Obtengo la data del post

            $validation = \Config\Services::validation();

            $validation->setRules(
                [
                    'producto_nombre' => 'required|alpha_space',
                    'producto_categoria' => 'is_natural_no_zero',
                    'producto_precio' => 'required|numeric',
                    'producto_descripcion' => 'required|max_length[100]',
                    'producto_stock' => 'required|is_natural_no_zero',
                    'producto_imagen' => 'is_image[producto_imagen]|mime_in[producto_imagen, image/jpg,image/jpeg,image/png,image]',
                ],
                [
                    'producto_nombre' => [
                        "required" => 'Campo nombre obligatorio',
                    ],
                    'producto_categoria' => [
                        "is_natural_no_zero" => 'Seleccione una categoria valida',
                    ],
                    'producto_precio' => [
                        "required" => 'Campo precio obligatorio',
                        "numeric"   => 'Precio debe ser numerico'
                    ],
                    'producto_descripcion' => [
                        "required" => 'Descripcion obligatoria',
                        "max_length[100]" => 'No mas de 100 caracteres'
                    ],
                    'producto_stock' => [
                        "required" => 'Campo stock obligatorio',
                        "is_natural_no_zero" => 'Debe ser un numero mayo a 0'
                    ],
                    'producto_imagen' => [
                        "is_image[producto_imagen]"  => 'Debe subir una imagen',
                        "mime_in"           => 'Incompatibilidad de tipo(.jpg,.jpeg,.png)'
                    ]
                ]
            );

            if ($validation->withRequest($this->request)->run()) {
                $data = [
                    'nombre' => $this->request->getPost('producto_nombre'),
                    'categoria_id' => $this->request->getPost('producto_categoria'),
                    'precio' => $this->request->getPost('producto_precio'),
                    'descripcion' => $this->request->getPost('producto_descripcion'),
                    'stock' => $this->request->getPost('producto_stock'),
                    'imagen' => $this->request->getFile('producto_imagen'),
                    'estado' => 'SI'
                ];

                $img = $this->request->getFile('producto_imagen');
                $nombreAleatorio = $img->getRandomName();
                $img->move(ROOTPATH . 'public/assets/uploadedFiles/', $nombreAleatorio);
                $data['imagen'] = $nombreAleatorio;

                $this->productos_modelo->agregarProducto($data);

                return  redirect()->to('gestion-productos')->with('Msg', 'Producto agregado correctamente');
            } else {
                $data['errors'] = $validation->getErrors();
            }
            return redirect()->back()->withInput()->with('errors', $data['errors']);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            echo  $e;
        } catch (\Exception $e) {

            echo "Ocurrió un error: " . $e->getMessage();
        }
    }



    function actualizarProducto()
    {
        try {
            $validation = \Config\Services::validation();
            $productoID = $this->request->getPost('id');
            $productoExistente = $this->productos_modelo->where('id', $productoID)->first();
            //Obtener el id del 

            // Obtener el producto existente desde la base de datos
            $imagenActual = $productoExistente['imagen'];


            $validation->setRules(
                [
                    'nombre' => 'required',
                    'categoria' => 'is_natural_no_zero',
                    'precio' => 'required|numeric',
                    'descripcion' => 'required|max_length[100]',
                    'stock' => 'required|is_natural_no_zero',
                ],
                [
                    'nombre' => [
                        "required" => 'Campo nombre obligatorio',
                    ],
                    'categoria' => [
                        "is_natural_no_zero" => 'Seleccione una categoria valida',
                    ],
                    'precio' => [
                        "required" => 'Campo precio obligatorio',
                        "numeric"   => 'Precio debe ser numerico'
                    ],
                    'descripcion' => [
                        "required" => 'Descripcion obligatoria',
                        "max_length[100]" => 'No mas de 100 caracteres'
                    ],
                    'stock' => [
                        "required" => 'Campo stock obligatorio',
                        "is_natural_no_zero" => 'Debe ser un numero mayo a 0'
                    ]
                ]
            );

            if ($validation->withRequest($this->request)->run()) {

                // Crear el array con los datos actualizados
                $data = [
                    'nombre' => $this->request->getPost('nombre'),
                    'categoria_id' => $this->request->getPost('categoria'),
                    'precio' => $this->request->getPost('precio'),
                    'descripcion' => $this->request->getPost('descripcion'),
                    'stock' => $this->request->getPost('stock'),
                    'estado' => 'SI'
                ];

                // Verificar si se ha proporcionado una nueva imagen
                if ($this->request->getFile('imagen')->isValid()) {
                    // Agregar reglas de validación específicas para la imagen
                    $validation->setRules(
                        ['imagen' => 'is_image[imagen]|mime_in[imagen,image/jpeg,image/png,image/webp,image/x-icon]'],
                        ['imagen' =>
                        [
                            'is_image'  => 'El archivo no es una imagen valida',
                            'mime_in'   => 'La extension no es valida'
                        ]]
                    );

                    if ($validation->withRequest($this->request)->run()) {
                        // Cargar y mover la nueva imagen
                        $img = $this->request->getFile('imagen');
                        $randomName = $img->getRandomName();
                        $img->move(ROOTPATH . 'public/assets/uploadedFiles', $randomName);

                        // Actualizar el campo 'img' en el array $data
                        $data['imagen'] = $randomName;


                        $this->productos_modelo->update($productoID, $data);
                        // Eliminar la imagen antigua
                        if ($imagenActual) {
                            $rutaImagenAntigua = ROOTPATH . 'asset/uploads/' . $imagenActual;
                            if (file_exists($rutaImagenAntigua)) {
                                unlink($rutaImagenAntigua);
                            }
                        }
                    }
                }




                $this->productos_modelo->update($productoID, $data);
                return  redirect()->to('gestion-productos')->with('Msg', 'Producto actualizado correctamente');
            } else {
                $data['errors'] = $validation->getErrors();
            }
            return redirect()->back()->withInput()->with('errors', $data['errors']);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            echo  $e;
        } catch (\Exception $e) {

            echo "Ocurrió un error: " . $e->getMessage();
        }
    }



    public function desactivarProducto($id = null)
    {
        $data = array('estado' => "NO");
        $this->productos_modelo->update($id, $data);
        return redirect()->route('gestion-productos');
    }


    public function activarProducto($id = null)
    {
        $data = array('estado' => "SI");
        $this->productos_modelo->update($id, $data);
        return redirect()->route('gestion-productos');
    }
}
