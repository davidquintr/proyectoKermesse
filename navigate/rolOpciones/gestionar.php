<?php
$title = "Gestionar rol-opciones";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_rol_opciones.php';
include_once '../../entidades/rol_opciones.php';

$dtRolOpciones = new Dt_rol_opciones();
$rolOpciones = $dtRolOpciones->listarRolOpciones();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Datos de Rol-Opciones</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de Rol-Opciones</li>
        </ol>
        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los datos de los rol-opción activos/inactivos.
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
                        foreach($rolOpciones as $value):
                            echo "<tr>";
                            echo "<td>$value->id_rol_opciones</td>";
                            echo "<td>$value->tbl_rol_id_rol</td>";
                            echo "<td>$value->tbl_opciones_id_opciones</td>";
                        ?>
                        <td>
                            <a href="#" target="_blank" title="Visualizar los datos de un rol-opción">
                                <i class="fa-solid fa-eye"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Modificar los datos de un rol-opción">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Dar de baja al rol-opción">
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
    <script src="../../dependencies/js/setters.js"></script>
<?php
include '../../partials/bottom.php';
?>