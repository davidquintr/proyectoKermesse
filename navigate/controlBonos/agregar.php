<?php
$title = "Agregar Bonos";
$direct = "../../";
include '../../partials/top.php';
?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Agregar Control Bonos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Bonos</li>
        <li class="breadcrumb-item active">Editar Bonos</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">

                            <form method="POST" action="../../negocio/Ng_tbl_control_bonos.php">
                                <input type="hidden" value="1" name="txtaccion" id="txtaccion"/>
                                
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="bonoName" name="bonoName" type="text" title="Nombre de la comunidad" required/>
                                    <label for="username">Nombre del bono</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="valorBono" name="valorBono" type="text" title="Responsable" required/>
                                    <label for="username">Valor del bono</label>
                                </div>

                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block">Agregar bono</button>
                                    <button type="reset" class="btn btn-danger btn-block my-2">Descartar bono</button> 
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