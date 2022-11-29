<?php
$direct = "../../";
$title = "Editar Lista Precio";
error_reporting(0);
include '../../partials/top.php';

include_once("{$direct}entidades/tbl_kermesse.php");
include_once("{$direct}datos/Dt_tbl_kermesse.php");

include_once("{$direct}entidades/tbl_productos.php");
include_once("{$direct}datos/Dt_tbl_productos.php");

include_once("{$direct}datos/tbl_lista_precio.php");
include_once("{$direct}datos/Dt_tbl_lista_precio.php");

include_once("{$direct}datos/tbl_listaprecio_det.php");
include_once("{$direct}datos/Dt_tbl_listaprecio_det.php");


$dtlistp = new Dt_tbl_lista_precio();
$dtlistdet = new Dt_tbl_listaprecio_det();
$dtKerm = new Dt_tbl_kermesse();
$dtprod = new Dt_tbl_productos();

$varIdU = 0;
if (isset($varIdU)) {
    $varIdU = $_GET['varEnter'];
}

$listp = $dtlistp->getListPByID($varIdU);
$listpDet = $dtlistdet->getListPDetByID($listp->id_lista_precio);

?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Editar Lista Precio</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Lista Precio</li>
        <li class="breadcrumb-item active">Editar Lista Precio</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_listaPrecios.php">
                                <input type="hidden" value="2" name="txtaccion" id="txtaccion" />
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="id" name="id" type="text" title="ID de Lista Precio" value="<?php echo $varIdU?>" disabled/>
                                    <input class="form-control" id="idlist" name="idlist" type="hidden" title="ID de Lista Precio" value="<?php echo $varIdU?>"/>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="kermesse" name="kermesse"
                                        title="Seleccione una Kermesse" required>
                                        <option value="">Seleccione una Kermesse</option>
                                        <?php
                                        foreach ($dtKerm->listarKermesse() as $kerm):
                                            if ($kerm->__GET('id_kermesse') == $listp->id_kermesse):
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
                                    <select class="form-control" id="producto" name="producto" title="Seleccione un Producto"
                                        required>
                                        <option value="">Seleccione una producto</option>
                                        <?php
                                        foreach ($dtprod->listarProductos() as $produ):
                                            if ($produ->id_producto == $listpDet->id_producto):
                                        ?>
                                        <option value="<?php echo $produ->id_producto ?>" selected>
                                            <?php echo $produ->nombre ?>
                                        </option>
                                        <?php else:
                                        ?>
                                        <option value="<?php echo $produ->id_producto ?>">
                                            <?php echo $produ->nombre  ?>
                                        </option>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="nombre" name="nombre" type="text"
                                        title="Nombre" placeholder="Ingrese un Nombre" 
                                        value="<?php echo $listp->nombre ?>" required />
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="descripcion" name="descripcion" type="text"
                                        title="Descipcion" placeholder="Ingrese una Descripcion" 
                                        value="<?php echo $listpdet->descripcion ?>" required />
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="precioV" name="precioV" type="number"
                                        title="precio Venta" placeholder="Ingrese un precio" min="0"
                                        value="<?php echo $listpdet->precio_venta ?>" required />
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