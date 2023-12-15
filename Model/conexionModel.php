<?php

namespace Model;

class ConexionModel
{

    public static function conectar()
    {

        $conn = new \PDO("mysql:host=localhost:3307;dbname=crud_cursos", "root", "1234");

        return $conn;
    }
}