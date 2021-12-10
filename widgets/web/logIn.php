 <!-- body to register -->
 <div class="container" id='modal-signIn-singUp'>
        
        <div class="d-flex row-flex text-center m-5">
            
            <div id="my-row-complete">
                <h1 class="display-4" id='title-page'>Inicia sesion</h1>
            </div>
            
            
        </div>
        
        <div class="row mt-5">
            <div class="container">
                <form method="post" action="../../DB/verifyAccount.php" onsubmit="return validForm_LogIn()">
                    
                    <!-- Ingresar nombre usuario nuevo -->
                   <div class="d-flex row-flex text-left">
                        <div class="col-2" ></div>
                        <div class="col-8">
                            <label for="inputText" class="form-label">Nombre de usuario</label>
                        </div>
                        <div class="col-2" ></div>
                    </div>

                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="input-group mb-3">
                                <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Nombre" aria-label="Titulo" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>


                    <!-- Ingresar contraseña -->
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <label for="inputText" class="form-label">Contraseña</label>
                        </div>
                        <div class="col-2"></div>
                    </div>

                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="input-group mb-3">
                                <input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="Contraseña" aria-label="Titulo" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>

                    <!-- buttons to fill the form -->
                    <div class="d-flex row-flex text-center p-5">
                        
                        <div class='col text-rigth p-5' id="btn-section">
                            <input class="btn btn-primary" id="btn-submit" type="submit" value= "Ingresar" >
                        </div>
                        
                        <div class='col text-left p-5' id="btn-section">
                            <input class="btn btn-secondary" id="btn-reset" type="reset" value="Cancelar">
                        </div>
                        
                    </div>

                    <!-- <script type="text/javascript" src="js/sign-up.js"></script> -->
                </form>
            </div>
        </div>
        
        
        <div class="d row text-center m-2">
            
            <div id="my-row-complete">
                <span>¿Aun no tienes cuenta?</span>
            </div>
            <div id="my-row-complete">
                <a href="signUp.php" class="btn btn-primary " id='btnSingUp'>Registrate</a>
            </div>
            
        </div>

        
    </div>