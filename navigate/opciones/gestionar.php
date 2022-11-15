<?php
$title = "Gestionar opciones";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_opciones.php';
include_once '../../entidades/tbl_opciones.php';

$dtOpciones = new Dt_tbl_opciones();
$opciones = $dtOpciones->listarOpciones();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Datos de Opciones</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de Opciones</li>
        </ol>
        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los datos de las opciones activas/inactivas.
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Opciones Activas
            </div>
            <div class="card-body">
                <table id="generic" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($opciones as $value):
                            echo "<tr>";
                            echo "<td>$value->id_opciones</td>";
                            echo "<td>$value->opcion_descripcion</td>";
                            switch($value->estado){
                                case 1:
                                    echo "<td>Activa</td>";
                                break;
                                case 2:
                                    echo "<td>Modificada</td>";
                                break;
                                case 3:
                                    echo "<td>Inactivo/Eliminada</td>";
                                break;
                            }
                        ?>
                        <td>
                            <a href="#" target="_blank" title="Visualizar los datos de una opción">
                                <i class="fa-solid fa-eye"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Modificar los datos de una opción">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Dar de baja a la opción">
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
                            <th>Descripción</th>
                            <th>Estado</th>
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