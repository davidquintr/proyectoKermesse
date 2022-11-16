<?php
$title = "Listar Precio";
$direct = "../../";

include '../../partials/top.php';
include_once '../../datos/Dt_tbl_lista_precio.php';
include_once '../../entidades/tbl_lista_precio.php';

$dtListPrecio = new Dt_tbl_lista_precio();
$ListPrecio = $dtListPrecio->listarPrecio();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Datos de Lista de precios</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de Lista de precios</li>
        </ol>
        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los datos de los precios activos/inactivos.
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
                            <th>ID Kermesse</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Estado</th> 
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($ListPrecio as $value):
                            echo "<tr>";
                            echo "<td>$value->id_lista_precio</td>";
                            echo "<td>$value->id_kermesse</td>";
                            echo "<td>$value->nombre</td>";
                            echo "<td>$value->descripcion</td>";
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
                            <a href="#" target="_blank" title="Visualizar los datos de una lista de productos">
                                <i class="fa-solid fa-eye"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Modificar los datos de una lista de productos">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Dar de baja a una lista de productos">
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
                            <th>ID Kermesse</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
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
include '../../partials/bottom.php';
?>