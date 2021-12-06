<!-- navbar -->

    <?php
        $rutaRetorno = "../../assets/imgs/logo-mexAnt.png";
        // if(isset($_GET["newUserAdmin"])){
        //     $rutaRetorno = "usuarios.php";
        // }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <div class="container-fluid">
                <div class="row gx-5">
                    <div class="col-2"></div>
                    <div class="col-2">
                        <a class="navbar-brand" href="../web/mapa.php">
                            <i class="fas fa-arrow-left"></i>
                            <img src=<?php echo $rutaRetorno?> alt="imagen-logo" class="img-logo">
                        </a>
                    </div>
                </div>
        </div>
    </nav>