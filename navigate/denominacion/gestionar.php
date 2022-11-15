<?php
$title = "Gestionar usuarios";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_denominacion.php';
include_once '../../entidades/tbl_denominacion.php';

$dtDenominacion= new Dt_tbl_Denominacion();
$denominacion =  $dtDenominacion->listarDenominaciones();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Denominaciones</h1>
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
                <table id="tbl_usuarios" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>idMoneda</th>
                            <th>Valor</th>
                            <th>Valor Letras</th>
                            <th>SubTotal</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($denominacion as $value):
                            echo "<tr>";
                            echo "<td>$value->id_denominacion</td>";
                            echo "<td>$value->idMoneda</td>";
                            echo "<td>$value->valor</td>";
                            echo "<td>$value->valor_letras</td>";
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
                            <th>idMoneda</th>
                            <th>Valor</th>
                            <th>Valor Letras</th>
                            <th>SubTotal</th>
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