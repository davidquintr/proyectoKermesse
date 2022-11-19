<?php
$title = "Gestionar usuarios";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_arqueocaja_det.php';
include_once '../../entidades/tbl_arqueocaja_det.php';

$dtArqueoDet = new Dt_Tbl_arqueocaja_det();
$arqueoDet = $dtArqueoDet->listarArqueoCaja_det();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Arqueo Caja Det</h1>
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
                            <th>ID ArqueooCaja</th>
                            <th>idMoneda</th>
                            <th>idDenominaciones</th>
                            <th>Cantidad</th>
                            <th>SubTotal</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($arqueoDet as $value):
                            echo "<tr>";
                            echo "<td>$value->idArqueoCaja_Det</td>";
                            echo "<td>$value->idArqueoCaja</td>";
                            echo "<td>$value->idMoneda</td>";
                            echo "<td>$value->idDenominacion</td>";
                            echo "<td>$value->cantidad</td>";
                            echo "<td>$value->subtotal</td>";
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
                            <th>ID ArqueooCaja</th>
                            <th>idMoneda</th>
                            <th>idDenominaciones</th>
                            <th>Cantidad</th>
                            <th>SubTotal</th>
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