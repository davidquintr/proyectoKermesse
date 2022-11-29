<?php
error_reporting(0);
$title = "Ver Productos";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_Productos.php';
include_once '../../entidades/tbl_productos.php';
include_once("{$direct}entidades/tbl_comunidad.php");
include_once("{$direct}datos/Dt_tbl_comunidad.php");

include_once("{$direct}entidades/tbl_categoria_producto.php");
include_once("{$direct}datos/Dt_tbl_categoria_producto.php");

$dtComun = new Dt_tbl_comunidad();
$dtCatProd = new Dt_tbl_categoria_producto();

$varIdU = 0;
if(isset($varIdU)){ 
  $varIdU = $_GET['varEnter'];
}
$dtprod = new Dt_tbl_productos();
$prod = $dtprod->getProdByID($varIdU);

?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Ver Productos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href= "<?php echo $direct;?>index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Productos</li>
        <li class="breadcrumb-item active">Ver Productos</li>
    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">

                                <div class="form-floating mb-3">

                                <div class="form-floating mb-3">
                                <input class="form-control" id="id" name="id" type="text" title="ID de producto" value="<?php echo $varIdU?>" disabled/>
                                    <input class="form-control" id="prodID" name="prodID" type="hidden" title="ID de Producto" value="<?php echo $varIdU?>"/>
                                    <label for="prodID">prodID</label>
                                </div>
                                <select class="form-control" id="comunidad" name="comunidad" title="Seleccione una comunidad" disabled>
                                        <?php
                                            foreach($dtComun->listarComunidad() as $comun):
                                        ?>
                                            <option value="<?php echo $comun->__GET('id_comunidad');?>"><?php echo $comun->nombre?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                <select class="form-control" id="catProd" name="catProd" title="Seleccione la categoria del producto" disabled>
                                        <?php
                                            foreach($dtCatProd->listarCatProducto() as $catprod):
                                        ?>
                                            <option value="<?php echo $catprod->__GET('id_categoria_producto');?>"><?php echo $catprod->nombre?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="nombre" name="nombre" type="text" title="Nombre" placeholder="Ingrese el nombre del producto" value="<?php echo $prod->nombre;?>" disabled/>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="descripcion" name="descripcion" type="text" title="Descripcion" placeholder="Ingrese una descripcion para el producto" value="<?php echo $prod->descripcion;?>" disabled/>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="cantidad" name="cantidad" type="number" title="Cantidad" placeholder="Ingrese una cantidad" min="0" value="<?php echo $prod->cantidad;?>" disabled/>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="precioS" name="precioS" type="number" title="PrecioS" placeholder="Ingrese un precio" min="0" value="<?php echo $prod->preciov_sugerido;?>" disabled/>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../dependencies/js/messageSetters.js"></script>
<?php
include '../../partials/bottom.php';
?>