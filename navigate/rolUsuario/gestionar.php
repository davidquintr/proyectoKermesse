<?php
$title = "Gestionar rol-usuarios";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_rol_usuario.php';
include_once '../../entidades/rol_usuario.php';

$dtRolUsuario = new Dt_rol_usuario();
$rolUsuarios = $dtRolUsuario->listarRolUsuarios();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Datos de Rol-Usuarios</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de Rol-Usuarios</li>
        </ol>
        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los datos de los rol-usuarios activos/inactivos.
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Rol-Usuarios Activos
            </div>
            <div class="card-body">
                <table id="generic" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($rolUsuarios as $value):
                            echo "<tr>";
                            echo "<td>$value->id_rol_usuario</td>";
                            echo "<td>$value->tbl_usuario_id_usuario</td>";
                            echo "<td>$value->tbl_rol_id_rol</td>";
                        ?>
                        <td>
                            <a href="#" target="_blank" title="Visualizar los datos de un rol-usuario">
                                <i class="fa-solid fa-eye"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Modificar los datos de un rol-usuario">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Dar de baja al rol-usuario">
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
                            <th>Usuario</th>
                            <th>Rol</th>
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