<?php
$title = "Editar Opcion";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_opciones.php';
include_once '../../entidades/tbl_opciones.php';

$varIdU = 0;
if(isset($varIdU)){ 
  $varIdU = $_GET['varEnter'];
}

$dtOpc = new Dt_tbl_opciones();
$opc = $dtOpc->getOpcByID($varIdU);


?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Editar Opción</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Opciones</li>
        <li class="breadcrumb-item active">Editar Opción</li>
    </ol>
    <div id="layoutAuthentication_content">
    <div class="alert alert-primary text-center">
            Tienes que agregar la opción con palabras iniciando en mayúscula y sin espacio entre ellas: 'AgregarGasto'
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_opciones.php">
                                <input type="hidden" value="2" name="txtaccion" id="txtaccion"/>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="opc" name="opc" type="text" title="ID de Opción" value="<?php echo $opc->id_opciones;?>" disabled/>
                                    <input class="form-control" id="idOpc" name="idOpc" type="hidden" title="ID de Opción" value="<?php echo $opc->id_opciones;?>"/>
                                    <label for="userID">ID</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="opcname" name="opcname" type="text" title="Nombre de la opción" value="<?php echo $opc->opcion_descripcion;?>" required/>
                                    <label for="opcname">Nombre de la opción</label>
                                </div>
                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block">Finalizar edición</button>
                                    <button type="reset" class="btn btn-danger btn-block my-2">Descartar edición</button> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../../partials/bottom.php';
?>