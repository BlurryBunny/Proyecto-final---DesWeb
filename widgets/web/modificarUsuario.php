<section class="container-fluid" id="container-all-page">
            <div class="row" id="header-page">
                <div class="col-1"></div>
                <div class="col-1">
                    <a href="estados.php" id="arrow-back"><i class='bx bx-arrow-back'></i></a>
                </div>
                <div class="col-3"></div>
                <div class="col-7">
                    <h2>Nuevo usuario</h2>
                </div>
            </div>
            <div class="row mt-5">
            <div class="container-fluid" id="container-form" >
                <form method="post" action="../../DB/registerNewUser.php">
                    
                    <!-- Ingresar nombre usuario nuevo -->
                    <div class="row mt-2">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <label for="inputText" class="form-label">Nombre de usuario</label>
                        </div>
                        <div class="col-1"></div>
                    </div>

                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <div class="input-group mb-3">
                                <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Nombre" aria-label="Titulo" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>


                    <!-- Ingresar contraseña -->
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <label for="inputText" class="form-label">Contraseña</label>
                        </div>
                        <div class="col-1"></div>
                    </div>

                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <div class="input-group mb-3">
                                <input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="Contraseña" aria-label="Titulo" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>

                    <!-- Ingresar contraseña nuevamente -->
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <label for="inputText" class="form-label">Repite tu contraseña</label>
                        </div>
                        <div class="col-1"></div>
                    </div>

                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <div class="input-group mb-3">
                                <input type="password" name="txtRePassword" id="txtRePassword" class="form-control" placeholder="Repite contraseña" aria-label="Titulo" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>

                    
                    <!-- Ingresar tu email -->
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <label for="inputText" class="form-label">Email</label>
                        </div>
                        <div class="col-1"></div>
                    </div>

                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <div class="input-group mb-3">
                                <input type="email" name="txtEmail" id="txtEmail" class="form-control" placeholder="ejemplo@ejemplo.com" aria-label="Titulo" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>

                    <!-- Ingresar tu email -->
                    <div class="row mt-2">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <label for="inputText" class="form-label">Tipo de usuario</label>
                        </div>
                        <div class="col-1"></div>
                    </div>


                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <select class="form-select form-select-lg mb-3" id="txtRol" name="txtRol" aria-label=".form-select-lg example">
                            
                                <option selected value='General'>General</option>
                                <option value='Administrador'>Administrador</option>";          
                            </select>
                        </div>
                        <div class="col-1"></div>

                    </div>

                    <!-- buttons to fill the form -->
                    <div class="row mt-5">
                        <div class="col-2"></div>
                        <div class="col-3   ">
                            <input id="btn-form" class="btn btn-primary" type="submit" value= "Registrame" >
                        </div>
                        <div class="col-2"></div>
                        <div class="col-3">
                            <input id="btn-form" class="btn btn-secondary" type="reset" value="Cancelar">
                        </div>
                        <div class="col-2"></div>
                    </div>

                    <div class="row mt-3"></div>
                    <!-- <script type="text/javascript" src="js/sign-up.js"></script> -->
                </form>
            </div>
        </div>
        </section>