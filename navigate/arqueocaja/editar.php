<?php
$direct = "../../";
$title = "Editar Arqueo Caja";
error_reporting(0);
include '../../partials/top.php';

include_once("{$direct}entidades/tbl_kermesse.php");
include_once("{$direct}datos/Dt_tbl_kermesse.php");

include_once("{$direct}datos/Dt_tbl_arqueocaja.php");
include_once("{$direct}datos/tbl_arqueocaja.php");

include_once("{$direct}datos/tbl_arqueocaja_det.php");
include_once("{$direct}datos/Dt_tbl_arqueocaja_det.php");

include_once("{$direct}entidades/tbl_moneda.php");
include_once("{$direct}datos/Dt_tbl_moneda.php");

include_once("{$direct}entidades/tbl_denominacion.php");
include_once("{$direct}datos/Dt_tbl_denominacion.php");

$dtArq = new Dt_tbl_Arqueocaja();
$dtArqDet = new Dt_Tbl_arqueocaja_det();
$dtKerm = new Dt_tbl_kermesse();
$dtMoneda = new Dt_tbl_Moneda();
$dtDenom = new Dt_tbl_Denominacion();

$varIdU = 0;
if (isset($varIdU)) {
    $varIdU = $_GET['varEnter'];
}

$arqCaja = $dtArq->getArqueoByID($varIdU);
$arqCajaDet = $dtArqDet->getArqueoDetByID($arqCaja->id_ArqueoCaja);

?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Editar Arqueo Caja</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Arqueo Caja</li>
        <li class="breadcrumb-item active">Editar Arqueo Caja</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_arqueocaja.php">
                                <input type="hidden" value="2" name="txtaccion" id="txtaccion" />
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="id" name="id" type="text" title="ID de Arqueo Caja" value="<?php echo $varIdU?>" disabled/>
                                    <input class="form-control" id="idArq" name="idArq" type="hidden" title="ID de Arqueo Caja" value="<?php echo $varIdU?>"/>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="kermesse" name="kermesse"
                                        title="Seleccione una Kermesse" required>
                                        <option value="">Seleccione una Kermesse</option>
                                        <?php
                                        foreach ($dtKerm->listarKermesse() as $kerm):
                                            if ($kerm->__GET('id_kermesse') == $arqCaja->idKermesse):
                                        ?>
                                        <option value="<?php echo $kerm->__GET('id_kermesse'); ?>" selected>
                                            <?php echo $kerm->nombre ?>
                                        </option>
                                        <?php else:
                                        ?>
                                        <option value="<?php echo $kerm->__GET('id_kermesse'); ?>">
                                            <?php echo $kerm->nombre ?>
                                        </option>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="moneda" name="moneda" title="Seleccione una Región"
                                        required>
                                        <option value="">Seleccione una Moneda</option>
                                        <?php
                                        foreach ($dtMoneda->listarMonedas() as $money):
                                            if ($money->id_moneda == $arqCajaDet->idMoneda):
                                        ?>
                                        <option value="<?php echo $money->id_moneda ?>" selected>
                                            <?php echo $money->simbolo . " " . $money->nombre ?>
                                        </option>
                                        <?php else:
                                        ?>
                                        <option value="<?php echo $money->id_moneda ?>">
                                            <?php echo $money->simbolo . " " . $money->nombre ?>
                                        </option>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="denom" name="denom" title="Seleccione una Región"
                                        required>
                                        <option value="">Seleccione una Denominación</option>
                                        <?php
                                        foreach ($dtDenom->listarDenominaciones() as $denom):
                                            if ($denom->id_denominacion == $arqCajaDet->idDenominacion):
                                        ?>
                                        <option value="<?php echo $denom->id_denominacion ?>" selected>
                                            <?php echo $denom->valor . " " . $denom->valor_letras ?>
                                        </option>
                                        <?php else:
                                        ?>
                                        <option value="<?php echo $denom->id_denominacion ?>">
                                            <?php echo $denom->valor . " " . $denom->valor_letras ?>
                                        </option>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="cantidad" name="cantidad" type="number"
                                        title="Cantidad" placeholder="Ingrese una cantidad" min="0"
                                        value="<?php echo $arqCajaDet->cantidad ?>" required />
                                </div>
                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block">Guardar cambios</button>
                                    <button type="reset" class="btn btn-danger btn-block my-2">Descartar
                                        cambios</button>
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