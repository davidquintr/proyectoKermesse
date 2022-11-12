<?php
include 'partials/top.php';
?>
<html>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Gestionar Datos de Usuarios</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
                            <li class="breadcrumb-item active">Gestión de Usuarios</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                En esta pantalla se pueden visualizar y gestionar los datos de los usuarios activos/inactivos. 
                                Para crear un nuevo usuario por favor de clic en el botón: 
                                <a target="_blank" href="newUsuario.php"><i class="fa-solid fa-user-plus"></i> Nuevo Usuario</a>.
                            </div>
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
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
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
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <script src="js/setters.js"></script>
</html>
<?php
include 'partials/bottom.php';
?>