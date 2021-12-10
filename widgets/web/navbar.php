<nav class="navbar navbar-expand-md navbar-light bg-light">

    <div class="container-fluid">
        <div class="col-3">
            <img class="img-logo" src="../../assets/imgs/logo-mexAnt.png" alt="imagen-logo" >
            <span class="txt-navbar">Mex Ant</span> 
        </div>
        
        <div class="col-9">

            <!-- Boton responsive -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenido de la lista -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" href="../../pages/web/mapa.php">Mapa</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../../pages/web/foro.php">Foro</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../../pages/web/cuidadosBasicos.php">Cuidados basicos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../../pages/web/hormigas.php">Clasificacion</a>
                    </li>
                    <li class="nav-item dropdown">
                    <?php
                        if(isset($_SESSION["idU"])){
                            //user not register
                            include("children/option-navbar-Autentificated.php");
                        }else{
                            include("children/option-navbar-notAutentificated.php");
                            //user register
                        }
                    ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
