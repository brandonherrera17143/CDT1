<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <nav class="navbar bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="https://e7.pngegg.com/pngimages/468/972/png-clipart-hopeless-masquerade-captain-commando-wikia-hopeless-computer-wallpaper-fictional-character.png"
                        alt="Bootstrap" width="60" height="60">
                </a>
            </div>
        </nav>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                <a class="nav-link" href="index.php?action=contacto">Contacto</a>
                <a class="nav-link" href="index.php?action=nosotros">Nosotros</a>

                <?php
                if (!empty($_SESSION['id_usuario'])) { //si hay una sesión iniciada
                    echo '<a class="nav-link" href="index.php?action=inscripcion">Inscripcion</a>';
                    echo '<a class="nav-link" href="index.php?action=mostrarInscripcion">Ver Inscripciones</a>';
                    echo '<a class="nav-link" href="index.php?action=inscripcionCategoria">Inscripcion Categoria</a>';
                    echo '<a class="nav-link" href="index.php?action=logout">Cerrar Sesion</a>';
                    echo '<span class="nav-link" style="font-size: 18px; font-weight: bold;">' . $_SESSION['rolUsuario'] . ' ' . $_SESSION['user'] . '</span>';
                } else {
                    echo '<a class="nav-link" href="index.php?action=login">Iniciar Sesion</a>';
                }
                ?>
            </div>
        </div>
    </div>
</nav>