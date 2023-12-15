<?php

use Controller\formularioController;
$formulario = new FormularioController();

?>

<h1>Contacto</h1>

<div class="container">

    <form method="POST">

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Email</label></div>
                <div class="col-6"><input class="form-control" type="email" name="mail" placeholder="ejemplo@ejemplo.com" require></div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Nombre</label></div>
                <div class="col-6"><input class="form-control" type="text" name="nombre" placeholder="Ingresa tu nombre" require></div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Comentario</label></div>
                <div class="col-6"><textarea class="form-control" cols="30" rows="10" name="comentario"></textarea></div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <button class="btn btn-primary" type="submit">Enviar</button></div>
            </div>
        </div>

    </form>

    <?php
        $formulario -> mostrarFormulario();
    ?>
</div>