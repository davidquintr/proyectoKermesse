<?php
$title = "Editar Moneda";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_moneda.php';
include_once '../../entidades/tbl_moneda.php';

$varIdU = 0;
if(isset($varIdU)){ 
  $varIdU = $_GET['varEnter'];
}

$dtMoneda = new Dt_tbl_Moneda();
$moneda = $dtMoneda->getMoneda($varIdU);

?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Editar Moneda</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Monedas</li>
        <li class="breadcrumb-item active">Editar Moneda</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_moneda.php">
                                <input type="hidden" value="2" name="txtaccion" id="txtaccion"/>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="monID" name="monID" type="text" title="ID" value="<?php echo $moneda->id_moneda;?>" disabled/>
                                    <input class="form-control" id="idU" name="idU" type="hidden" title="ID" value="<?php echo $moneda->id_moneda;?>"/>
                                    <label for="monID">ID</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="monname" name="monname" type="text" title="Nombre de la moneda" value="<?php echo $moneda->nombre?>" required/>
                                    <label for="username">Nombre</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="monsim" name="monsim" type="text" title="Simbolo de la moneda" value="<?php echo $moneda->simbolo?>" required/>
                                    <label for="username">Simbolo</label>
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