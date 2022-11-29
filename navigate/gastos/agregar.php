<?php
$title = "Agregar Gastos";
$direct = "../../";
include '../../partials/top.php';

include_once("{$direct}entidades/tbl_kermesse.php");
include_once("{$direct}datos/DT_tbl_kermesse.php");

include_once("{$direct}entidades/tbl_categoria_gastos.php");
include_once("{$direct}datos/DT_tbl_categoria_gastos.php");

$dtKermesse = new DT_tbl_kermesse();
$dtCatGastos = new DT_tbl_categoria_gastos();
?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Agregar gastos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de gastos</li>
        <li class="breadcrumb-item active">Agregar gastos</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_gastos.php">
                                <input type="hidden" value="1" name="txtaccion" id="txtaccion"/>
                            

                                <div class="form-floating mb-3">
                                    <select class="form-control" id="kermesse" name="kermesse" title="Seleccione una kermesse" required>
                                        <option value="">Seleccione una kermesse</option>
                                        <?php
                                            foreach($dtKermesse->listarKermesse() as $ker):
                                        ?>
                                            <option value="<?php echo $ker->__GET('id_kermesse');?>"><?php echo $ker->nombre?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-control" id="idCatGastos" name="idCatGastos" title="Seleccione una categoria" required>
                                        <option value="">Seleccione una categoria</option>
                                        <?php
                                            foreach($dtCatGastos->listarCatGastos() as $catGas):
                                        ?>
                                            <option value="<?php echo $catGas->__GET('id_categoria_gastos');?>"><?php echo $catGas->nombre_categoria?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="fechaGasto" name="fechaGasto" type="date" title="fechaGasto" required/>
                                    <label for="username">Fecha de Gasto</label>
                                </div>

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="concepto" name="concepto" type="text" title="concepto" required/>
                                    <label for="username">Ponga un concepto</label>
                                </div>

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="monto" name="monto" type="number" title="monto" required/>
                                    <label for="monto">Ponga un monto</label>
                                </div>

                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block">Agregar Gasto</button>
                                    <button type="reset" class="btn btn-danger btn-block my-2">Descartar Gasto</button> 
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