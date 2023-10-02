<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\DetalleVenta_modelo;
use App\Models\Productos_modelo;
use App\Models\Venta_modelo;

class Usuarios_modelo extends Model
{

    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'apellido', 'mail', 'password', 'telefono', 'rol', 'estado'];

    public function __construct()
    {
        parent::__construct();
    }

    public function crear_persona($data)
    {
        return $this->insert($data);
    }

    public function obtener_personas()
    {
        return $this->findAll(); // Obtiene todos los registros de la tabla "persona".
    }

    public function obtener_persona_por_id($id_persona)
    {
        return $this->find($id_persona); // Obtiene un registro de la tabla "persona" según su ID.
    }

    public function actualizar_persona($id_persona, $data)
    {
        return $this->update($id_persona, $data); // Actualiza un registro de la tabla "persona" según su ID con los datos proporcionados.
    }

    public function eliminar_persona($id_persona)
    {
        return $this->delete($id_persona); // Elimina un registro de la tabla "persona" según su ID.
    }

    public function existe_mail($mail)
    {
        $data = $this->where('mail', $mail);
        return $data->countAllResults();
    }

    public function obtenerPersona_porEmail($mail)
    {
        $data = $this->where('mail', $mail);
        return $data->get()->getRowArray();
    }

    public function actualizarPassword($data){
        $mail = $data['mail'];
        $password = $data['password'];
        
        $persona = $this->obtenerPersona_porEmail($mail);
        $persona['password'] = password_hash($password, PASSWORD_DEFAULT);

        return $this->update($persona['id'], $persona);
    }
}
