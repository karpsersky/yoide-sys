<?php
require 'conexion.php';
session_start();
if ($_SESSION['user'] == "smd"){
    if (isset($_POST['reg'])){
        $producto = htmlentities($_POST['p']);
        $descripcion = htmlentities($_POST['d']);
        $precio = htmlentities($_POST['pp']);

        $query = "INSERT into productossmd(producto,descripcion,precio,stock)VALUES('$producto','$descripcion','$precio','1')";
        $executer = mysqli_query($con,$query);

        if ($executer){
            echo "<script>alert('Operacion completada');</script>";
        }else{
            echo "<script>alert('No se pudo guardar el producto');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input - Super Mente Digital</title>
    
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
                <h3>Agregar</h3>
                <p class="text-subtitle text-muted">Rellena los campos y agrega productos disponibles o edita los existentes.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Main</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Agregar</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Datos de Productos</h4>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <form action="form-element-input.php" method="POST">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Nombre del Producto</label>
                            <input type="text" name="p" class="form-control" id="basicInput" placeholder="Nombre">
                        </div>

                        

                        <div class="form-group">
                            <label for="helperText">Descripci&oacute;n</label>
                            <input type="text" name="d" id="helperText" class="form-control" placeholder="Descripci&oacute;n">
                            <p><small class="text-muted">Agrega una descripci&oacute;n.</small></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                            <label for="helpInputTop">Precio de Venta</label>
                            <input type="number" name="pp" class="form-control" id="helpInputTop" placeholder="Precio de venta">
                        </div>
                        <br>
                        <hr>
                        <button class="btn btn-primary" name="reg">Registrar Producto</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Basic Inputs end -->
    
    
    
  
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