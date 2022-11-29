<?php
$title = "Agregar Categoria Productos";
$direct = "../../";
include '../../partials/top.php';
include_once("{$direct}entidades/tbl_categoria_producto.php");



?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Agregar Categorias</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestionar categorias de producto</li>
        <li class="breadcrumb-item active">Agregar Categorias</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_categoria_producto.php">
                                <input type="hidden" value="1" name="txtaccion" id="txtaccion"/>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="nombre" name="nombre" type="text" title="Nombre Categoria" placeholder="Ingrese el nombre de la categoria" required/>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="descripcion" name="descripcion" type="text" title="Descripcion" placeholder="Ingrese una descripcion para la categoria" required/>
</div>
                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block">Agregar Categoria</button>
                                    <button type="reset" class="btn btn-danger btn-block my-2">Descartar Categoria</button> 
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