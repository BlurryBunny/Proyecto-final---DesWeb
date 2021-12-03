<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicaciones</title>
    <link rel="stylesheet" href="../../css/admin/navbar-title.css">
    <link rel="stylesheet" href="../../css/general/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/admin/post-admin.css">
    <link rel="stylesheet" href="../../css/admin/table-content-admin.css">
    
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/styless-map.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="sidebar close">
        <div class="logo-details">
          <img src="assets/imgs/logo-mexAnt.png" alt="logo" class="logo-mexAnt">
          <span class="logo_name">MexAnt</span>
        </div>
        <ul class="nav-links">
          <li>
            <a href="">
              <i class='bx bx-receipt' ></i>
              <span class="link_name">Publicaciones</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="">Publicaciones</a></li>
            </ul>
          </li>
          <li>
            <a href="comentarios-admin.html">
              <i class='bx bx-message-dots' ></i>
              <span class="link_name">Comentarios</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="comentarios-admin.html">Comentarios</a></li>
            </ul>
          </li>
          <li>
            <a href="estados-admin.html">
              <i class='bx bx-map-alt' ></i>
              <span class="link_name">Estados</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="estados-admin.html">Estados</a></li>
            </ul>
          </li>
          <li>
            <a href="hormigas-admin.html">
              <i class='bx bx-bug-alt'></i>
              <span class="link_name">Hormigas</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="hormigas-admin.html">Hormigas</a></li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class='bx bx-user' ></i>
              <span class="link_name">Usuarios</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="#">Usuarios</a></li>
            </ul>
          </li>
          <li>
            <div class="profile-details">
              <div class="profile-content">
                <!--<img src="image/profile.jpg" alt="profileImg">-->
              </div>
              <div class="name-job">
                <div class="profile_name">Nombre de usuario</div>
                <div class="job">Rol de usuario</div>
              </div>
              <i class='bx bx-log-out' ></i>
            </div>
          </li>
        </ul>
      </div>
    
        <section class="content-page">
          <div class="header-page">
            <i class='bx bx-menu' ></i>
            <span class="title-page">Publicaciones</span>
          </div>

            <!-- empieza contenido de pagina -->
            <div class="container-fluid">
                
              <div class="row m-5">
                  <div class="col-xs-1 col-2"></div>

                  <div class=" col-xs-6 col-2">
                      <h2 id="only-title-page">Publicaciones de</h2>
                  </div>

                  <div class="col-xs-2 col-1">
                    <select name="format" id="format">
                        <option selected disabled>Sección</option>
                        <option value="10">Foro</option>
                        <option value="50">Cuidados basicos</option>
                    </select>
                  </div>

                  <div class="col-xs-2 col-3"></div>

                  <div class="col-xs-3 col-2">
                      <button class="btn btn-primary" id="btn-add-post">
                          <span>Agregar</span>
                          <i class='bx bx-plus'></i>
                      </button>
                  </div>
                  <div class="col-xs-1 col-2"></div>
              </div>

              
              <div class ="row m-5">
                  <div class="col-2"></div>
                  <div class="col-1">
                      <h2>Mostrar</h2>
                  </div>

                  <div class="col-1">
                      <select name="format" id="format">
                          <option selected disabled>numero</option>
                          <option value="10">10</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                      </select>
                  </div>
                  
                  <div class="col-3"></div>
                  <div class="col-3">
                      <div id="searchbox">
                          <input type="text" placeholder="Buscar">
                          <button class="btn-search"><i class='bx bx-search-alt-2' ></i></button>
                      </div>
                  </div>
                  <div class="col-2"></div>
              </div>
          </div>


          <div class="container-fluid justify-content-center">
              <div class="row">
                  <div class="col-1"></div>

                  <div class="col-10">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                              <th><span class="title-table">ID</span></td>
                              <th><span class="title-table">Titulo</span></td>
                              <th><span class="title-table">Creado por</span></td>
                              <th><span class="title-table">Fecha</span></td>
                              <th><span class="title-table">Acciones</span></td>
                          </tr>
                        </thead>
  
                        <tbody>
                            <tr>
                                <td><span class="title-table">ID</span></td>
                                <td><span class="title-table">Titulo</span></td>
                                <td><span class="title-table">Creado por</span></td>
                                <td><span class="title-table">Fecha</span></td>
                                <td><span class="title-table">
                                    <button class="btn-action"><i class='bx bx-info-circle' ></i></button>
                                    <button class="btn-action"><i class='bx bx-edit' ></i></button>
                                    <button class="btn-action"><i class='bx bx-trash' ></i></button>
                                </span></td>
                            </tr>
    
                            <tr>
                                <td><span class="title-table">ID</span></td>
                                <td><span class="title-table">Titulo</span></td>
                                <td><span class="title-table">Creado por</span></td>
                                <td><span class="title-table">Fecha</span></td>
                                <td><span class="title-table">
                                  <button class="btn-action"><i class='bx bx-info-circle' ></i></button>
                                  <button class="btn-action"><i class='bx bx-edit' ></i></button>
                                  <button class="btn-action"><i class='bx bx-trash' ></i></button>
                              </span></td>
                            </tr>
    
                            <tr>
                                <td><span class="title-table">ID</span></td>
                                <td><span class="title-table">Titulo</span></td>
                                <td><span class="title-table">Creado por</span></td>
                                <td><span class="title-table">Fecha</span></td>
                                <td><span class="title-table">
                                  <button class="btn-action"><i class='bx bx-info-circle' ></i></button>
                                  <button class="btn-action"><i class='bx bx-edit' ></i></button>
                                  <button class="btn-action"><i class='bx bx-trash' ></i></button>
                              </span></td>
                            </tr>
                        </tbody>
                      </table>
                  </div>

                  <div class="col-1"></div>
              </div>
          </div>

      </section>

  <script src="../../js/general/polyfill.js"></script>
  <script src="../../js/admin/navbar-admin.js"></script>
  <script type="text/javascript" src="../../js/genera/jquery.js"></script>
  <script type="text/javascript" src="../../js/general/bootstrap.min.js"></script>
</body>
</html>