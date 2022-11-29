<?php
$title = "Ver Denominacion";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_denominacion.php';
include_once '../../entidades/tbl_denominacion.php';

include_once("{$direct}entidades/tbl_moneda.php");
include_once("{$direct}datos/Dt_tbl_moneda.php");

$varIdU = 0;
if(isset($varIdU)){ 
  $varIdU = $_GET['varEnter'];
}

$dtMoneda = new Dt_tbl_Moneda();
$dtDenominacion = new Dt_tbl_Denominacion();
$denominacion = $dtDenominacion->getDenominacion($varIdU);

?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Ver Denominación</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Denominaciones</li>
        <li class="breadcrumb-item active">Ver Denominación</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_denominacion.php">
                                <input type="hidden" value="2" name="txtaccion" id="txtaccion"/>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="ID" name="ID" type="text" title="ID" value="<?php echo $denominacion->id_denominacion;?>" disabled/>
                                    <input class="form-control" id="idU" name="idU" type="hidden" title="ID" value="<?php echo $denominacion->id_denominacion;?>"/>
                                    <label for="ID">ID</label>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="moneda" name="moneda"
                                        title="Seleccione una Moneda" disabled>
                                        <option value="">Seleccione una Moneda</option>
                                        <?php
                                        foreach ($dtMoneda->listarMonedas() as $mon):
                                            if ($mon->__GET('id_moneda') == $denominacion->idMoneda):
                                        ?>
                                        <option value="<?php echo $mon->__GET('id_moneda'); ?>" selected>
                                            <?php echo $mon->nombre ?>
                                        </option>
                                        <?php else:
                                        ?>
                                        <option value="<?php echo $mon->__GET('id_moneda'); ?>">
                                            <?php echo $mon->nombre ?>
                                        </option>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="valor" name="valor" type="text" title="Valor de la denominacion" value="<?php echo $denominacion->valor?>" disabled/>
                                    <label for="username">Valor</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="valorlet" name="valorlet" type="text" title="Valor en letras de la denominacion" value="<?php echo $denominacion->valor_letras?>" disabled/>
                                    <label for="username">Valor en Letras</label>
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