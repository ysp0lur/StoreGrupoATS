<?php
include_once "db_ecommerce.php";
$con = mysqli_connect($host, $user, $pass, $db);
if (isset($_REQUEST['guardar'])) {

    $precio = mysqli_real_escape_string($con, $_REQUEST['precio'] ?? '');
    $existencia = mysqli_real_escape_string($con, $_REQUEST['existencia'] ?? '');
    $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
    $id = mysqli_real_escape_string($con, $_REQUEST['id'] ?? '');

    $query = "UPDATE productos SET
        precio='" . $precio . "',existencia='" . $existencia . "',nombre='" . $nombre . "'
        where id='".$id."';
        ";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=productos&mensaje=Producto '.$nombre.' editado exitosamente" />  ';
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Error al crear Producto <?php echo mysqli_error($con); ?>
        </div>
<?php
    }
}
$id= mysqli_real_escape_string($con,$_REQUEST['id']??'');
$query="SELECT id,precio,existencia,nombre from productos where id='".$id."'; ";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear Producto</h1>
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
                        <form action="panel.php?modulo=editarProducto" method="post">
                            <div class="form-group">
                                <label>Precio</label>
                                <input type="number" name="precio" class="form-control" value="<?php echo $row['precio'] ?>" required="required" >
                            </div>
                            <div class="form-group">
                                <label>Existencia</label>
                                <input type="number" name="existencia" class="form-control"  required="required" >
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre'] ?>"  required="required" >
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>" >
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