<?php
$title = "Agregar Kermesse";
$direct = "../../";
include '../../partials/top.php';

include_once("{$direct}entidades/tbl_parroquia.php");
include_once("{$direct}datos/DT_tbl_parroquia.php");

$dtParroquia = new DT_tbl_parroquia();
?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Agregar Kermesse</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Kermesse</li>
        <li class="breadcrumb-item active">Agregar Kermesse</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_kermesse.php">
                                <input type="hidden" value="1" name="txtaccion" id="txtaccion"/>
                            

                                <div class="form-floating mb-3">
                                    <select class="form-control" id="parroquia" name="parroquia" title="Seleccione una parroquia" required>
                                        <option value="">Seleccione una parroquia</option>
                                        <?php
                                            foreach($dtParroquia->listarParroquia() as $parr):
                                        ?>
                                            <option value="<?php echo $parr->__GET('idParroquia');?>"><?php echo $parr->nombre?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="kermessename" name="kermessename" type="text" title="Nombre de la kermesse" required/>
                                    <label for="username">Nombre de la kermesse</label>
                                </div>

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="fInicio" name="fInicio" type="date" title="fInicio" required/>
                                    <label for="username">Fecha de inicio</label>
                                </div>

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="fFinal" name="fFinal" type="date" title="fFinal" required/>
                                    <label for="username">Fecha de cierre</label>
                                </div>

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="descripcion" name="descripcion" type="text" title="descripcion" required/>
                                    <label for="username">Ponga una descripcion</label>
                                </div>

                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block">Agregar Kermesse</button>
                                    <button type="reset" class="btn btn-danger btn-block my-2">Descartar Kermesse</button> 
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