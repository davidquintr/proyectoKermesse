<?php
$title = "Gestionar Arqueo Caja";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_arqueocaja.php';
include_once '../../entidades/vw_arqueocaja.php';


$dtArqueocaja = new Dt_tbl_Arqueocaja;
$arqueocaja = $dtArqueocaja->listarVwArqueoCaja();

?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Gestionar Arqueo Caja</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item active">Gestión de Arqueo Caja</li>
    </ol>
    <div class="alert alert-primary text-center">
        En esta pantalla se pueden visualizar y gestionar los arqueo caja.
    </div>
    <div class="alert alert-secondary">
        <a href="agregar.php"><button type="button" class="btn btn-outline-primary"><i class="fas fa-user pr-4" aria-hidden="true"></i>Crear un nuevo Arqueo</button></a>
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
                        <th>Kermesse</th>
                        <th>Moneda</th>
                        <th>Denominación</th>
                        <th>Cantidad</th>
                        <th>Fecha de Arqueo</th>
                        <th>Sub-Total</th>
                        <th>Gran Total</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($arqueocaja as $value):
                            echo "<tr>";
                            echo "<td>$value->id</td>";
                            echo "<td>$value->kermesse</td>";
                            echo "<td>$value->moneda</td>";
                            echo "<td>$value->denominacion</td>";
                            echo "<td>$value->cantidad</td>";
                            echo "<td>$value->fechaArqueo</td>";
                            echo "<td>$value->subtotal</td>";
                            echo "<td>$value->granTotal</td>";
                            echo "<td>$value->estado</td>";
                        ?>
                    <td>
                        <a href="ver.php?varEnter=<?php echo $value->id?>" title="Visualizar los datos de un usuario">
                            <i class="fa-solid fa-eye"></i>
                        </a>&nbsp;
                        <a href="editar.php?varEnter=<?php echo $value->id?>" target="_blank" title="Modificar">
                            <i class="fa-solid fa-user-pen"></i>
                        </a>&nbsp;
                        <a href="" target="_blank" title="Dar de baja">
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
                        <th>Kermesse</th>
                        <th>Moneda</th>
                        <th>Denominación</th>
                        <th>Cantidad</th>
                        <th>Fecha de Arqueo</th>
                        <th>Sub-Total</th>
                        <th>Gran Total</th>
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
<?php
include '../../partials/bottom.php';
?>