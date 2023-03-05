<?php 

namespace Model;

class Radio extends ActiveRecord {
    protected static $tabla = 'radio';
    protected static $columnasDB = ['id', 'referencia', 'titulo', 'fecha', 'link', 'imagen'];


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->referencia = $args['referencia'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->link = $args['link'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
    }

    public function validar() {
        if(!$this->referencia) {
            self::$alertas['error'][] = 'La referencia es Obligatorio';
        }
        if(!$this->fecha) {
            self::$alertas['error'][] = 'El fecha es Obligatoria ';
        }
        if(!$this->link) {
            self::$alertas['error'][] = 'El Campo País es Obligatorio';
        }
        if(!$this->imagen) {
            self::$alertas['error'][] = 'La imagen es obligatoria';
        }
    
        return self::$alertas;
    }


}