<?php
$title = "Gestionar Ingreso Comunidad";
$direct = "../../";

include '../../partials/top.php';
include_once '../../datos/Dt_tbl_ingreso_comunidad.php';
include_once '../../entidades/tbl_ingreso_comunidad.php';

$dtIngresoComunidad = new Dt_tbl_ingreso_comunidad();
$ingresosComunidad = $dtIngresoComunidad->listarIngresoComunidad();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Datos de Ingresos Comunidad</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de Ingresos Comunidad</li>
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
                            <th>ID Ingreso</th>
                            <th>ID Kermesse</th>
                            <th>ID Comunidad</th>
                            <th>ID Producto</th>
                            <th>Cant Productos</th>
                            <th>Total bonos</th>
                            <th>Estado</th>
                            <th>Usuario creacion</th>
                            <th>Fecha Creacion</th>
                            <th>Usuario Modificacion</th> 
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($ingresosComunidad as $value):
                            echo "<tr>";
                            echo "<td>$value->id_ingreso_comunidad</td>";
                            echo "<td>$value->id_kermesse</td>";
                            echo "<td>$value->id_comunidad</td>";
                            echo "<td>$value->id_producto</td>";
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
                            echo "<td>$value->usuario_creacion</td>";
                            echo "<td>$value->fecha_creacion</td>";
                            echo "<td>$value->usuario_modificacion</td>";
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
                            <th>ID Ingreso</th>
                            <th>ID Kermesse</th>
                            <th>ID Comunidad</th>
                            <th>ID Producto</th>
                            <th>Cant Productos</th>
                            <th>Total bonos</th>
                            <th>Estado</th>
                            <th>Usuario creacion</th>
                            <th>Fecha Creacion</th>
                            <th>Usuario Modificacion</th> 
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