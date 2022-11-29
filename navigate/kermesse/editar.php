<?php
$title = "Editar Kermesse";
$direct = "../../";
include '../../partials/top.php';

include_once '../../datos/Dt_tbl_kermesse.php';
include_once '../../entidades/tbl_kermesse.php';

$varIdU = 0;
if (isset($varIdU)) {
    $varIdU = $_GET['varEnter'];
}

$dtKermesse = new Dt_tbl_kermesse();
$kermesse = $dtKermesse->getKermesseByID($varIdK);

?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Editar Kermesse</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de kermesse</li>
        <li class="breadcrumb-item active">Editar Kermesse</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_kermesse.php">
                                <input type="hidden" value="2" name="txtaccion" id="txtaccion"/>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="id" name="id" type="text" title="ID de Kermess" value="<?php echo $varIdU?>" disabled/>
                                    <input class="form-control" id="idKermesse" name="idKermesse" type="hidden" title="id de Kermesse" value="<?php echo $varIdU?>"/>
                                    <label for="kermesseID">ID</label>
                                </div>

                                <input class="form-control" id="kermessename" name="kermessename" type="text" title="Nombre de la kermesse" value="<?php echo $kermesse->nombre ?>" required/>
                                    <label for="username">Nombre de la kermesse</label>
                                </div>

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="fInicio" name="fInicio" type="date" title="fInicio" value="<?php echo $kermesse->fInicio ?>" required/>
                                    <label for="username">Fecha de inicio</label>
                                </div>

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="fFinal" name="fFinal" type="date" title="fFinal" value="<?php echo $kermesse->fFinal ?>" required/>
                                    <label for="username">Fecha de cierre</label>
                                </div>

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="descripcion" name="descripcion" type="text" title="descripcion" value="<?php echo $kermesse->descripcion ?>" required/>
                                    <label for="username">Ponga una descripcion</label>
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