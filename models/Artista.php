<?php 

namespace Model;

class Artista extends ActiveRecord {
    protected static $tabla = 'artistas';
    protected static $columnasDB = ['id', 'nombre', 'procedencia', 'pais', 'imagen', 'tags', 'descripcion', 'facebook', 'instagram', 'spotify', 'bandcamp'];


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->procedencia = $args['procedencia'] ?? '';
        $this->pais = $args['pais'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->tags = $args['tags'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->facebook = $args['facebook'] ?? '';
        $this->instagram = $args['instagram'] ?? '';
        $this->spotify = $args['spotify'] ?? '';
        $this->bandcamp = $args['bandcamp'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->procedencia) {
            self::$alertas['error'][] = 'El procedencia es Obligatoria ';
        }
        if(!$this->pais) {
            self::$alertas['error'][] = 'El Campo País es Obligatorio';
        }
        if(!$this->imagen) {
            self::$alertas['error'][] = 'La imagen es obligatoria';
        }
        if(!$this->tags) {
            self::$alertas['error'][] = 'El Campo áreas es obligatorio';
        }
    
        return self::$alertas;
    }


}