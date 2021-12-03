<!-- body to register -->
<div class="container-fluid" id="container-all-page">
        <div class="row mt-5">
            <div class="col-5"></div>
            <div class="col-2">
                <h1 class="title-page">Registrate</h1>
            </div>
            <div class="col-5"></div>
            
        </div>
        
        <div class="row mt-5">
            <div class="container-fluid">
                <form method="post" action="../../DB/registerNewUser.php" onsubmit="return validForm_SignUp()">
                    
                    <!-- Ingresar nombre usuario nuevo -->
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <label for="inputText" class="form-label">Nombre de usuario</label>
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Nombre" aria-label="Titulo" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>


                    <!-- Ingresar contraseña -->
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <label for="inputText" class="form-label">Contraseña</label>
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="Contraseña" aria-label="Titulo" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <!-- Ingresar contraseña nuevamente -->
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <label for="inputText" class="form-label">Repite tu contraseña</label>
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="password" name="txtRePassword" id="txtRePassword" class="form-control" placeholder="Repite contraseña" aria-label="Titulo" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>

                    
                    <!-- Ingresar tu email -->
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <label for="inputText" class="form-label">Email</label>
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="email" name="txtEmail" id="txtEmail" class="form-control" placeholder="ejemplo@ejemplo.com" aria-label="Titulo" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>

                    <!-- buttons to fill the form -->
                    <div class="row mt-5">
                        <div class="col-4"></div>
                        <div class="col-1   ">
                            <input class="btn btn-primary" type="submit" value= "Registrame" >
                        </div>
                        <div class="col-2"></div>
                        <div class="col-1">
                            <input class="btn btn-secondary" type="reset" value="Cancelar">
                        </div>
                        <div class="col-4"></div>
                    </div>

                    <div class="row mt-5"></div>
                    <!-- <script type="text/javascript" src="js/sign-up.js"></script> -->
                </form>
            </div>
        </div>
        
        
    </div>