<div class="container-fluid">
                
                <div class="row m-5">
                    <div class="col-xs-1 col-2"></div>
                    <div class=" col-xs-8 col-6">
                        <h2 id="only-title-page">Lista de estados en mapa</h2>
                    </div>
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
                                    <th><span class="title-table">Nombre</span></td>
                                    <th><span class="title-table">Nombre corto</span></td>
                                    <th><span class="title-table">Acciones</span></td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><span class="title-table">ID</span></td>
                                    <td><span class="title-table">Titulo</span></td>
                                    <td><span class="title-table">Creado por</span></td>
                                    <td><span class="title-table">
                                        <button class="btn-action"><i class='bx bx-bug' ></i></button>
                                        <button class="btn-action"><i class='bx bx-edit' ></i></button>
                                        <button class="btn-action"><i class='bx bx-trash' ></i></button>
                                    </span></td>
                                </tr>

                                <tr>
                                    <td><span class="title-table">ID</span></td>
                                    <td><span class="title-table">Titulo</span></td>
                                    <td><span class="title-table">Creado por</span></td>
                                    <td><span class="title-table">
                                    <button class="btn-action"><i class='bx bx-bug' ></i></button>
                                    <button class="btn-action"><i class='bx bx-edit' ></i></button>
                                    <button class="btn-action"><i class='bx bx-trash' ></i></button>
                                </span></td>
                                </tr>

                                <tr>
                                    <td><span class="title-table">ID</span></td>
                                    <td><span class="title-table">Titulo</span></td>
                                    <td><span class="title-table">Creado por</span></td>
                                    <td><span class="title-table">
                                    <button class="btn-action"><i class='bx bx-bug' ></i></button>
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