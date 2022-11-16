<?php
$title = "Gestionar productos";
$direct = "../../";
error_reporting(0);
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_productos.php';
include_once '../../entidades/tbl_productos.php';

$dtproducto = new Dt_tbl_productos();
$producto = $dtproducto->listarProductos();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Datos de los Productos</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de productos</li>
        </ol>
        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los datos de los productos.
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Productos Activos
            </div>
            <div class="card-body">
                <table id="generic" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Comunidad</th>
                            <th>Categoria Producto</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Precio Sugerido</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($producto as $value):
                            echo "<tr>";
                            echo "<td>$value->id_producto</td>";
                            echo "<td>$value->id_comunidad</td>";
                            echo "<td>$value->id_cat_producto</td>";
                            echo "<td>$value->nombre</td>";
                            echo "<td>$value->descripcion</td>";
                            echo "<td>$value->cantidad</td>";
                            echo "<td>$value->preciov_sugerido</td>";
                            switch($value->estado){
                                case 1:
                                    echo "<td>Activo</td>";
                                break;
                                case 2:
                                    echo "<td>Modificado</td>";
                                break;
                                case 3:
                                    echo "<td>Inactivo/Eliminado</td>";
                                break;
                            }
                        ?>
                        <td>
                            <a href="#" target="_blank" title="Visualizar los datos de los productos">
                                <i class="fa-solid fa-eye"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Modificar los datos de los productos">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Dar de baja de productos">
                                <i class="fa-solid fa-user-minus"></i> 
                            </a>
                        </td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Comunidad</th>
                            <th>Categoria Producto</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Precio Sugerido</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script src="../../dependencies/js/setters.js"></script>
<?php
include 'partials/bottom.php';
?>