<?php
require 'conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table - SMD</title>
    
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>
<body>
    
            
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Productos</h3>
                <p class="text-subtitle text-muted">Lista de productos disponibles.</p>
            </div>
        </div>

    </div>
          
<!-- Table head options start -->
<div class="row" id="table-head">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Encabezado</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
          <p>Los productos son cargados desde la base de datos <code
              class="highlighter-rouge">recomendado</code> y <code class="highlighter-rouge">eficiente</code> </p>
        </div>
        <!-- table head dark -->
         <?php
         $cuantity=0;
         $query="SELECT * FROM productossmd WHERE stock!='$cuantity'";
         $executer=mysqli_query($con,$query);
         ?>
        <div class="table-responsive">
          <table class="table mb-0">
            <thead class="thead-dark">
              <tr>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>PRECIO</th>
                
              </tr>
            </thead>
            <tbody>
                <?php
                while($row=mysqli_fetch_array($executer)){
                ?>
              <tr>
                <td class="text-bold-500"><?php echo $row['producto'];?></td>
                <td><?php echo $row['descripcion'];?></td>
                <td class="text-bold-500">$<?php echo $row['precio'];?></td>
            </div>
            <br>
            <hr>
            <br>
                    
              </tr>
              <?php

                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Table head options end -->

<!-- Responsive tables end -->
</div>

<footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-left">
                        <p>2024 &copy; SMD</p>
                    </div>
                    <div class="float-right">
                        <p>Creado <span class='text-danger'><i data-feather="heart"></i></span> por <a href="">Super Mente Digital</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script src="assets/js/main.js"></script>
</body>
</html>
