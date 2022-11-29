<?php
$title = "Gestionar Tasa Cambio";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_tasacambio.php';
include_once '../../entidades/vw_tasacambio.php';

$dtTasaCambio = new Dt_tbl_Tasacambio();
$tasasCambio =  $dtTasaCambio->listarVwTasaCambio();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Tasas de Cambio</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de Tasa de Cambio</li>
        </ol>
        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los datos de las tasas de cambio activas.
        </div>

        <div class="alert alert-secondary">
            <a href="agregar.php"><button type="button" class="btn btn-outline-primary"><i class="fas fa-user pr-4" aria-hidden="true"></i>Agregar una nueva tasa de cambio</button></a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tasas de Cambio Activas
            </div>
            <div class="card-body">
                <table id="generic" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Moneda Origen</th>
                            <th>Moneda Destino</th>
                            <th>Tipo de cambio</th>
                            <th>Mes</th>
                            <th>Año</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($tasasCambio as $value):
                            echo "<tr>";
                            echo "<td>$value->id</td>";
                            echo "<td>$value->monedaO</td>";
                            echo "<td>$value->monedaC</td>";
                            echo "<td>$value->tipoCambio</td>";
                            echo "<td>$value->mes</td>";
                            echo "<td>$value->anio</td>";
                            echo "<td>$value->estado</td>";
                        ?>
                        <td>
                            <a href="ver.php?varEnter=<?php echo $value->id;?>" target="_blank" title="Visualizar">
                                <i class="fa-solid fa-eye"></i>
                            </a>&nbsp;
                            <a href="editar.php?varEnter=<?php echo $value->id;?>" target="_blank" title="Modificar">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>&nbsp;
                            <a onclick="deleteObject('<?php echo $value->id;?>','71');" target="_blank" title="Dar de baja">
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
                            <th>Moneda Origen</th>
                            <th>Moneda Destino</th>
                            <th>Tipo de cambio</th>
                            <th>Mes</th>
                            <th>Año</th>
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