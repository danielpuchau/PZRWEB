<?php 

namespace Model;

class Release extends ActiveRecord {
    protected static $tabla = 'releases';
    protected static $columnasDB = ['id', 'referencia', 'titulo', 'descripcion','formato_id', 'tipo_id', 'artista_id', 'imagen', 'tags','creditos', 'ano', 'spotify', 'bandcamp', 'soundcloud', 'mixcloud', 'imagen2', 'playlist'];


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->referencia = $args['referencia'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->formato_id = $args['formato_id'] ?? '';
        $this->tipo_id = $args['tipo_id'] ?? '';
        $this->artista_id = $args['artista_id'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->tags = $args['tags'] ?? '';
        $this->creditos = $args['creditos'] ?? '';
        $this->ano = $args['ano'] ?? '';
        $this->spotify = $args['spotify'] ?? '';
        $this->bandcamp = $args['bandcamp'] ?? '';
        $this->soundcloud = $args['soundcloud'] ?? '';
        $this->mixcloud = $args['mixcloud'] ?? '';
        $this->imagen2 = $args['imagen2'] ?? '';
        $this->playlist = $args['playlist'] ?? '';
        
    }

    public function validar() {
        if(!$this->referencia) {
            self::$alertas['error'][] = 'El referencia es Obligatorio';
        }
        if(!$this->titulo) {
            self::$alertas['error'][] = 'El titulo es Obligatorio ';
        }
        /* if(!$this->descripcion) {
            self::$alertas['error'][] = 'La descripcion es Obligatoria';
        } */
        if(!$this->formato_id) {
            self::$alertas['error'][] = 'El Campo Formato es Obligatorio';
        }
        if(!$this->tipo_id) {
            self::$alertas['error'][] = 'El Campo tipo es Obligatorio';
        }
        if(!$this->artista_id) {
            self::$alertas['error'][] = 'El Artista es Obligatorio';
        }
        if(!$this->imagen) {
            self::$alertas['error'][] = 'La imagen es obligatoria';
        }
        if(!$this->imagen2) {
            self::$alertas['error'][] = 'La imagen2 es obligatoria';
        }
        if(!$this->tags) {
            self::$alertas['error'][] = 'El Campo tags es obligatorio';
        }
        if(!$this->creditos) {
            self::$alertas['error'][] = 'El Campo creditos es obligatorio';
        }
        if(!$this->ano) {
            self::$alertas['error'][] = 'El Campo año es obligatorio';
        }
    
        return self::$alertas;
    }
}