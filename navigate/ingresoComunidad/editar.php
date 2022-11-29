<?php
$title = "Editar Ingreso Comunidad";
$direct = "../../";
include '../../partials/top.php';
include_once("{$direct}entidades/tbl_kermesse.php");
include_once("{$direct}datos/Dt_tbl_kermesse.php");

include_once("{$direct}entidades/tbl_productos.php");
include_once("{$direct}datos/Dt_tbl_productos.php");

include_once("{$direct}entidades/tbl_control_bonos.php");
include_once("{$direct}datos/Dt_tbl_control_bonos.php");

include_once("{$direct}entidades/tbl_comunidad.php");
include_once("{$direct}datos/Dt_tbl_comunidad.php");

include_once("{$direct}entidades/tbl_denominacion.php");
include_once("{$direct}datos/Dt_tbl_denominacion.php");

include_once("{$direct}datos/Dt_tbl_kermesse.php");
include_once("{$direct}datos/Dt_tbl_ingreso_comunidad_det.php");
include_once("{$direct}datos/Dt_tbl_ingreso_comunidad.php");


$varIdU = 0;
if(isset($varIdU)){ 
  $varIdU = $_GET['varEnter'];
}

$dtKerm = new Dt_tbl_kermesse();
$dtProd = new Dt_tbl_productos();
$dtConBonos = new Dt_tbl_control_bonos();

$dtDenom = new Dt_tbl_Denominacion();

$dtKermesse = new Dt_tbl_kermesse();
$dtComunidad = new Dt_tbl_comunidad();

$dtComunidadDet = new Dt_tbl_ingreso_comunidad_det();

$dtIngresoComunidad = new Dt_tbl_ingreso_comunidad();
$ingComunidad = $dtIngresoComunidad->getIngrByID($varIdU);
$ingComunidadDet = $dtComunidadDet->getIngresoDetByID($varIdU);

?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Agregar Ingreso Comunidad</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión Ingreso Comunidad</li>
        <li class="breadcrumb-item active">Agregar Ingreso Comunidad</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            
                            <form method="POST" action="../../negocio/Ng_tbl_ingreso_comunidad.php">
                            
                            <input type="hidden" value="2" name="txtaccion" id="txtaccion" />
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="id" name="id" type="text" title="ID de Ingreso Comunidad" value="<?php echo $varIdU?>" disabled/>
                                    <input class="form-control" id="idIng" name="idIng" type="hidden" title="ID de Ingreso Comunidad" value="<?php echo $varIdU?>"/>
                                </div>
                                <input type="hidden" value="2" name="txtaccion" id="txtaccion"/>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="ker" name="ker" title="Seleccione una Kermesse" required>
                                        <option value="">Seleccione una Kermesse</option>
                                        <?php
                                            foreach($dtKerm->listarKermesse() as $kerm):
                                                if($kerm->id_kermesse == $ingComunidad->id_kermesse):
                                        ?>
                                            <option value="<?php echo $kerm->__GET('id_kermesse');?>" selected><?php echo $kerm->nombre?></option>
                                        <?php
                                            else:
                                        ?>
                                            <option value="<?php echo $kerm->__GET('id_kermesse');?>"><?php echo $kerm->nombre?></option>
                                        <?php
                                        endif;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-control" id="comunidad" name="comunidad" title="Seleccione una Kermesse" required>
                                        <option value="">Seleccione una Comunidad</option>
                                        <?php
                                            foreach($dtComunidad->listarComunidad() as $com):
                                                if($com->id_comunidad == $ingComunidad->id_comunidad):
                                        ?>
                                            <option value="<?php echo $com->__GET('id_comunidad');?>" selected><?php echo $com->nombre?></option>
                                        <?php
                                            else:
                                        ?>
                                            <option value="<?php echo $com->__GET('id_comunidad');?>"><?php echo $com->nombre?></option>
                                        <?php
                                        endif;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-control" id="producto" name="producto" title="Seleccione una Región" required>
                                        <option value="">Seleccione un Producto</option>
                                        <?php
                                            foreach($dtProd->listarProductos() as $productos):
                                                if($productos->id_producto == $ingComunidad->id_producto):
                                        ?>
                                            <option value="<?php echo $dtProd->id_producto?>" selected><?php echo $productos->nombre?></option>
                                        <?php
                                            else:
                                        ?>
                                            <option value="<?php echo $dtProd->id_producto?>"><?php echo $productos->nombre?></option>
                                        <?php
                                        endif;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="cantProductos" name="cantProductos" type="number" title="Cantidad de productos" placeholder="Ingrese la cantidad de productos" min="0" value="<?php echo $ingComunidad->cant_productos?>" required/>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-control" id="bono" name="bono" title="Seleccione un bono" required>
                                        <option value="">Seleccione un bono</option>
                                        <?php
                                            foreach($dtConBonos->listarControlBonos() as $bonos):
                                                if($bonos->id_bono == $ingComunidadDet->id_bono):
                                        ?>
                                            <option value="<?php echo $bonos->id_bono?>" selected><?php echo $bonos->valor?></option>
                                        <?php
                                            else:
                                        ?>
                                            <option value="<?php echo $bonos->id_bono?>"><?php echo $bonos->valor?></option>
                                        <?php
                                        endif;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="totalBonos" name="totalBonos" type="number" title="Cantidad" placeholder="Ingrese cantidad de bonos" min="0" value="<?php echo $ingComunidad->total_bonos?>" required/>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-control" id="denom" name="denom" title="Seleccione una Región" required>
                                        <option value="">Seleccione una Denominación</option>
                                        <?php
                                            foreach($dtDenom->listarDenominaciones() as $denom):
                                                if($denom->id_denominacion == $ingComunidadDet->denominacion):
                                        ?>
                                            <option value="<?php echo $denom->id_denominacion?>" selected><?php echo $denom->valor." ".$denom->valor_letras?></option>
                                        <?php
                                            else:
                                        ?>
                                            <option value="<?php echo $denom->id_denominacion?>"><?php echo $denom->valor." ".$denom->valor_letras?></option>
                                        <?php
                                        endif;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="cantidad" name="cantidad" type="number" title="Cantidad" placeholder="Ingrese una cantidad" min="0" value="<?php echo $ingComunidadDet->cantidad?>" required/>
                                </div>
                                
                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block" disabled>Guardar cambios</button>
                                    <button type="reset" class="btn btn-danger btn-block my-2">Descartar cambios</button> 
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