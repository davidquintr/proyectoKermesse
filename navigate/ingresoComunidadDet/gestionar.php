<?php
$title = "Ingreso comunidad det";
$direct = "../../";
error_reporting(0);
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_ingreso_comunidad_det.php';
include_once '../../entidades/tbl_ingreso_comunidad_det.php';

$dtIngresoComunidadDet = new Dt_tbl_ingreso_comunidad_det();
$ingresosComunidadDet = $dtIngresoComunidadDet->listarIngresoComunidadDet();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Datos de Ingresos comunidad det</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de Ingresos comunidad det</li>
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
                <table id="tbl_usuarios" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Ingreso comunidad</th>
                            <th>ID Bono</th>
                            <th>Denominacion</th>
                            <th>Cantidad</th>
                            <th>Subtotal bono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($ingresosComunidadDet as $value):
                            echo "<tr>";
                            echo "<td>$value->id_ingreso_comunidad_det</td>";
                            echo "<td>$value->id_ingrso_comunidad</td>";
                            echo "<td>$value->id_bono</td>";
                            echo "<td>$value->denominacion</td>";
                            echo "<td>$value->cantidad</td>";
                            echo "<td>$value->subtotal_bono</td>";
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
                            <th>ID Ingreso comunidad</th>
                            <th>ID Bono</th>
                            <th>Denominacion</th>
                            <th>Cantidad</th>
                            <th>Subtotal bono</th>
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