<?php
$title = "Editar Categoria Gastos";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_categoria_gastos.php';
include_once '../../entidades/tbl_categoria_gastos.php';

$varIdU = 0;
if(isset($varIdU)){ 
  $varIdU = $_GET['varEnter'];
}

$dtCatGastos = new Dt_tbl_categoria_gastos();
$catGastos = $dtCatGastos->getCatGastosByID($varIdU);

?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Editar gastos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de categorias</li>
        <li class="breadcrumb-item active">Editar Categoria de Gasto</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_categoriaGastos.php">
                                <input type="hidden" value="2" name="txtaccion" id="txtaccion"/>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="catID" name="catID" type="text" title="ID" value="<?php echo $catGastos->id_categoria_gastos;?>" disabled/>
                                    <input class="form-control" id="idCG" name="idCG" type="hidden" title="ID" value="<?php echo $catGastos->id_categoria_gastos;?>"/>
                                    <label for="catID">ID</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="categorianame" name="categorianame" type="text" title="Nombre de la categoria" value="<?php echo $catGastos->nombre_categoria?>" required/>
                                    <label for="username">Nombre de la categoria</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="descripcion" name="descripcion" type="text" title="Descripcion de la categoria" value="<?php echo $catGastos->descripcion?>" required/>
                                    <label for="username">descripcion de la categoria</label>
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