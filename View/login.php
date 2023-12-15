<?php

use Controller\usuarioController; //agregamos el namespace del controlador
$usuario = new UsuarioController; //creamos el objeto

?>

<h1>Login</h1>

<div class="container">

    <form method="POST">

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Nombre</label></div>
                <div class="col-6"><input class="form-control" type="text" name="nombre" data-intro='Ingresa tu Nombre'
                        require></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Contrasenia</label></div>
                <div class="col-6"><input class="form-control" type="text" name="pass" data-intro='Ingresa Contraseña'
                        require></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-2">
                    <button class="btn btn-primary" type="submit">Iniciar Sesion</button>
                </div>
                <div class="col-2">
                    <a class="btn btn-success" href="index.php?action=crearUsuario" role="button">Crear Usuario</a>

                </div>
            </div>
        </div>

    </form>

    <div id="passwordError" title="Error en Password" hidden>
        <p>La contraseña es muy corta.</p>
    </div>

    <?php
    $resultado = $usuario->login();
    if ($resultado == "ERROR") {
        echo "Usuario o contrasenia incorrectos";
    }


    ?>
</div>

<script>
//introJs().start();
introJs().setOptions({
    showProgress: true,
}).start()
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").addEventListener('submit', validarFormulario);
});

function validarFormulario(evento) {
    evento.preventDefault();
    let password = document.getElementById('pass').value;
    if (password.length < 2) {
        $.passwordError();
        return;
    }
    this.submit();
}

$.passwordError = function() {
    let element = document.getElementById("passwordError");
    element.removeAttribute("hidden");
    $("#passwordError").dialog();
    //$("#passwordError").show();
};
</script>