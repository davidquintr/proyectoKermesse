<?php
$title = "Gestionar usuarios";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_arqueocaja.php';
include_once '../../entidades/tbl_arqueocaja.php';


$dtArqueocaja = new Dt_tbl_Arqueocaja;
$arqueocaja = $dtArqueocaja->listarArqueoCaja();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Arqueo Caja</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de Arqueo Caja</li>
        </ol>
        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los arqueo caja.
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
                            <th>idKermesse</th>
                            <th>Fecha Arqueo</th>
                            <th>Gran total</th>
                            <th>Usuario creación</th>
                            <th>Fecha de creación</th>
                            <th>Usuario modificación</th>
                            <th>Fecha de moodificación</th>
                            <th>Usuario eliminación</th>
                            <th>Fecha de eliminación</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($arqueocaja as $value):
                            echo "<tr>";
                            echo "<td>$value->id_ArqueoCaja</td>";
                            echo "<td>$value->idKermesse</td>";
                            echo "<td>$value->fechaArqueo</td>";
                            echo "<td>$value->granTotal</td>";
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
                            <th>idKermesse</th>
                            <th>Fecha Arqueo</th>
                            <th>Gran total</th>
                            <th>Usuario creación</th>
                            <th>Fecha de creación</th>
                            <th>Usuario modificación</th>
                            <th>Fecha de moodificación</th>
                            <th>Usuario eliminación</th>
                            <th>Fecha de eliminación</th>
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
include '../../partials/bottom.php';
?>