<?php
if (isset($_REQUEST['guardar'])) {
    include_once "db_ecommerce.php";
    $con = mysqli_connect($host, $user, $pass, $db);

    $precio = mysqli_real_escape_string($con, $_REQUEST['precio'] ?? '');
    $existencia = mysqli_real_escape_string($con, $_REQUEST['existencia'] ?? '');
    $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');

    $query = "INSERT INTO productos 
        (precio       ,existencia       ,nombre) VALUES
        ('" . $precio . "','" . $existencia . "','" . $nombre . "');
        ";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=productos&mensaje=Producto creado exitosamente" />  ';
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Error al crear producto <?php echo mysqli_error($con); ?>
        </div>
<?php
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear producto</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="panel.php?modulo=crearProducto" method="post">
                            <div class="form-group">
                                <label>Precio</label>
                                <input type="number" name="precio" class="form-control"  required="required" >
                            </div>
                           
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control"  required="required" >
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>