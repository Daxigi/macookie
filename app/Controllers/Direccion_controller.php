<?php

namespace App\Controllers;

use App\Models\Direccion_modelo;

class Direccion_controller extends BaseController
{

    private $direccion_modelo;
    private $session;
    private $validation;

    public function __construct()
    {
        $this->direccion_modelo = new direccion_modelo();
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function agregarDireccion()
    {
            $validation = \Config\Services::validation();

            $validation->setRules(
                [
                    'ciudad' => 'required',
                    'direccion' => 'required',
                    'numero' => 'required|is_natural_no_zero',
                    'codigop' => 'required|is_natural_no_zero',
                ],
                [
                    'ciudad' => [
                        "required"              => 'Debe ingresar el nombre de su ciudad',
                    ],
                    'direccion' => [
                        "required"              => 'La direccion es obligatoria',
                    ],
                    'numero' => [
                        "required"              => 'Campo mail obligatorio',
                        "is_natural_no_zero"    => 'No es un numero de direccion valido',
                    ],
                    'codigop' => [
                        "required"              => 'Debe ingresar un codigo postal valido',
                        "is_natural_no_zero"    => 'No es un codigo postal valido',
                    ]
                ]
            );

            if($validation->withRequest($this->request)->run()){
        
            $data = [
                // Obtener los datos del formulario
                'ciudad' => $this->request->getPost('ciudad'),
                'direccion'  => $this->request->getPost('direccion'),
                'numero'  => $this->request->getPost('numero'),
                'codigoPostal'  => $this->request->getPost('codigop'),
                'detalle' => $this->request->getPost('detalle'),
            ];

            $this->session->set('contacto', $data);

            //agragar mercado pago
            return redirect()->to('/pago');
        } else{
            $data['errors'] = $validation->getErrors();
        }
        return redirect()->back()->withInput()->with('errors', $data['errors']);
    }
}
