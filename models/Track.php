<?php 

namespace Model;

class Track extends ActiveRecord {
    protected static $tabla = 'tracks';
    protected static $columnasDB = ['id', 'posicion',  'titulo', 'artista_id', 'release_id','soundcloud'];


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->posicion = $args['posicion'] ?? '';
        $this->duracion = $args['duracion'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->artista_id = $args['artista_id'] ?? '';
        $this->release_id = $args['release_id'] ?? '';
        $this->soundcloud = $args['soundcloud'] ?? '';
    }

    public function validar() {
        if(!$this->posicion) {
            self::$alertas['error'][] = 'La posicion es Obligatoria';
        }
        if(!$this->titulo) {
            self::$alertas['error'][] = 'El titulo es Obligatoria ';
        }
        if(!$this->artista_id) {
            self::$alertas['error'][] = 'La artista es Obligatorio';
        }
        if(!$this->release_id) {
            self::$alertas['error'][] = 'La Referencia es Obligatorio';
        }
    
        return self::$alertas;
    }


}