<?php

namespace Model;

class Cartela extends ActiveRecord {
    protected static $tabla = 'cartela';
    protected static $columnasDB = ['id', 'noticia', 'enlace'];

    public $id;
    public $noticia;
    public $enlace;
}