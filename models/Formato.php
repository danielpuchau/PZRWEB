<?php

namespace Model;

class Formato extends ActiveRecord {
    protected static $tabla = 'formatos';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;
}