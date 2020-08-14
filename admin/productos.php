
  <!-- La nueva -->

  <?php
include_once "db_ecommerce.php";
$con = mysqli_connect($host, $user, $pass, $db);
if(isset($_REQUEST['idBorrar'])){
    $id= mysqli_real_escape_string($con,$_REQUEST['idBorrar']??'');
    $query="DELETE from productos  where id='".$id."';";
    $res=mysqli_query($con,$query);
    if($res){
        ?>
        <div class="alert alert-warning float-right" role="alert">
            Producto borrado con exito!!
        </div>
        <?php
    }else{
        ?>
        <div class="alert alert-danger float-right" role="alert">
            Error al borrar <?php echo mysqli_error($con); ?>
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
                      <h1>Productos</h1>
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
                          <table id="example2" class="table table-bordered table-hover">
                              <thead>
                                  <tr>
                                      <th>Nombre</th>
                                      <th>Precio</th>
                                      <th>Existencia</th>
                                      <th>Imagen(es)</th>
                                      <th>Acciones
                                          <a href="panel.php?modulo=crearProducto"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $query = "SELECT id,nombre,precio,existencia from productos;  ";
                                    $res = mysqli_query($con, $query);

                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                      <tr>
                                          <td><?php echo $row['nombre'] ?></td>
                                          <td><?php echo $row['precio'] ?></td>
                                          <td><?php echo $row['existencia'] ?></td>
                                          <td>2 Imagen(es)</td>
                                          <td>
                                              <a href="panel.php?modulo=editarProducto&id=<?php echo $row['id'] ?>" style="margin-right: 5px;"> <i class="fas fa-edit"></i> </a>
                                              <a href="panel.php?modulo=productos&idBorrar=<?php echo $row['id'] ?>" class="text-danger borrar"> <i class="fas fa-trash"></i> </a>
                                          </td>
                                      </tr>
                                  <?php
                                    }
                                    ?>
                              </tbody>
                          </table>
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