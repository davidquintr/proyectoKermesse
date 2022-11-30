<?php
$title = "Gestionar Ingreso Comunidad";
$direct = "../../";

include '../../partials/top.php';
include_once '../../datos/Dt_tbl_ingreso_comunidad.php';
include_once '../../entidades/vw_ingresocomunidad.php';

$dtIngresoComunidad = new Dt_tbl_ingreso_comunidad();
$ingresosComunidad = $dtIngresoComunidad->listarVwIngresoComunidad();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Datos de Ingresos Comunidad</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de Ingresos Comunidad</li>
        </ol>

        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los datos los ingresos de la comunidad.
        </div>
        <div class="alert alert-secondary">
            <a href="agregar.php"><button type="button" class="btn btn-outline-primary"><i class="fas fa-user pr-4" aria-hidden="true"></i>Agregar ingreso comunidad</button></a>
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
                            <th>Kermesse</th>
                            <th>Comunidad</th>
                            <th>Producto</th>
                            <th>Bono</th>
                            <th>Denominacion</th>
                            <th>Cantidad</th>
                            <th>Sub-Total Bono</th>
                            <th>Cant productos</th>
                            <th>Total bonos</th> 
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($ingresosComunidad as $value):
                            echo "<tr>";
                            echo "<td>$value->id</td>";
                            echo "<td>$value->kermesse</td>";
                            echo "<td>$value->comunidad</td>";
                            echo "<td>$value->producto</td>";
                            echo "<td>$value->bono</td>";
                            echo "<td>$value->denominacion</td>";
                            echo "<td>$value->cantidad</td>";
                            echo "<td>$value->subtotal_bono</td>";
                            echo "<td>$value->cant_productos</td>";
                            echo "<td>$value->total_bonos</td>";
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
                            <a href="ver.php?varEnter=<?php echo $value->id;?>" target="_blank" title="Visualizar">
                                <i class="fa-solid fa-eye"></i>
                            </a>&nbsp;
                            <a href="editar.php?varEnter=<?php echo $value->id;?>" target="_blank" title="Modificar">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>&nbsp;
                            <a onclick="deleteObject('<?php echo $value->id;?>','delIngCom');" target="_blank" title="Dar de baja">
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
                            <th>Comunidad</th>
                            <th>Producto</th>
                            <th>Bono</th>
                            <th>Denominacion</th>
                            <th>Cantidad</th>
                            <th>Sub-Total Bono</th>
                            <th>Cant productos</th>
                            <th>Total bonos</th> 
                            <th>Estado</th>
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