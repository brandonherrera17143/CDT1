<?php

namespace Model;

use Model\ConexionModel; //importamos la clase ConexionModel

class UsuarioModel
{ //creamos la clase InscripcionModel


    public static function login($datos)
    {

        $stmt = ConexionModel::conectar()->prepare("Select * from usuarios where nombre=:nombre");
        $stmt->bindParam(":nombre", $datos['nombre'], \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();  //fetch devuelve un solo registro

    }

    public static function guardarUsuarioAlumno($datos)
    {
        $sql = ConexionModel::conectar()->prepare("INSERT INTO usuarios (nombre, apellido, usuario, contrasena, rol) VALUES (:nom, :ape, :usuario, :pass, :rol)");
        $sql->bindParam(":nom", $datos['nombre'], \PDO::PARAM_STR);
        $sql->bindParam(":ape", $datos['apellido'], \PDO::PARAM_STR);
        $sql->bindParam(":usuario", $datos['nombreUsuario'], \PDO::PARAM_STR);
        $sql->bindParam(":pass", $datos['pass'], \PDO::PARAM_STR);
        $sql->bindParam(":rol", $datos['rol'], \PDO::PARAM_STR);
        return $sql->execute() ? true : false;
    }
}