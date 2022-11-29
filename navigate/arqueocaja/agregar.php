<?php
$title = "Agregar Arqueo Caja";
$direct = "../../";
include '../../partials/top.php';
include_once("{$direct}entidades/tbl_kermesse.php");
include_once("{$direct}datos/Dt_tbl_kermesse.php");

include_once("{$direct}entidades/tbl_moneda.php");
include_once("{$direct}datos/Dt_tbl_moneda.php");

include_once("{$direct}entidades/tbl_denominacion.php");
include_once("{$direct}datos/Dt_tbl_denominacion.php");

$dtKerm = new Dt_tbl_kermesse();
$dtMoneda = new Dt_tbl_Moneda();
$dtDenom = new Dt_tbl_Denominacion();


?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Agregar Arqueo Caja</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Arqueo Caja</li>
        <li class="breadcrumb-item active">Agregar Arqueo Caja</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_arqueocaja.php">
                                <input type="hidden" value="1" name="txtaccion" id="txtaccion"/>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="kermesse" name="kermesse" title="Seleccione una Kermesse" required>
                                        <option value="">Seleccione una Kermesse</option>
                                        <?php
                                            foreach($dtKerm->listarKermesse() as $kerm):
                                        ?>
                                            <option value="<?php echo $kerm->__GET('id_kermesse');?>"><?php echo $kerm->nombre?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="rol" name="rol" title="Seleccione una Región" required>
                                        <option value="">Seleccione una Moneda</option>
                                        <?php
                                            foreach($dtMoneda->listarMonedas() as $money):
                                        ?>
                                            <option value="<?php echo $money->id_moneda?>"><?php echo $money->simbolo." ".$money->nombre?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="rol" name="rol" title="Seleccione una Región" required>
                                        <option value="">Seleccione una Denominación</option>
                                        <?php
                                            foreach($dtDenom->listarDenominaciones() as $denom):
                                        ?>
                                            <option value="<?php echo $denom->id_denominacion?>"><?php echo $denom->valor." ".$denom->valor_letras?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="username" name="username" type="number" title="Nombre de usuario" placeholder="Ingrese una cantidad" min="0" required/>
                                </div>
                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block">Agregar Arqueo Caja</button>
                                    <button type="reset" class="btn btn-danger btn-block my-2">Descartar Arqueo Caja</button> 
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