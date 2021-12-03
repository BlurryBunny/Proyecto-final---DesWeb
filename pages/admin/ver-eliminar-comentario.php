<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver comentario</title>
    <link rel="stylesheet" href="../../css/general/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/general/nuevo-editar-hormiga.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript">
        function valida_Post(){
            return true;
        }
    </script>
</head>
<body>
        <section class="container-fluid" id="container-all-page">
            <div class="row" id="header-page">
                <div class="col-1"></div>
                <div class="col-1">
                    <i class='bx bx-arrow-back'></i>
                </div>
                <div class="col-3"></div>
                <div class="col-7">
                    <h2>Comentario</h2>
                </div>
            </div>
            <form action="#" enctype="multipart/form-data" class="form-post" method="POST" onsubmit="return valida_Post()">
                <div class="row mt-3">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <div class="container-fluid" id="container-card-form">
                            <div class="row" id="separation"></div>
                            
                            <div class="row mt-4">
                                <div class="col-1"></div>
                                <div class="col-10">
                                    <h2>Titulo a publicacion de referencia</h2>
                                </div>
                            </div>
                            <div class="row" id="#row-form-content">
                                <div class="col-1"></div>
                                <div class="col-10">
                                    <div class="input-group mb-3">
                                        <input type="text" name="txtTitleReference" id="txtTitulo" class="form-control" placeholder="nombre de publicacion" aria-label="Titulo" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row mt-2">
                                <div class="col-1"></div>
                                <div class="col-5">
                                    <h2>Comentario creado por</h2> 
                                </div>
                                <div class="col-2">
                                    <h2>Fecha</h2> 
                                </div>
                                
                                <div class="col-3">
                                    <h2>Rol</h2>
                                </div>
                                
                            </div>

                            <div class="row mt-2">
                                <div class="col-1"></div>
                                <div class="col-5">
                                    <div class="input-group mb-3">
                                        <input type="text" name="txtTitleReference" id="txtTitulo" class="form-control" placeholder="nombre de usuario" aria-label="Titulo" aria-describedby="basic-addon1">
                                    </div>
                                </div>
            
                                <div class="col-2">
                                <div class="input-group mb-3">
                                        <input type="text" name="txtDate" id="txtTitulo" class="form-control" placeholder="11/02/2021" aria-label="Titulo" aria-describedby="basic-addon1">
                                    </div> 
                                </div>
                                
                                <div class="col-3">
                                    <div class="input-group mb-3">
                                        <input type="text" name="txtRol" id="txtTitulo" class="form-control" placeholder="Administrador" aria-label="Titulo" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                
                            </div>
                            

                            <div class="row mt-2">
                                <div class="col-1"></div>
                                <div class="col-10">
                                <h2>Caracteristicas de hormiga</h2>
                                </div>
                                
                            </div>

                            <div class="row mt-2">
                                <div class="col-1"></div>
                                <div class="col-10">
                                    <div class="input-group">
                                        <textarea name="txtContent" id="txtContent" class="form-control" aria-label="With textarea" placeholder="Una vez me encontre a ..."></textarea>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="row mt-4" id="separation"></div>
                        
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-2"></div>
                    <div class="col-2">
                        <input type="reset" id="btn-Cancelar" class="btn btn-primary" value="Cancelar"> <br>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-2">
                        <input type="submit"  id="btn-Publicar" class="btn btn-primary" value= "Publicar" >
                    </div>
                    <div class="col-2"></div>
                </div>
            </form>
        </section>


  <script src="../../js/general/polyfill.js"></script>
  <script type="text/javascript" src="../../js/general/jquery.js"></script>
  <script type="text/javascript" src="../../js/general/bootstrap.min.js"></script>
</body>
</html>