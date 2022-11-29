<?php
$title = "Agregar Comunidad";
$direct = "../../";
include '../../partials/top.php';
?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Agragar Comunidad</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Comunidad</li>
        <li class="breadcrumb-item active">Editar Comunidad</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">

                            <form method="POST" action="../../negocio/Ng_tbl_comunidad.php">
                                <input type="hidden" value="1" name="txtaccion" id="txtaccion"/>
                                
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="comunidadName" name="comunidadName" type="text" title="Nombre de la comunidad" required/>
                                    <label for="username">Nombre de la comunidad</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="responsable" name="responsable" type="text" title="Responsable" required/>
                                    <label for="username">Responsable</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="desc_contribucion" name="desc_contribucion" type="text" title="Descripcion contribucion" required/>
                                    <label for="username">Descripcion contribucion</label>
                                </div>
                                


                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block">Agregar comunidad</button>
                                    <button type="reset" class="btn btn-danger btn-block my-2">Descartar comunidad</button> 
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