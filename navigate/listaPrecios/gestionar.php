<?php
$title = "Listar Precio";
$direct = "../../";

include '../../partials/top.php';
include_once '../../datos/Dt_tbl_lista_precio.php';
include_once '../../entidades/tbl_lista_precio.php';

$dtListPrecio = new Dt_tbl_lista_precio();
$ListPrecio = $dtListPrecio->listarVwPrecio();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Datos de Lista de precios</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de Lista de precios</li>
        </ol>
        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los datos de los precios activos.
        </div>
        <div class="alert alert-secondary">
        <a href="agregar.php"><button type="button" class="btn btn-outline-primary"><i class="fas fa-user pr-4" aria-hidden="true"></i>Crear una nueva lista</button></a>
    </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Lista de precios Activas
            </div>
            <div class="card-body">
                <table id="generic" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kermesse</th>
                            <th>Producto</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio Venta</th>
                            <th>Estado</th> 
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($ListPrecio as $value):
                            echo "<tr>";
                            echo "<td>$value->id</td>";
                            echo "<td>$value->kermesse</td>";
                            echo "<td>$value->producto</td>";
                            echo "<td>$value->nombre</td>";
                            echo "<td>$value->descripcion</td>";
                            echo "<td>$value->precio_venta</td>";
                            echo "<td>$value->estado</td>"
                        ?>
                        <td>
                            <a href="ver.php?varEnter=<?php echo $value->id?>" title="Visualizar los datos de una lista de productos">
                                <i class="fa-solid fa-eye"></i>
                            </a>&nbsp;
                            <a href="editar.php?varEnter=<?php echo $value->id?>" title="Modificar los datos de una lista de productos">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>&nbsp;
                            <a onclick="deleteObject('<?php echo $value->id;?>','listprod');" target="_blank" title="Dar de baja">
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
                            <th>Kermesse</th>
                            <th>Producto</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio Venta</th>
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
include '../../partials/bottom.php';
?>