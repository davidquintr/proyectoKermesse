<?php
$title = "Gestionar Bonos";
$direct = "../../";

include '../../partials/top.php';
include_once '../../datos/Dt_tbl_control_bonos.php';
include_once '../../entidades/tbl_control_bonos.php';

$dtControlBonos = new Dt_tbl_control_bonos();
$bonos = $dtControlBonos->listarControlBonos();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Datos de Bonos</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de Bonos</li>
        </ol>
        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los bonos.
        </div>
        <div class="alert alert-secondary">
            <a href="agregar.php"><button type="button" class="btn btn-outline-primary"><i class="fas fa-user pr-4" aria-hidden="true"></i>Agregar control bonos</button></a>
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
                            <th>Nombre</th>
                            <th>Valor</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($bonos as $value):
                            echo "<tr>";
                            echo "<td>$value->id_bono</td>";
                            echo "<td>$value->nombre</td>";
                            echo "<td>$value->valor</td>";
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
                            <a href="ver.php?varEnter=<?php echo $value->id_bono;?>" target="_blank" title="Visualizar">
                                <i class="fa-solid fa-eye"></i>
                            </a>&nbsp;
                            <a href="editar.php?varEnter=<?php echo $value->id_bono;?>" target="_blank" title="Modificar">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>&nbsp;
                            <a onclick="deleteObject('<?php echo $value->id_bono;?>','delBonos');" target="_blank" title="Dar de baja">
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
                            <th>Nombre</th>
                            <th>Valor</th>
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