<?php
$title = "Gestionar usuarios";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_tasacambio_det.php';
include_once '../../entidades/tasacambio_det.php';

$dtTasaCambio_Det = new Dt_Tasacambio_det();
$tasasCambio_Det =  $dtTasaCambio_Det->listarTasaCambio_det();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Tasas de Cambio Det</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de Usuarios</li>
        </ol>
        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los datos de los usuarios activos/inactivos.
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Usuarios Activos
            </div>
            <div class="card-body">
                <table id="generic" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>idTasaCambio</th>
                            <th>Fecha</th>
                            <th>Tipo de Cambio</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($tasasCambio_Det as $value):
                            echo "<tr>";
                            echo "<td>$value->id_tasaCambio_det</td>";
                            echo "<td>$value->id_tasaCambio</td>";
                            echo "<td>$value->fecha</td>";
                            echo "<td>$value->tipoCambio</td>";
                        ?>
                        <td>
                            <a href="#" target="_blank" title="Visualizar los datos de un usuario">
                                <i class="fa-solid fa-eye"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Modificar los datos de un usuario">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Dar de baja al usuario">
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
                            <th>idTasaCambio</th>
                            <th>Fecha</th>
                            <th>Tipo de Cambio</th>
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