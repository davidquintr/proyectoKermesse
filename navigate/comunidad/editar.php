<?php
$title = "Editar Comunidad";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_comunidad.php';
include_once '../../entidades/tbl_comunidad.php';

$varIdU = 0;
if(isset($varIdU)){ 
  $varIdU = $_GET['varEnter'];
}

$dtComunidad = new Dt_tbl_comunidad();
$comunidad = $dtComunidad->getRolByID($varIdU);

?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Editar Comunidad</h1>
    
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Comunidad</li>
        <li class="breadcrumb-item active">Agregar Comunidad</li>
    </ol>

    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">

                            <form method="POST" action="../../negocio/Ng_tbl_comunidad.php">
                                <input type="hidden" value="2" name="txtaccion" id="txtaccion"/>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="rolID" name="rolID" type="text" title="ID" value="<?php echo $comunidad->id_comunidad;?>" disabled/>
                                    <input class="form-control" id="idComunidad" name="idComunidad" type="hidden" title="ID" value="<?php echo $comunidad->id_comunidad;?>"/>
                                    <label for="rolID">ID</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="comunidadName" name="comunidadName" type="text" title="Nombre comunidad" value="<?php echo $comunidad->nombre?>" required/>
                                    <label for="username">Nombre de la comunidad</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="responsable" name="responsable" type="text" title="Responsable" value="<?php echo $comunidad->responsable?>" required/>
                                    <label for="username">Responsable de la comunidad</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="desc_contribucion" name="desc_contribucion" type="text" title="Descripcion contribucion" value="<?php echo $comunidad->desc_contribucion?>" required/>
                                    <label for="username">Descripcion comunidad</label>
                                </div>

                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block">Finalizar edición</button>
                                    <button type="reset" class="btn btn-danger btn-block my-2">Descartar edición</button> 
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