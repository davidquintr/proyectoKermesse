<?php
$title = "Agregar Productos";
$direct = "../../";
include '../../partials/top.php';
include_once("{$direct}entidades/tbl_comunidad.php");
include_once("{$direct}datos/Dt_tbl_comunidad.php");

include_once("{$direct}entidades/tbl_categoria_producto.php");
include_once("{$direct}datos/Dt_tbl_categoria_producto.php");

$dtComun = new Dt_tbl_comunidad();
$dtCatProd = new Dt_tbl_categoria_producto();


?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Agregar Productos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Productos</li>
        <li class="breadcrumb-item active">Agregar Productos</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_producto.php">
                                <input type="hidden" value="1" name="txtaccion" id="txtaccion"/>
                                <div class="form-floating mb-3">
                                <select class="form-control" id="comunidad" name="comunidad" title="Seleccione una comunidad" required>
                                        <option value="">Seleccione una comunidad</option>
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
                                    <input class="form-control" id="nombre" name="nombre" type="text" title="Nombre" placeholder="Ingrese el nombre del producto" required/>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="descripcion" name="descripcion" type="text" title="Descripcion" placeholder="Ingrese una descripcion para el producto" required/>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="cantidad" name="cantidad" type="number" title="Cantidad" placeholder="Ingrese una cantidad" min="0" required/>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="precioS" name="precioS" type="number" title="PrecioS" placeholder="Ingrese un precio" min="0" required/>
                                </div>
                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block">Agregar usuario</button>
                                    <button type="reset" class="btn btn-danger btn-block my-2">Descartar usuario</button> 
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