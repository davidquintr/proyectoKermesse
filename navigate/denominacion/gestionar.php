<?php
$title = "Gestionar usuarios";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_denominacion.php';
include_once '../../entidades/tbl_denominacion.php';

$dtDenominacion= new Dt_tbl_Denominacion();
$denominacion =  $dtDenominacion->listarVwDenominaciones();

?>
<div class="container-fluid px-4">
        <h1 class="mt-4">Gestionar Denominaciones</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Index</a></li>
            <li class="breadcrumb-item active">Gestión de Denominaciones</li>
        </ol>
        <div class="alert alert-primary text-center">
            En esta pantalla se pueden visualizar y gestionar los datos de los usuarios activos.
        </div>

        <div class="alert alert-secondary">
            <a href="agregar.php"><button type="button" class="btn btn-outline-primary"><i class="fas fa-user pr-4" aria-hidden="true"></i>Agregar una nueva moneda</button></a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Denominaciones Activas
            </div>
            <div class="card-body">
                <table id="generic" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Moneda</th>
                            <th>Valor</th>
                            <th>Valor Letras</th>
                            <th>SubTotal</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($denominacion as $value):
                            echo "<tr>";
                            echo "<td>$value->id_denominacion</td>";
                            echo "<td>$value->moneda</td>";
                            echo "<td>$value->valor</td>";
                            echo "<td>$value->valor_letras</td>";
                            echo "<td>$value->estado</td>";
                        ?>
                        <td>
                            <a href="ver.php?varEnter=<?php echo $value->id_moneda;?>" target="_blank" title="Visualizar">
                                <i class="fa-solid fa-eye"></i>
                            </a>&nbsp;
                            <a href="editar.php?varEnter=<?php echo $value->id_moneda;?>" target="_blank" title="Modificar">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>&nbsp;
                            <a onclick="deleteObject('<?php echo $value->id_moneda;?>','3');" target="_blank" title="Dar de baja">
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
                            <th>Moneda</th>
                            <th>Valor</th>
                            <th>Valor Letras</th>
                            <th>SubTotal</th>
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