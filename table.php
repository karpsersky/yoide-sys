<?php
require 'conexion.php';
session_start();
if ($_SESSION['user'] == "smd"){
    if(isset($_POST['edit'])){
        $id = htmlentities($_POST['id']);
        $p = htmlentities($_POST['p']);
        $d = htmlentities($_POST['d']);
        $pp = htmlentities($_POST['pp']);
        $stock = htmlentities($_POST['stock']);

            $query="UPDATE productossmd SET producto = '$p', descripcion = '$d', precio = '$pp', stock = '$stock' WHERE id = '$id'";
            $executer=mysqli_query($con,$query);
            if($executer){
                echo "<script>alert('Producto editado correctamente');</script>";
            }else{
                echo "<script>alert('Algo ha salido mal');</script>";
            }
    }
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
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
    <p>Super MD</p>
    </div>
    <div class="sidebar-menu">
    <ul class="menu">
            
            
            <li class='sidebar-title'>Lista de acciones</li>
        
        
        
            

        
        
        
            <li class='sidebar-title'>Entradas &amp;</li>
        
        
        
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="file-text" width="20"></i> 
                    <span>Menu de Opciones</span>
                </a>
                
                <ul class="submenu ">
                    <li>
                        <a href="index.php">Main</a>
                    </li>
                    <li>
                        <a href="form-element-input.php">Agregar</a>
                    </li>
                    <li>
                        <a href="table.php">Productos</a>
                    </li>
                </ul>
            </li>
    </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
        <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i>
                                </div>
                            </a>
                            
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar mr-1">
                                    <img src="assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, Yoide</div>
                            </a>
                            
                        </li>
                    </ul>
                </div>
            </nav>
            
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Productos</h3>
                <p class="text-subtitle text-muted">Lista de productos disponibles para editar.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Main</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Productos</li>
                    </ol>
                </nav>
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
         $query="SELECT * FROM productossmd";
         $executer=mysqli_query($con,$query);
         ?>
        <div class="table-responsive">
          <table class="table mb-0">
            <thead class="thead-dark">
              <tr>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>PRECIO</th>
                <th>ACCION</th>
                <th>Stock</th>
                
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
                <td><a href='table.php?editar=<?php echo $row["id"];?>'>
                    <button class="btn btn-edit">Editar</button>
                </a></td>
                <td><?php if($row["stock"]>0){
                    echo "Disponible: ".$row['stock'];
                }
                else{
                    echo "Vacio:";
                }
                ?></td>
                <?php
                if(isset($_GET['editar'])){
                $ider=$_GET['editar'];
                $u="SELECT * FROM productossmd WHERE id='$ider'";
                $e=mysqli_query($con,$u);
                while($rower=mysqli_fetch_array($e)){
                ?>
                    <br>
                    <hr>
                    <h2>Editar: <?php echo $rower['producto'];?> </h2>
                    <br>
                    <div class="card-body">
                    <div class="row">
                        <form action="table.php" method="POST">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">Nombre del Producto</label>
                                    <input type="hidden" name="id" value="<?php echo $rower['id'];?>">
                                    <input type="text" name="p" value="<?php echo $rower['producto'];?>" class="form-control" id="basicInput" placeholder="Nombre">
                                </div>

                                

                                <div class="form-group">
                                    <label for="helperText">Descripci&oacute;n</label>
                                    <input type="text" name="d" value="<?php echo $rower['descripcion'];?>" id="helperText" class="form-control" placeholder="Descripci&oacute;n">
                                    <p><small class="text-muted">Agrega una descripci&oacute;n.</small></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="helpInputTop">Precio de Venta</label>
                                    <input type="number" name="pp" value="<?php echo $rower['precio'];?>" class="form-control" id="helpInputTop" placeholder="Precio de venta">
                            </div>
                            <div class="form-group">
                                    <label for="helpInputTop">Disponibilidad</label>
                                    <input type="number" name="stock" value="<?php echo $rower['stock'];?>" class="form-control" id="helpInputTop" placeholder="Cantidad">
                            </div>
                                <br>
                                <hr>
                                <button class="btn btn-primary" name="edit">Guardar Cambios</button>
                            </div>
                    </form>
                </div>
                <?php } ?>
            </div>
            <br>
            <hr>
            <br>
                    <?php
                }
                ?>
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
                        <p>Creado <span class='text-danger'><i data-feather="heart"></i></span> por <a href="index.php">Super Mente Digital</a></p>
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

<?php
}else{
    header("Location: auth-login.php");
}
?>