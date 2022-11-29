<?php
$title = "Agregar Denominacion";
$direct = "../../";
include '../../partials/top.php';

include_once("{$direct}entidades/tbl_moneda.php");
include_once("{$direct}datos/Dt_tbl_moneda.php");

$dtMoneda = new Dt_tbl_moneda();
?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Agregar Denominación</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Denominaciones</li>
        <li class="breadcrumb-item active">Agregar Denominación</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_denominacion.php">
                                <input type="hidden" value="1" name="txtaccion" id="txtaccion"/>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="moneda" name="moneda" title="Seleccione una Moneda" required>
                                        <option value="">Seleccione una Moneda</option>
                                        <?php
                                            foreach($dtMoneda->listarMonedas() as $moneda):
                                        ?>
                                            <option value="<?php echo $moneda->__GET('id_moneda')?>"><?php echo $moneda->nombre?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                    <div class="form-floating mb-3">
                                    <input class="form-control" id="valor" name="valor" type="text" title="Valor de la denominacion" required/>
                                    <label for="username">Valor</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="valorlet" name="valorlet" type="text" title="Valor en letras de la denominacion" required/>
                                    <label for="username">Valor en Letras</label>
                                </div>
                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block">Agregar Denominación</button>
                                    <button type="reset" class="btn btn-danger btn-block my-2">Descartar Moneda</button> 
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