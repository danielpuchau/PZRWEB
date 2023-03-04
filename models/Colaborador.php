<?php 

namespace Model;

class Colaborador extends ActiveRecord {
    protected static $tabla = 'colaboradores';
    protected static $columnasDB = ['id', 'nombre', 'descripcion',  'imagen', 'instagram', 'personalWeb', 'imagen2'];


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->instagram = $args['instagram'] ?? '';
        $this->personalWeb = $args['personalWeb'] ?? '';
        $this->imagen2 = $args['imagen2'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es Obligatoria';
        }
        if(!$this->imagen) {
            self::$alertas['error'][] = 'La imagen es Obligatoria ';
        }
        if(!$this->imagen2) {
            self::$alertas['error'][] = ' La imagen del nota es Obligatoria ';
        }
    
        return self::$alertas;
    }
}