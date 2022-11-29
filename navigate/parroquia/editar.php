<?php
$title = "Editar Parroquia";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_parroquia.php';
include_once '../../entidades/tbl_parroquia.php';

$varIdU = 0;
if(isset($varIdU)){ 
  $varIdU = $_GET['varEnter'];
}

$dtParroquia = new Dt_tbl_parroquia();
$parroquia = $dtParroquia->getParroquiaByID($varIdU);

?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Editar parroquia</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de parroquia</li>
        <li class="breadcrumb-item active">Editar Parroquia</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_parroquia.php">
                                <input type="hidden" value="2" name="txtaccion" id="txtaccion"/>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="parrID" name="parrID" type="text" title="ID" value="<?php echo $parroquia->idParroquia;?>" disabled/>
                                    <input class="form-control" id="idP" name="idP" type="hidden" title="ID" value="<?php echo $parroquia->idParroquia;?>"/>
                                    <label for="catID">ID</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="parroquianame" name="parroquianame" type="text" title="Nombre de la parroquia" value="<?php echo $parroquia->nombre?>" required/>
                                    <label for="username">Nombre de la parroquia</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="direccion" name="direccion" type="text" title="direccion de la parroquia" value="<?php echo $parroquia->direccion?>" required/>
                                    <label for="username">direccion de la parroquia</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="telefono" name="telefono" type="text" title="telefono de la parroquia" value="<?php echo $parroquia->telefono?>" required/>
                                    <label for="username">telefono</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="parroco" name="parroco" type="text" title="parroco" value="<?php echo $parroquia->parroco?>" required/>
                                    <label for="username">parroco</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="logo" name="logo" type="text" title="logo de la parroquia" value="<?php echo $parroquia->logo?>" required/>
                                    <label for="username">logo de la parroquia</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="sitio_web" name="sitio_web" type="text" title="sitio web" value="<?php echo $parroquia->sitio_web?>" required/>
                                    <label for="username">sitio web de la comunidad</label>
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