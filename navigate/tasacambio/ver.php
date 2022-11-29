<?php
$direct = "../../";
$title = "Ver Tasa Cambio";
error_reporting(0);
include '../../partials/top.php';

include_once("{$direct}datos/Dt_tbl_tasacambio.php");
include_once("{$direct}entidades/tbl_tasacambio.php");

include_once("{$direct}entidades/tasacambio_det.php");
include_once("{$direct}datos/Dt_tbl_tasacambio_det.php");

include_once("{$direct}entidades/tbl_moneda.php");
include_once("{$direct}datos/Dt_tbl_moneda.php");

$dtTascam = new Dt_tbl_tasaCambio();
$dtTascamDet = new Dt_Tbl_tasaCambio_det();
$dtMoneda = new Dt_tbl_Moneda();

$varIdU = 0;
if (isset($varIdU)) {
    $varIdU = $_GET['varEnter'];
}

$tascam = $dtTascam->getTasaCambio($varIdU);
$tascamDet = $dtTascamDet->getTasaCambio_det($tascam->id_tasaCambio);

?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Ver Tasa de Cambio</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Tasa de Cambio</li>
        <li class="breadcrumb-item active">Ver Tasa de Cambio</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_tasaCambio.php">
                                <input type="hidden" value="2" name="txtaccion" id="txtaccion" />
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="id" name="id" type="text" title="ID de Tasa Cambio" value="<?php echo $varIdU?>" disabled/>
                                    <input class="form-control" id="idTascam" name="idTascam" type="hidden" title="ID de Tasa Cambio" value="<?php echo $varIdU?>"/>
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="monID">Moneda origen</label>
                                    <select class="form-control" id="monedaO" name="monedaO" title="Seleccione una Moneda Origen" disabled>
                                        <option value="">Seleccione una Moneda</option>
                                        <?php
                                        foreach ($dtMoneda->listarMonedas() as $money):
                                            if ($money->__GET('id_moneda') == $tascam->id_monedaO):
                                        ?>
                                        <option value="<?php echo $money->__GET('id_moneda') ?>" selected>
                                            <?php echo $money->simbolo . " " . $money->nombre ?>
                                        </option>
                                        <?php else:
                                        ?>
                                        <option value="<?php echo $money->__GET('id_moneda') ?>">
                                            <?php echo $money->simbolo . " " . $money->nombre ?>
                                        </option>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="monID">Moneda destino</label>
                                    <select class="form-control" id="monedaC" name="monedaC" title="Seleccione una Moneda Destino" disabled>
                                        <option value="">Seleccione una Moneda</option>
                                        <?php
                                        foreach ($dtMoneda->listarMonedas() as $money):
                                            if ($money->__GET('id_moneda') == $tascam->id_monedaC):
                                        ?>
                                        <option value="<?php echo $money->__GET('id_moneda') ?>" selected>
                                            <?php echo $money->simbolo . " " . $money->nombre ?>
                                        </option>
                                        <?php else:
                                        ?>
                                        <option value="<?php echo $money->__GET('id_moneda') ?>">
                                            <?php echo $money->simbolo . " " . $money->nombre ?>
                                        </option>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="username">Mes</label>
                                    <input class="form-control" id="mes" name="mes" type="number" title="Mes" min="1" max="12"
                                        value="<?php echo $tascam->__GET('mes') ?>" disabled />
                                </div>
                                <div class="form-floating mb-3">
                                <label for="username">Año</label>
                                    <input class="form-control" id="anio" name="anio" type="number" title="Anio" min="2000"
                                        value="<?php echo $tascam->__GET('anio') ?>" disabled />
                                </div>
                                <div class="form-floating mb-3">
                                <label for="username">Tipo de cambio</label>
                                    <input class="form-control" id="tipoCambio" name="tipoCambio" title="TipoCambio"
                                        value="<?php echo $tascamDet->__GET('tipoCambio') ?>" disabled />
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