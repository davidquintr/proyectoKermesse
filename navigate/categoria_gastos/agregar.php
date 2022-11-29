<?php
$title = "Agregar Categoria Gastos";
$direct = "../../";
include '../../partials/top.php';

?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Agregar Categoria de Gastos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Categorias</li>
        <li class="breadcrumb-item active">Agregar Categoria de Gastos</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_categoriaGastos.php">
                                <input type="hidden" value="1" name="txtaccion" id="txtaccion"/>
                            

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="categorianame" name="categorianame" type="text" title="Nombre de la categoria" required/>
                                    <label for="username">Nombre de la categoria</label>
                                </div>

                                <div class="form-floating mb-3">
                                    
                                    <input class="form-control" id="descripcion" name="descripcion" type="text" title="descripcion" required/>
                                    <label for="username">descripcion</label>
                                </div>

                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block">Agregar categoria</button>
                                    <button type="reset" class="btn btn-danger btn-block my-2">Descartar categoria</button> 
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