<?php

namespace Controller;

use Model\usuarioModel;

require_once("helpers/helpers.php");

class UsuarioController
{

    public function login()
    {

        if (!empty($_POST['nombre']) && !empty($_POST['pass'])) { //si los campos no estan vacios

            $nombre = strClean($_POST['nombre']); //limpiamos los datos de caracteres especiales
            $pass = strClean($_POST['pass']); //limpiamos los datos de caracteres especiales

            $datos = array(
                'nombre' => $nombre, //guardamos los datos en un array
                'pass' => $pass //contrasenia es el name del input
            );

            $respuesta = UsuarioModel::login($datos);

            $resultado = password_verify($pass, $respuesta['contrasena']); //verificamos que la contrasenia sea correcta
            

            if ($resultado) { //si existe el id_usuario en la base de datos

                session_start();
                $_SESSION['id_usuario'] = $respuesta['id_usuario'];
                $_SESSION['nombre'] = $respuesta['nombre'];
                $_SESSION['apellido'] = $respuesta['apellido'];
                $_SESSION['user'] = $respuesta['usuario'];
                $_SESSION['rolUsuario'] = $respuesta['rol'];

                header("location:index.php?action=inicio&id={$respuesta['id_usuario']}"); //redireccionamos a la pagina inicio}");
            } else {
                return "ERROR"; //redireccionamos a la pagina login

            }
        }
    }

    public function crarUsuarioAlumno()
    {
        if (!empty($_POST['nombre']) and !empty($_POST['apellido']) and !empty($_POST['nombreUsuario']) and !empty($_POST['pass_1'])) {

            $nombre = strClean($_POST['nombre']); //limpiamos los datos de caracteres especiales
            $apellido = strClean($_POST['apellido']);
            $nombreUsuario = strClean($_POST['nombreUsuario']);
            $pass_1 = ($_POST['pass_1']);

            $pass_1 = password_hash($pass_1, PASSWORD_ARGON2ID); //encriptamos la contrasenia

            $rol = "alumno";

            $datos = array(
                'nombre' => $nombre,
                'apellido' => $apellido,
                'nombreUsuario' => $nombreUsuario,
                'pass' => $pass_1,
                'rol' => $rol
            );

            $respuesta = UsuarioModel::guardarUsuarioAlumno($datos);
            if ($respuesta) {
                echo "Usuario creado correctamente";
                #header("location:index.php?action=login");
            } else {
                echo "ERROR";
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header("location:index.php?action=login");
    }
}
