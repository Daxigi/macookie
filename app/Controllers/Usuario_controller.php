<?php

namespace App\Controllers;

use App\Models\usuarios_modelo;

class Usuario_controller extends BaseController
{

    private $usuarios_modelo;
    private $validation;
    private $session;

    public function __construct()
    {
        $this->usuarios_modelo = new usuarios_modelo();
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function register()
    {
            $validation = \Config\Services::validation();

            $validation->setRules(
                [
                    'persona_nombre' => 'required|alpha_space',
                    'persona_apellido' => 'required|alpha_space',
                    'persona_mail' => 'required|valid_email|is_unique[usuarios.mail]',
                    'persona_password' => 'required|min_length[8]',
                    'persona_repassword' => 'required|min_length[8]|matches[persona_password]',
                    'persona_telefono' => 'required|is_natural_no_zero|min_length[9]',
                ],
                [
                    'persona_nombre' => [
                        "required" => 'Campo nombre obligatorio',
                        "alpha_space" => 'El nombre solo puede tener espacios o letras',
                    ],
                    'persona_apellido' => [
                        "required" => 'Campo apellido obligatorio',
                        "alpha_space" => 'El apelido solo puede tener espacios o letras',
                    ],
                    'persona_mail' => [
                        "required" => 'Campo mail obligatorio',
                        "valid_email"   => 'Debe ingresar un correo valido',
                        "is_unique"   => 'Este correo ya esta registrado',
                    ],
                    'persona_password' => [
                        "required" => 'Password obligatorio',
                        "min_length" => 'El password debe contener mas de 8 caracteres'
                    ],
                    'persona_repassword' => [
                        "required" => 'REPassword obligatorio',
                        "min_length" => 'El re password debe contener mas de 8 caracteres',
                        "matches" => 'Los passwords deben coincidir',
                    ],
                    'persona_telefono' => [
                        "required" => 'Telefono obligatorio',
                        "is_natural_no_zero"    => 'El telefono no puede ser 0',
                        "min_length" => 'El telefono debe contener mas de 9 digitos',
                    ]
                ]
            );

            if($validation->withRequest($this->request)->run()){
        
            $data = [
                // Obtener los datos del formulario
                'nombre' => $this->request->getPost('persona_nombre'),
                'apellido'  => $this->request->getPost('persona_apellido'),
                'mail'  => $this->request->getPost('persona_mail'),
                'password'  => $this->request->getPost('persona_password'),
                'repassword' => $this->request->getPost('persona_repassword'),
                'telefono'  => $this->request->getPost('persona_telefono'),
                'estado' => 'SI',
                'rol' => 1
            ];


            $data['password'] = crypt($data['password'], PASSWORD_BCRYPT);

            $usuarioID = $this->usuarios_modelo->crear_persona($data);

            if($usuarioID){
                $sessionData = [
                    'id' => $usuarioID,
                    'nombre' => $data['nombre'],
                    'apellido'  => $data['apellido'],
                    'mail'  => $data['mail'],
                    'telefono'  => $data['telefono'],
                    'estado' => 'SI',
                    'rol' => 1,
                    'logged' => true
                ];
                
            } 
            $this->session->set($sessionData);
            $this->session->setFlashdata('sessionSuccess', 'Hola '.$sessionData['nombre'].'! ya estas registrado!.');

            return redirect()->to('/');
        } else{
            $data['errors'] = $validation->getErrors();
        }
        return redirect()->back()->withInput()->with('errors', $data['errors']);
    }

    public function reestablecerPassword()
    {
            $validation = \Config\Services::validation();

            $validation->setRules(
                [
                    'mail' => 'required|valid_email',
                    'password1' => 'required|min_length[8]',
                    'password2' => 'required|min_length[8]|matches[password1]',
                ],
                [
                    'mail' => [
                        "required"      => 'Campo nombre obligatorio',
                        "valid_email"   => 'El mail debe ser valido',
                    ],
                    'password1' => [
                        "required"      => 'Password obligatorio',
                        "min_length"    => 'El password debe tener al menos 8 caracteres',
                    ],
                    'password2' => [
                        "required"      => 'Debes introducir el re-password',
                        "min_length"    => 'El re-password debe tener al menos 8 caracteres',
                        "matches"       => 'Los passwords deben coincidir',
                    ]
                ]
            );

            if($validation->withRequest($this->request)->run()){
        
            $data = [
                // Obtener los datos del formulario
                'mail'  => $this->request->getPost('mail'),
                'password'  => $this->request->getPost('password1'),
                'repassword' => $this->request->getPost('password2'),
            ];

            $this->usuarios_modelo->actualizarPassword($data);
            $usuario    = $this->usuarios_modelo->obtenerPersona_porEmail($data['mail']);
            $usuarioID  = $usuario['id'];
            if($usuarioID){
                $sessionData = [
                    'id' => $usuarioID,
                    'nombre' => $usuario['nombre'],
                    'apellido'  => $usuario['apellido'],
                    'mail'  => $usuario['mail'],
                    'telefono'  => $usuario['telefono'],
                    'estado' => 'SI',
                    'rol' => 1,
                    'logged' => true
                ];
                
            } 
            $this->session->set($sessionData);
            $this->session->setFlashdata('sessionSuccess', 'Hola '.$sessionData['nombre'].' Tu password fue recuperado!.');

            return redirect()->to('/');
        } else{
            $data['errors'] = $validation->getErrors();
        }
        return redirect()->back()->withInput()->with('errors', $data['errors']);
    }

    public function loggin()
    {
        try {
            $data =[
                'mail' => $this->request->getPost('persona_mail'),
                'password'  => $this->request->getPost('persona_password')
            ];
            
            if( $data['mail'] ==null || $data['password'] ==null ) {
                $this->session->setFlashdata('errorEmpty', 'Todos los campos son obligatorios.');
                return redirect()->route('loggin')->with('errorEmpty', 'Todos los campos son obligatorios.');
            }

            $data['password'] = (string)$data['password'];

            $Usuario = $this->usuarios_modelo->obtenerPersona_porEmail($data['mail']);
            if ($Usuario && password_verify($data['password'], $Usuario['password'])) {
                $sessionData = [
                    'id' => $Usuario['id'],
                    'nombre' => $Usuario['nombre'],
                    'apellido' => $Usuario['apellido'],
                    'mail' => $Usuario['mail'],
                    'telefono' => $Usuario['telefono'],
                    'estado' => $Usuario['estado'],
                    'rol' => $Usuario['rol'] ,
                    'logged' => true
                ];

                $this->session->set($sessionData);
                $this->session->setFlashdata('sessionSuccess', 'Hola de nuevo '.$sessionData['nombre'].'!.');
                

                return redirect()->to('/');
            }else{
                $this->session->setFlashdata('errorLoggin', 'Mail no asociado a ninguna cuenta o contraseña incorrecta.');
                
                return redirect()->back();
            }

        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {

            // Manejo específico para la excepción de CodeIgniter

            echo "No es posible iniciar sesión.";
        } catch (\Exception $e) {

            // Manejo genérico para otras excepciones

            echo "Ocurrió un error: " . $e->getMessage();
        }
    }

    public function loggout(){
        $this->session->destroy();
        return redirect()->to('/');
    }


}
