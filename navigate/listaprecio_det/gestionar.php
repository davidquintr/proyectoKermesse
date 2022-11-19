<?php
$title = "Listar Precio detalle";
$direct = "../../";

include '../../partials/top.php';
include_once '../../datos/Dt_tbl_listaprecio_det.php';
include_once '../../entidades/tbl_listaprecio_det.php';

$dtListPreciodet = new Dt_tbl_listaprecio_det();
$ListPreciodet = $dtListPreciodet->listarPrecioDet();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Datos del detalle de la Lista de precios</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión detalle Lista de precios</li>
        </ol>
        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los datos de los detalles de precios activos/inactivos.
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Detalle de Lista de precios Activas
            </div>
            <div class="card-body">
                <table id="generic" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Lista de precio</th>
                            <th>ID Producto</th>
                            <th>Precio de Venta</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($ListPreciodet as $value):
                            echo "<tr>";
                            echo "<td>$value->id_listaprecio_det</td>";
                            echo "<td>$value->id_lista_precio</td>";
                            echo "<td>$value->id_producto</td>";
                            echo "<td>$value->precio_venta</td>";
                        ?>
                        <td>
                            <a href="#" target="_blank" title="Visualizar los datos del detalle de una lista de productos">
                                <i class="fa-solid fa-eye"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Modificar los datos del detalle de una lista de productos">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Dar de baja al detalle de lista de productos">
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
                            <th>ID Lista de precio</th>
                            <th>ID Producto</th>
                            <th>Precio de Venta</th>
                            <th>Opciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script src="../../dependencies/js/messageSetters.js"></script>
    <script src="../../dependencies/js/tablesSetters.js"></script> 
<?php
include '../../partials/bottom.php';
?>