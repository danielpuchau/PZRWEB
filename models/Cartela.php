<?php

namespace Model;

class Cartela extends ActiveRecord {
    protected static $tabla = 'cartela';
    protected static $columnasDB = ['id', 'noticia', 'enlace'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->noticia = $args['noticia'] ?? '';
        $this->enlace = $args['enlace'] ?? '';

    }


    public function validar() {
        if(!$this->noticia) {
            self::$alertas['error'][] = 'La noticia es Obligatoria';
        }
        if(!$this->enlace) {
            self::$alertas['error'][] = 'El enlace es Obligatoria ';
        }
    
        return self::$alertas;
    }
}