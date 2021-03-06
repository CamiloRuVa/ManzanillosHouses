<?php

    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }

    $nombre = $_SESSION['nombre'];
    
    include("conexion.php");

    $id = $_GET["id"];
    $id_super = $_GET["id"];

    $usuarios = "SELECT * FROM usuarios WHERE id = '$id'";
    $admin = "SELECT * FROM admins WHERE id = '$id_super'";

    $resultado2 = mysqli_query($mysqli, $admin);
    $resultado = mysqli_query($mysqli, $usuarios);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - Manzanillo Homes</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="https://manzanilloshouses.000webhostapp.com/">Manzanillo Homes</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <!--<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>-->
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="logout.php">Salir</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Configuracion</div>
                            <a class="nav-link" href="principal2.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link" href="publi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Publicaciones
                            </a>
                            <a class="nav-link" href="tables2.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tablas
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logueado como:</div>
                        Administrador
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="principal.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Tabla de usuarios
                            </div>
                            <div class="card-body">
                                <form class="table-responsive" action="prose_edic.php" method="post">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-center">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Fecha de nacimiento</th>
                                                <th>Correo</th>
                                                <th>Contraseña</th>
                                                <th>Operaciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($row = mysqli_fetch_assoc($resultado)) {?>
                                            <tr>                                                
                                                
                                                <td><input type="hidden" value="<?php echo $row["id"]; ?>" name="id"></td>
                                                <td><input type="text" value="<?php echo $row["nombre"]; ?>" name="nombre"></td>
                                                <td><input type="text" value="<?php echo $row["nacimiento"]; ?>" name="nacimiento"></td>
                                                <td><input type="text" value="<?php echo $row["correo"]; ?>" name="correo"></td>
                                                <td><?php echo $row["contra"]; ?></td>                                                
                                                <td><input type="submit" value="Actualizar"></td> 
                                                
                                            </tr>                                            
                                            
                                            <?php  } ?>
                                            
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Tabla de administradores
                            </div>
                            <div class="card-body">
                                <form class="table-responsive" action="prose_edic2.php" method="post">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-center">
                                            <tr>
                                                <th>ID</th>
                                                <th>Usuario</th>
                                                <th>Contraseña</th>
                                                <th>Nombre</th>
                                                <th>Operaciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($row = mysqli_fetch_assoc($resultado2)) {?>
                                            <tr>                                                
                                                
                                                <td><input type="hidden" value="<?php echo $row["id"]; ?>" name="id_super"></td>
                                                <td><input type="text" value="<?php echo $row["usuario"]; ?>" name="usuario"></td>
                                                <td><?php echo $row["pass"]; ?></td>
                                                <td><input type="text" value="<?php echo $row["nombre"]; ?>" name="nombre2"></td>                                                                                                
                                                <td><input type="submit" value="Actualizar"></td> 
                                                
                                            </tr>                                            
                                            
                                            <?php  } ?>
                                            
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>