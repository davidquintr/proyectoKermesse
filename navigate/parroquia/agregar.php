<?php
$title = "Agregar Parroquia";
$direct = "../../";
include '../../partials/top.php';

?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Agregar Parroquia</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Parroquias</li>
        <li class="breadcrumb-item active">Agregar Parroquia</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_parroquia.php">
                                <input type="hidden" value="1" name="txtaccion" id="txtaccion"/>
                            

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="parroquianame" name="parroquianame" type="text" title="Nombre de la parroquia" required/>
                                    <label for="username">Nombre de la parroquia</label>
                                </div>

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="direccion" name="direccion" type="text" title="direccion" required/>
                                    <label for="username">direccion</label>
                                </div>

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="telefono" name="telefono" type="text" title="telefono" required/>
                                    <label for="username">telefono</label>
                                </div>

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="parroco" name="parroco" type="text" title="parroco" required/>
                                    <label for="username">parroco</label>
                                </div>

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="logo" name="logo" type="text" title="logo" required/>
                                    <label for="username">logo</label>
                                </div>

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="sitio_web" name="sitio_web" type="text" title="sitio web" required/>
                                    <label for="username">sitio_web</label>
                                </div>

                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block">Agregar Parroquia</button>
                                    <button type="reset" class="btn btn-danger btn-block my-2">Descartar Kermesse</button> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../../partials/bottom.php';
?>