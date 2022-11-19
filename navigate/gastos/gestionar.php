<?php
$title = "Gestionar gastos";
$direct = "../../";
error_reporting(0);
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_gastos.php';
include_once '../../entidades/tbl_gastos.php';

$dtGastos = new Dt_tbl_gastos();
$gastos = $dtGastos->listarGastos();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Datos de los gastos</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de gastos</li>
        </ol>
        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los datos de los gastos.
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                gastos Activos
            </div>
            <div class="card-body">
                <table id="generic" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kermesse</th>
                            <th>Categoria gastos</th>
                            <th>fecha de gasto</th>
                            <th>Concepto</th>
                            <th>Monto</th>
                            <th>usuario_creacion</th>
                            <th>Fecha de creacion</th>
                            <th>usuario_modificacion</th>
                            <th>Fecha de modificacion</th>
                            <th>usuario_eliminacion</th>
                            <th>Fecha de eliminacion</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($gastos as $value):
                            echo "<tr>";
                            echo "<td>$value->id_registro_gastos</td>";
                            echo "<td>$value->idKemesse</td>";
                            echo "<td>$value->idCatGasto</td>";
                            echo "<td>$value->fechaGasto</td>";
                            echo "<td>$value->concepto</td>";
                            echo "<td>$value->monto</td>";
                            echo "<td>$value->usuario_creacion</td>";
                            echo "<td>$value->fecha_creacion</td>";
                            echo "<td>$value->usuario_modificacion</td>";
                            echo "<td>$value->fecha_modificacion</td>";
                            echo "<td>$value->usuario_eliminacion</td>";
                            echo "<td>$value->fecha_eliminacion</td>";
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
                            <a href="#" target="_blank" title="Visualizar los datos de los gastos">
                                <i class="fa-solid fa-eye"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Modificar los datos de los gastos">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Dar de baja de gastos">
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
                            <th>Categoria gastos</th>
                            <th>fecha de gasto</th>
                            <th>Concepto</th>
                            <th>Monto</th>
                            <th>usuario_creacion</th>
                            <th>Fecha de creacion</th>
                            <th>usuario_modificacion</th>
                            <th>Fecha de modificacion</th>
                            <th>usuario_eliminacion</th>
                            <th>Fecha de eliminacion</th>
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
<?php
include 'partials/bottom.php';
?>