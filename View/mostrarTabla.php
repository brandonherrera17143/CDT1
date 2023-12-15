<?php

use Controller\cursoController;

$mostrarCursos = new CursoController();
?>

<table id="tablaCategorias" class="table table-striped" width="80%"></table>

<h2>Mostrar Cursos</h2>

<script type="text/javascript">
    let cursos = <?php echo json_encode($mostrarCursos->mostrarCursos()) ?>

    let datos = [];

    for (let i = 0; i < cursos.length; i++) {
        datos.push([cursos[i].id_curso, cursos[i].nombre_curso]);
    }

    let table = new DataTable('#tablaCategorias', {
        columns: [{
                title: 'Id'
            },
            {
                title: 'Nombre Curso'
            }
        ],
        data: datos //Colocando los valores de la BD
    });

    //var rowNode = table /*Para agregar valores manualmente*/
    //    .row.add([100, 'Testing'])
    //    .draw()
    //    .node();
</script>