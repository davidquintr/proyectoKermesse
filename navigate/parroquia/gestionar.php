<?php
$title = "Gestionar parroquia";
$direct = "../../";
error_reporting(0);
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_parroquia.php';
include_once '../../entidades/tbl_parroquia.php';

$dtParroquia = new Dt_tbl_parroquia();
$parroquia = $dtParroquia->listarParroquia();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Datos de parroquia</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de Parroquias</li>
        </ol>
        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los datos de las parroquias.
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Parroquias
            </div>
            <div class="card-body">
                <table id="tbl_usuarios" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Parroco</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>sitio_web</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($parroquia as $value):
                            echo "<tr>";
                            echo "<td>$value->idParroquia</td>";
                            echo "<td>$value->nombre</td>";
                            echo "<td>$value->direccion</td>";
                            echo "<td>$value->telefono</td>";
                            echo "<td>$value->parroco</td>";
                            echo "<td>$value->sitio_web</td>";

                        ?>
                        <td>
                            <a href="#" target="_blank" title="Visualizar los datos de parroquia">
                                <i class="fa-solid fa-eye"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Modificar los datos de parroquia">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>&nbsp;
                            <a href="#" target="_blank" title="Dar de baja a la parroquia">
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
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Parroco</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>sitio_web</th>
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