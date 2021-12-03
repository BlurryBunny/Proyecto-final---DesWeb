<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/general/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/web/hormigas.css">
    <title>classification</title>
</head>
<body>
      <!-- navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- icon mex ant -->
            <a class="navbar-brand" href="mapa.php">
                    <img class="img-logo" src="assets/imgs/logo-mexAnt.png" alt="imagen-logo" >
                    <span class="txt-navbar">Mex Ant</span> 
            </a>

            <!-- menu burger -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- list options -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" href="mapa.php">Mapa</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="basicCares.php">Cuidados basicos</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="classification.php">Clasificacion</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Usuario
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="logIn.php">Ingresar</a></li>
                    <li><a class="dropdown-item" href="signUp.php">Registrarme</a></li>
                </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <script type="text/javascript" src="../../js/general/jquery.js"></script>
	<script type="text/javascript" src="../../js/general/bootstrap.min.js"></script>
</body>
</html>