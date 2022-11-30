<?php
$title = "Gestionar Opciones";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_opciones.php';
include_once '../../entidades/tbl_opciones.php';

$dtOpciones = new Dt_tbl_opciones();
$opciones = $dtOpciones->listarOpciones();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Opciones</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de Opciones</li>
        </ol>
        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los datos de las opciones activas.
        </div>
        <div class="alert alert-secondary">
            <a href="agregar.php"><button type="button" class="btn btn-outline-primary"><i class="fas fa-user pr-4" aria-hidden="true"></i>Crear una nueva opción</button></a>
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
                            <a href="ver.php?varEnter=<?php echo $value->id_opciones?>" title="Visualizar">
                                <i class="fa-solid fa-eye"></i>
                            </a>&nbsp;
                            <a href="editar.php?varEnter=<?php echo $value->id_opciones?>" title="Modificar">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>&nbsp;
                            <a onclick="deleteObject('<?php echo $value->id_opciones;?>','opc');" title="Dar de baja">
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
    <script src="<?php echo $direct?>dependencies/js/messageSetters.js"></script>
    <script src="<?php echo $direct?>dependencies/js/tablesSetters.js"></script> 
    <script src="<?php echo $direct?>dependencies/js/deleteScripts.js"></script> 
<?php
include '../../partials/bottom.php';
?>