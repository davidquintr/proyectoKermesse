<?php
$title = "Gestionar Opciones Rol";
$direct = "../../";
include '../../partials/top.php';
include_once ("{$direct}datos/Dt_rol_opciones.php");
include_once ("{$direct}entidades/rol_opciones.php");
include_once("{$direct}entidades/vw_rolopcion.php");

$dtRolOpciones = new Dt_rol_opciones();
$rolVwOpciones = $dtRolOpciones->listarRolOpView();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Rol-Opciones</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de Rol-Opciones</li>
        </ol>
        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los datos de los rol-opción activos/inactivos.
        </div>
        
        <div class="alert alert-secondary">
            <a href="agregar.php"><button type="button" class="btn btn-outline-primary"><i class="fas fa-user pr-4" aria-hidden="true"></i>Agregar un nuevo Rol Opcion</button></a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Rol-Opciones Activos
            </div>
            <div class="card-body">
                <table id="generic" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Rol</th>
                            <th>Opción</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($rolVwOpciones as $value):
                            echo "<tr>";
                            echo "<td>$value->id</td>";
                            echo "<td>$value->rol</td>";
                            echo "<td>$value->opcion</td>";
                        ?>
                        <td>
                            <a onclick="deleteObject('<?php echo $value->id;?>','2');" title="Dar de baja al rol-opción">
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
                            <th>Rol</th>
                            <th>Opción</th>
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