<?php
$title = "Agregar Lista Precio";
$direct = "../../";
include '../../partials/top.php';
include_once("{$direct}entidades/tbl_kermesse.php");
include_once("{$direct}datos/Dt_tbl_kermesse.php");

include_once("{$direct}entidades/tbl_productos.php");
include_once("{$direct}datos/Dt_tbl_productos.php");


$dtKerm = new Dt_tbl_kermesse();
$dtprod = new Dt_tbl_productos();



?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Agregar Precio</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Precio</li>
        <li class="breadcrumb-item active">Agregar Precio</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_listaPrecios.php">
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
                                    <select class="form-control" id="producto" name="producto" title="Seleccione un producto" required>
                                        <option value="">Seleccione un producto</option>
                                        <?php
                                            foreach($dtprod->listarProductos() as $prod):
                                        ?>
                                            <option value="<?php echo $prod->__GET('id_producto')?>"><?php echo $prod->nombre?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="nombre" name="nombre" type="text" title="Nombre" placeholder="Ingrese el nombre de la lista" required/>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="descripcion" name="descripcion" type="text" title="descripcion" placeholder="Ingrese una Descripcion de la lista" required/>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="precioV" name="precioV" type="number" title="precioV" placeholder="Ingrese el precio de venta" min="0" required/>
                                </div>
                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block">Agregar Precio</button>
                                    <button type="reset" class="btn btn-danger btn-block my-2">Descartar Precioo</button> 
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