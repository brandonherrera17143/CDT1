<?php

use Controller\usuarioController; //agregamos el namespace del controlador
$crearUsuario = new UsuarioController; //creamos el objeto

?>

<h1>Crear Usuario</h1>

<div class="container">

    <form method="POST">

        <div class="form-group mt-5">
            <div class="row mb-3">
                <div class="col-2"><label>Nombre</label></div>
                <div class="col-6"><input class="form-control" type="text" name="nombre" placeholder="Ingresa tu nombre" require></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Apellido</label></div>
                <div class="col-6"><input class="form-control" type="text" name="apellido" placeholder="Ingresa tu apellido" require></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Nombre Usuario</label></div>
                <div class="col-6"><input class="form-control" type="text" name="nombreUsuario" placeholder="Ingresa tu Usuario" require></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Contraseña</label></div>
                <div class="col-6"><input class="form-control" type="text" name="pass_1" placeholder="Ingresa contrasenia" require></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <button class="btn btn-primary" type="submit">Crear Usuario</button>
                </div>
            </div>
        </div>

    </form>

    <?php
    $resultado = $crearUsuario->crarUsuarioAlumno();
    if ($resultado == "ERROR") {
        echo "Usuario o contrasenia incorrectos";
    }


    ?>
</div>