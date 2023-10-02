<?php

namespace App\Controllers;

use App\Models\Consulta_modelo;

class Consulta_controller extends BaseController
{
    private $consulta_modelo;
    private $session;

    public function __construct(){
        $this->consulta_modelo = new Consulta_modelo();
        $this->session = \Config\Services::session();
    }

    public function agregarConsulta()
    {
            $validation = \Config\Services::validation();

            $validation->setRules(
                [
                    'nombre' => 'required|alpha_space',
                    'correo' => 'required|valid_email',
                    'motivo' => 'required|max_length[100]',
                    'consulta' => 'required|max_length[500]',
                ],
                [
                    'nombre' => [
                        "required" => 'Campo nombre obligatorio',
                        "alpha_space" => 'El nombre solo puede tener espacios o letras',
                    ],
                    'correo' => [
                        "required" => 'Campo mail obligatorio',
                        "valid_email"   => 'Debe ingresar un correo valido',
                    ],
                    'motivo' => [
                        "required" => 'Motivo es obligatorio',
                        "max_length" => 'Motivo debe ser menor a 100 caracteres',
                    ],
                    'consulta' => [
                        "required" => 'Consulta es obligatorio',
                        "max_length" => 'Motivo debe ser menor a 500 caracteres',
                    ],   
                ]
            );

            if($validation->withRequest($this->request)->run()){
        
            $data = [
                // Obtener los datos del formulario
                'nombre' => $this->request->getPost('nombre'),
                'correo'  => $this->request->getPost('correo'),
                'motivo'  => $this->request->getPost('motivo'),
                'consulta' => $this->request->getPost('consulta'),
                'leido' => "NO",
            ];

            $this->consulta_modelo->crear_consulta($data);

            
            return  redirect()->to('info-contacto')->with('success','Consulta enviada correctamente!');
        } else{
            $data['errors'] = $validation->getErrors();
        }
        return redirect()->back()->withInput()->with('errors', $data['errors']);
    }

    public function leerConsulta($id = null)
    {
        $data = ['leido' => "SI"];
        $this->consulta_modelo->update($id, $data);
        return redirect()->route('listar-consultas');
    }
}