<?php 

namespace Model;

class Colaborador extends ActiveRecord {
    protected static $tabla = 'colaboradores';
    protected static $columnasDB = ['id', 'nombre', 'descripcion',  'imagen', 'facebook', 'instagram', 'personalWeb'];


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->facebook = $args['facebook'] ?? '';
        $this->instagram = $args['instagram'] ?? '';
        $this->personalWeb = $args['personalWeb'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'La nombre es Obligatoria';
        }
        if(!$this->imagen) {
            self::$alertas['error'][] = 'El imagen es Obligatoria ';
        }
    
        return self::$alertas;
    }

    

}