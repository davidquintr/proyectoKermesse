<?php
$direct = "../../";
$title = "Ver Productos";
error_reporting(0);
include '../../partials/top.php';

include_once '../../datos/Dt_tbl_Productos.php';
include_once '../../entidades/tbl_productos.php';

include_once("{$direct}entidades/tbl_comunidad.php");
include_once("{$direct}datos/Dt_tbl_comunidad.php");

include_once("{$direct}entidades/tbl_categoria_producto.php");
include_once("{$direct}datos/Dt_tbl_categoria_producto.php");


$dtprod = new Dt_tbl_productos();
$dtComun = new Dt_tbl_comunidad();
$dtCatProd = new Dt_tbl_categoria_producto();

$varIdU = 0;
if (isset($varIdU)) {
    $varIdU = $_GET['varEnter'];
}

$prod = $dtprod->getProdByID($varIdU);

?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Ver Productos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Ver Productos</li>
        <li class="breadcrumb-item active">Ver Productos</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="id" name="id" type="text" title="ID de Productos" value="<?php echo $varIdU?>" disabled/>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="comun" name="comun"
                                        title="Seleccione una Comunidad" disabled>
                                        <option value="">Seleccione una Comunidad</option>
                                        <?php
                                        foreach ($dtComun->listarComunidad() as $kerm):
                                            if ($kerm->__GET('id_comunidad') == $prod->id_comunidad):
                                        ?>
                                        <option value="<?php echo $kerm->__GET('id_comunidad'); ?>" selected>
                                            <?php echo $kerm->nombre ?>
                                        </option>
                                        <?php else:
                                        ?>
                                        <option value="<?php echo $kerm->__GET('id_comunidad'); ?>">
                                            <?php echo $kerm->nombre ?>
                                        </option>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                <select class="form-control" id="catProd" name="catProd" title="Seleccione la categoria del producto" required>
                                        <option value="">Seleccione una Categoria</option>
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
                                    <input class="form-control" id="nombre" name="nombre" type="text" title="Nombre" placeholder="Ingrese el nombre del producto" value="<?php echo $prod->nombre;?>" required/>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="descripcion" name="descripcion" type="text" title="Descripcion" placeholder="Ingrese una descripcion para el producto" value="<?php echo $prod->descripcion;?>" required/>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="cantidad" name="cantidad" type="number" title="Cantidad" placeholder="Ingrese una cantidad" min="0" value="<?php echo $prod->cantidad;?>" required/>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="precioS" name="precioS" type="number" title="PrecioS" placeholder="Ingrese un precio" min="0" value="<?php echo $prod->preciov_sugerido;?>" required/>
                                </div> />
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