<?php
$title = "Gestionar productos";
$direct = "../../";
error_reporting(0);
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_productos.php';
include_once '../../entidades/tbl_productos.php';
include_once '../../entidades/vw_productos.php';

$dtproducto = new Dt_tbl_productos();
$producto = $dtproducto->listarVwProductos();


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
        <div class="alert alert-secondary">
        <a href="agregar.php"><button type="button" class="btn btn-outline-primary"><i class="fas fa-user pr-4" aria-hidden="true"></i>Agregar un nuevo Producto</button></a>
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
                            echo "<td>$value->id</td>";
                            echo "<td>$value->comunidad</td>";
                            echo "<td>$value->categoria_producto</td>";
                            echo "<td>$value->nombre</td>";
                            echo "<td>$value->descripcion</td>";
                            echo "<td>$value->cantidad</td>";
                            echo "<td>$value->preciov_sugerido</td>";
                            echo "<td>$value->estado</td>";
                        ?>
                        <td>
                            <a href="ver.php?varEnter=<?php echo $value->id;?>" title="Visualizar los datos de los productos">
                                <i class="fa-solid fa-eye"></i>
                            </a>&nbsp;
                            <a href="editar.php?varEnter=<?php echo $value->id;?>"title="Modificar los datos de los productos">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>&nbsp;
                            <a onclick="deleteObject('<?php echo $value->id;?>','prod');" title="Dar de baja">
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
    <script src="../../dependencies/js/messageSetters.js"></script>
    <script src="../../dependencies/js/tablesSetters.js"></script>
    <script src="../../dependencies/js/deleteScripts.js"></script>
<?php
include 'partials/bottom.php';
?>