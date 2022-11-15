<?php
$title = "Gestionar kermesse";
$direct = "../../";
error_reporting(0);
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_kermesse.php';
include_once '../../entidades/tbl_kermesse.php';

$dtKermesse = new Dt_tbl_kermesse();
$kermesse = $dtKermesse->listarKermesse();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Datos de kermesse</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de Kermesse</li>
        </ol>
        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los datos de la kermesse.
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Kermesse Activa
            </div>
            <div class="card-body">
                <table id="tbl_kermesse" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Parroquia</th>
                            <th>Nombre</th>
                            <th>fInicio</th>
                            <th>fFinal</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>usuario_creacion</th>
                            <th>Fecha de creacion</th>
                            <th>usuario_modificacion</th>
                            <th>Fecha de modificacion</th>
                            <th>usuario_eliminacion</th>
                            <th>Fecha de eliminacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($kermesse as $value):
                            echo "<tr>";
                            echo "<td>$value->id_kermesse</td>";
                            echo "<td>$value->idParroquia</td>";
                            echo "<td>$value->nombre</td>";
                            echo "<td>$value->fInicio</td>";
                            echo "<td>$value->fFinal</td>";
                            echo "<td>$value->descripcion</td>";
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
                            <a href="#" target="_blank" title="Visualizar los datos de la kermesse">
                                <i class="fa-solid fa-eye"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Modificar los datos de la kermesse">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Dar de baja la kermesse">
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
                            <th>Parroquia</th>
                            <th>Nombre</th>
                            <th>fInicio</th>
                            <th>fFinal</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>usuario_creacion</th>
                            <th>Fecha de creacion</th>
                            <th>usuario_modificacion</th>
                            <th>Fecha de modificacion</th>
                            <th>usuario_eliminacion</th>
                            <th>Fecha de eliminacion</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script src="../../dependencies/js/setters.js"></script>
<?php
include 'partials/bottom.php';
?>