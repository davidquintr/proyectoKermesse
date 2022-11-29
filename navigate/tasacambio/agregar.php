<?php
$title = "Agregar Tasa Cambio";
$direct = "../../";
include '../../partials/top.php';

include_once("{$direct}entidades/tbl_moneda.php");
include_once("{$direct}datos/Dt_tbl_moneda.php");

$dtMoneda = new Dt_tbl_Moneda();

?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Agregar Tasa de Cambio</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Tasa de Cambio</li>
        <li class="breadcrumb-item active">Agregar Tasa de Cambio</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_tasacambio.php">
                                <input type="hidden" value="1" name="txtaccion" id="txtaccion"/>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="monedaO" name="monedaO" title="Seleccione una Moneda Origen" required>
                                        <option value="">Seleccione una Moneda Origen</option>
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
                                    <select class="form-control" id="monedaC" name="monedaC" title="Seleccione una Moneda Destino" required>
                                        <option value="">Seleccione una Moneda Destino</option>
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
                                    <input class="form-control" id="mes" name="mes" type="number"
                                        title="Mes" placeholder="Ingrese un mes" min="1" max="12" required />
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="anio" name="anio" type="number"
                                        title="Anio" placeholder="Ingrese un año" min="2000" required />
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="tipoCambio" name="tipoCambio" 
                                        title="TipoCambio" placeholder="Ingrese una tipo de cambio (decimal)" min="0" required />
                                </div>
                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block">Agregar Tasa de Cambio</button>
                                    <button type="reset" class="btn btn-danger btn-block my-2">Descartar Tasa de Cambio</button> 
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