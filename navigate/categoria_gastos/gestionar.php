<?php
$title = "Gestionar categorias de gastos";
$direct = "../../";
error_reporting(0);
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_categoria_gastos.php';
include_once '../../entidades/tbl_categoria_gastos.php';

$dtCatGastos = new Dt_tbl_categoria_gastos();
$catGastos = $dtCatGastos->listarCatGastos();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Datos de categorias de gastos</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de categoria de gastos</li>
        </ol>
        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los datos de las categorias de gastos activos/inactivos.
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                categoria gastos Activos
            </div>
            <div class="card-body">
                <table id="tbl_categoria_gastos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Categoria</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($catGastos as $value):
                            echo "<tr>";
                            echo "<td>$value->id_categoria_gastos</td>";
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
                            <a href="#" target="_blank" title="Visualizar los datos de una categoria de gastos">
                                <i class="fa-solid fa-eye"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Modificar los datos de una categoria de gastos">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Dar de baja a la categoria de gastos">
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
                            <th>Nombre Categoria</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
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