<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DOCENTE</title>
    <meta name="description" content="Notas COTECNOVA">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Icono de la pagina-->
    <link rel="apple-touch-icon" href="images/icon2.png">
    <link rel="shortcut icon" href="images/icon2.png">
<!-- CSS de la pagina-->
    <link rel="stylesheet" href="bootstrap-4_1_3/css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/all.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav" id="opcionesizq" >
                    <li class="active">
                        <a href="login.html"><i class="menu-icon fa fa-laptop"></i>Menu principal</a>
                    </li>
                    <li class="menu-title">Opciones</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown" onclick="return OcultarAviso(this)">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="boton1"> 
                            <i class="menu-icon fa fa-graduation-cap"></i><p onclick="return change1(this);" id="est" style="display:block;">Estudiantes</p>
                        </a>
                        <ul class="sub-menu children dropdown-menu"> 
                            <li ><i class="fa fa-table fa-li" style="margin-top: 3px;"></i><p onclick="return change11(this);" style="font-size: 0.9em;">Crear</p></li>
                            <li ><i class="fa fa-table fa-li" style="margin-top: 3px;"></i><p onclick="return change12(this);" style="font-size: 0.9em;">Editar</p></li>
                            <li ><i class="fa fa-table fa-li" style="margin-top: 3px;"></i><p onclick="return change13(this);" style="font-size: 0.9em;">Eliminar</p></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown" onclick="return OcultarAviso(this)">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <i class="menu-icon fa fa-male"></i><p onclick="return change2(this);" id="doc" style="display:block;">Docentes</p>
                        </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table fa-li" style="margin-top: 3px;"></i><p onclick="return change21(this);" style="font-size: 0.9em;">Crear</p></li>
                            <li><i class="fa fa-table fa-li" style="margin-top: 3px;"></i><p onclick="return change22(this);" style="font-size: 0.9em;">Editar</p></li>
                            <li><i class="fa fa-table fa-li" style="margin-top: 3px;"></i><p onclick="return change23(this);" style="font-size: 0.9em;">Eliminar</p></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown" onclick="return OcultarAviso(this)">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <i class="menu-icon fa fa-id-card"></i><p onclick="return change3(this);" id="not" style="display:block;">Notas</p>
                        </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table fa-li" style="margin-top: 3px;"></i><p onclick="return change31(this);" style="font-size: 0.9em;">Crear</p></li>
                            <li><i class="fa fa-table fa-li" style="margin-top: 3px;"></i><p onclick="return change32(this);" style="font-size: 0.9em;">Editar</p></li>
                            <li><i class="fa fa-table fa-li" style="margin-top: 3px;"></i><p onclick="return change33(this);" style="font-size: 0.9em;">Eliminar</p></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand " href="docente.html"><img src="images/logo.png" alt="Logo" ></a>
                    <a id="menuToggle" class="menutoggle" onclick="return ocultarmenus(this);"><i class="fa fa-bars" ></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/icon2.png" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i>Docente</a>
                            <a class="nav-link" href="login.html"><i class="fa fa-power-off"></i>Cerrar Sesión</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Presentacion -->
        <?php
        require_once 'modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
        
        $mysql = new MySQL(); //se declara un nuevo array
        $mysql->conectar();
        $docentes = $mysql->efectuarConsulta("SELECT notas.docentes.nombres, notas.docentes.apellidos, notas.docentes.numero_de_identificacion FROM notas.docentes");
        $estudiantes = $mysql->efectuarConsulta("SELECT notas.estudiantes.nombres, notas.estudiantes.apellidos, notas.estudiantes.documento_de_identificacion, notas.programas.Programa_nombre FROM notas.estudiantes INNER JOIN notas.programas ON notas.programas.id_Programas=notas.estudiantes.Programas_id_Programas");
        $notas = $mysql->efectuarConsulta("SELECT notas.estudiantes.nombres AS nombreE, notas.estudiantes.apellidos AS apellidoE, notas.docentes.nombres AS nombreD, notas.docentes.apellidos AS apellidoD, notas.notas.nota1, notas.notas.nota2, notas.notas.nota3, notas.notas.nota_final, notas.notas.fecha_hora_actualizacion FROM notas.notas INNER JOIN notas.estudiantes ON notas.notas.estudiantes_id=notas.estudiantes.id INNER JOIN notas.docentes ON notas.notas.docentes_id=notas.docentes.id");
        $selectDocumento = $mysql->efectuarConsulta("SELECT notas.tipo_documento.id_tipo_documento, notas.tipo_documento.tipo_documento FROM notas.tipo_documento");
        $selectEstado = $mysql->efectuarConsulta("SELECT notas.estado_civil.id_estado_civil, notas.estado_civil.estado_civil FROM notas.estado_civil");
        $selectDepartamento = $mysql->efectuarConsulta("SELECT notas.departamentos.id_departamento_nacimiento, notas.departamentos.departamento_nacimiento FROM notas.departamentos");
        $selectCiudades = $mysql->efectuarConsulta("SELECT notas.ciudades.id_ciudad_nacimiento, notas.ciudades.ciudad_nacimiento FROM notas.ciudades");
        $mysql->desconectar();
        
        ?>
        <div class="content" id="Presentacion" style="display: block;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="box-title text-center">BIENVENIDO DOCENTE </h1>
                                </div>
                                <div class="card-body--">
                                    <h2 class="box-title text-center">Aqui podra gestionar su trabajo, seleccione una de las opciones a su izquierda y empiece <br></h2>
                                </div>
                                <br>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.Presentacion -->
        <!-- Content 1 Menu Estudiantes -->
        <div class="content" id="content1" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">ESTUDIANTES </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="name">Documento de identidad</th>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th>Programa </th>
                                                </tr>
                                            </thead>
                                            <?php
                                            while ($consulta= mysqli_fetch_assoc($estudiantes)){
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td><span class="name"><?php echo $consulta['documento_de_identificacion'] ?></span> </td>
                                                    <td><span class="name"><?php echo $consulta['nombres'] ?></span> </td>
                                                    <td><span class="name"><?php echo $consulta['apellidos'] ?></span></td>
                                                    <td><span class="name"><?php echo $consulta['Programa_nombre'] ?></span></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content 1 -->
        <!-- Content 11 Crear informacion Estudiante-->
        <div class="content" id="content11" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">CREAR ESTUDIANTE </h4>
                                </div>
                                <div class="card-body">
                                    <form action="controlador/inserts.php" method="POST">
                                        <div class="form-group">
                                        <label>Tipo de Documento</label>
                                        <select name="tipo_documento1" class="form-control" id="exampleFormControlSelect1">
                                            <option id="opcion" value="">Seleccione tipo de documento de identidad</option>
                                            <option name="TI1" value="tarjeta de identidad">Tarjeta de identidad</option>
                                            <option name="cedula1" value="cedula">Cedula</option>
                                            <option name="CE1" value="cedula extranjera">Cedula extranjera</option>
                                            <option name="nit1" value="nit">Nit</option>
                                            <option name="pasaporte1" value="pasaporte">Pasaporte</option>
                                            <option name="CD1" value="carnet diplomatico">Carnet Diplomatico</option> 
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Numero de documento</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" name="documento1" placeholder="Ingrese Numero de identidad">
                                        </div>
                                        <div class="form-group">
                                            <label>Nombres</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" name="nombre1" placeholder="Ingrese nombre o  nombres">
                                        </div>
                                        <div class="form-group">
                                            <label>Apellidos</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" name="apellido1" placeholder="Ingrese apellido o apellidos">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Estado Civil</label>
                                            <select name="estado_civil1" class="form-control" id="exampleFormControlSelect1">
                                                <option id="opcion" value="" >Seleccione el estado civil</option>
                                                <option name="soltero1" value="soltero">Soltero</option>
                                                <option name="casado1" value="casado">Casado</option>
                                                <option name="comprometido1" value="comprometido">Comprometido</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Departamento de nacimiento</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" name="departamento1" placeholder="Ingrese el departamento de nacimiento">
                                        </div>
                                        <div class="form-group">
                                            <label>Ciudad de nacimiento</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" name="ciudad1" placeholder="Ingrese la ciudad de nacimiento">
                                        </div>
                                        <div class="form-group">
                                            <label>Contraseña de estudiante</label>
                                            <input type="password" class="form-control" id="formGroupExampleInput2" name="contrasenna1" placeholder="Ingrese una contraseña para el estudiante">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="enviar1" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>                                    
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content11 -->
        <!-- Content 12 Editar informacion Estudiante-->
        <div class="content" id="content12" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">EDITAR ESTUDIANTE </h4>
                                </div>                                
                                <div class="card-body">
                                    <form class="form-inline md-form mr-auto mb-4" ><!-- action="#" method="POST" -->
                                        <input name="buscar12" class="form-control col-md-8" type="text" placeholder="Ingrese documento a buscar" aria-label="Search">
                                        <button  class="btn aqua-gradient btn-rounded btn-sm my-1" type="submit">Buscar</button>
                                    </form>                                    
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content 12 -->
        <!-- Content 13 Eliminar informacion Estudiante-->
        <div class="content" id="content13" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">ELIMINAR ESTUDIANTE </h4>
                                </div>
                                <div class="card-body">
                                    <form class="form-inline md-form mr-auto mb-4" ><!-- action="#" method="POST" -->
                                        <input name="buscar13" class="form-control col-md-8" type="text" placeholder="Ingrese documento a buscar" aria-label="Search">
                                        <button  class="btn aqua-gradient btn-rounded btn-sm my-1" type="submit">Buscar</button>
                                    </form> 
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content13 -->
        <!-- Content 2 Menu Docente-->
        <div class="content" id="content2" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">DOCENTES </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>Numero de documento</th>
                                                    <th>Nombres</th>
                                                    <th>apellidos</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            while ($consulta= mysqli_fetch_assoc($docentes)){
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td class="serial"><?php echo $consulta['numero_de_identificacion'] ?></td>
                                                    <td> <span class="name"><?php echo $consulta['nombres'] ?></span> </td>
                                                    <td><span class="name"><?php echo $consulta['apellidos'] ?></span></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content2 -->
        <!-- Content 21 Crear informacion Docente-->
        <div class="content" id="content21" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">CREAR DOCENTE </h4>
                                </div>
                                <div class="card-body">
                                    <form action="inserts.php" method="POST">
                                        <div class="form-group">
                                            <label>Tipo de Documento</label>
                                            <select name="tipo_documento2" class="form-control" id="exampleFormControlSelect1">
                                                <option id="opcion" value="">Seleccione tipo de documento de identidad</option>
                                                <option name="TI2" value="tarjeta de identidad">Tarjeta de identidad</option>
                                                <option name="cedula2" value="cedula">Cedula</option>
                                                <option name="CE2" value="cedula extranjera">Cedula extranjera</option>
                                                <option name="nit2" value="nit">Nit</option>
                                                <option name="pasaporte2" value="pasaporte">Pasaporte</option>
                                                <option name="CD2" value="carnet diplomatico">Carnet Diplomatico</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Numero de documento</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" name="documento2" placeholder="Ingrese Numero de identidad">
                                        </div>
                                        <div class="form-group">
                                            <label>Nombres</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" name="nombre2" placeholder="Ingrese nombre o  nombres">
                                        </div>
                                        <div class="form-group">
                                            <label>Apellidos</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" name="apellido2" placeholder="Ingrese apellido o apellidos">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Estado Civil</label>
                                            <select name="estado_civil2" class="form-control" id="exampleFormControlSelect1">
                                                <option id="opcion" value="" >Seleccione el estado civil</option>
                                                <option name="soltero2" value="soltero">Soltero</option>
                                                <option name="casado2" value="casado">Casado</option>
                                                <option name="comprometido2" value="comprometido">Comprometido</option>
                                            </select>
                                        </div>                                        
                                        <div class="form-group">
                                            <label>Contraseña de docente</label>
                                            <input type="password" class="form-control" id="formGroupExampleInput2" name="contrasenna2" placeholder="Ingrese una contraseña para el docente">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="enviar2" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form> 
                                </div>                                
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content 21-->
        <!-- Content 22 Editar informacion Docente-->
        <div class="content" id="content22" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">EDITAR DOCENTE </h4>
                                </div>
                                <div class="card-body">
                                    <form class="form-inline md-form mr-auto mb-4" ><!-- action="#" method="POST" -->
                                        <input name="buscar22" class="form-control col-md-8" type="text" placeholder="Ingrese documento a buscar" aria-label="Search">
                                        <button  class="btn aqua-gradient btn-rounded btn-sm my-1" type="submit">Buscar</button>
                                    </form> 
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content 22 -->
        <!-- Content 23 Eliminar informacion Docente-->
        <div class="content" id="content23" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">ELIMINAR DOCENTE </h4>
                                </div>
                                <div class="card-body">
                                    <form class="form-inline md-form mr-auto mb-4" ><!-- action="#" method="POST" -->
                                        <input name="buscar23" class="form-control col-md-8" type="text" placeholder="Ingrese documento a buscar" aria-label="Search">
                                        <button  class="btn aqua-gradient btn-rounded btn-sm my-1" type="submit">Buscar</button>
                                    </form> 
                                </div>                                
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content 23 -->
        <!-- Content 3 Menu Notas-->
        <div class="content" id="content3" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">NOTAS </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>Nombre de estudiante</th>
                                                    <th>Nombre del docente</th>
                                                    <th>Nota1</th>
                                                    <th>Nota2</th>
                                                    <th>Nota3</th>
                                                    <th>Nota final</th>
                                                    <th>Fecha y hora<br>(Ultima actualizacion)</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            while ($consulta= mysqli_fetch_assoc($notas)){
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td class="name"><?php echo $consulta['nombreE'] ?> <?php echo $consulta['apellidoE'] ?></td>
                                                    <td> <span class="name"><?php echo $consulta['nombreD'] ?> <?php echo $consulta['apellidoD'] ?></span> </td>
                                                    <td> <span class="name"><?php echo $consulta['nota1'] ?></span></td>
                                                    <td> <span class="name"><?php echo $consulta['nota2'] ?></span></td>
                                                    <td> <span class="name"><?php echo $consulta['nota3'] ?></span></td>
                                                    <td> <span class="name"><?php echo $consulta['nota_final'] ?></span></td>
                                                    <td><span class="name"><?php echo $consulta['fecha_hora_actualizacion'] ?></span></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content3 -->
        <!-- Content 31 Crear informacion Notas-->
        <div class="content" id="content31" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">CREAR NOTAS </h4>
                                </div>
                                <div class="card-body">
                                    <form action="#" method="POST">
                                        <div class="form-group">
                                            <label>Numero de documento de estudiante</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" name="documento11" placeholder="Ingrese Numero de documento">
                                        </div>
                                        <div class="form-group">
                                            <label>Numero de documento de docente</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" name="documento21" placeholder="Ingrese Numero de documento">
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha y hora de ultima actualzacion</label>
                                            <input type="datetime-local" class="form-control" id="formGroupExampleInput2" name="fechanota" >
                                        </div>  
                                        <div class="form-group">
                                            <label>Nota 1</label>
                                            <input class="form-control" type="number" id="example-number-input" name="nota1" placeholder="Ingrese la nota 1 del estudiante">
                                        </div>
                                        <div class="form-group">
                                            <label>Nota 2</label>
                                            <input class="form-control" type="number" id="example-number-input" name="nota2" placeholder="Ingrese la nota 2 del estudiante">
                                        </div>
                                        <div class="form-group">
                                            <label>Nota 3</label>
                                            <input class="form-control" type="number" id="example-number-input" name="nota3" placeholder="Ingrese la nota 3 del estudiante">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="enviar2" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>                                
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content31 -->
        <!-- Content 32 Editar informacion Notas-->
        <div class="content" id="content32" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">EDITAR NOTAS </h4>
                                </div>
                                <div class="card-body">
                                    <form class="form-inline md-form mr-auto mb-4" ><!-- action="#" method="POST" -->
                                        <input name="buscar32" class="form-control col-md-8" type="text" placeholder="Ingrese documento a buscar" aria-label="Search">
                                        <button  class="btn aqua-gradient btn-rounded btn-sm my-1" type="submit">Buscar</button>
                                    </form> 
                                </div>                                
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content32 -->
        <!-- Content 33 Eliminar informacion Notas-->
        <div class="content" id="content33" style="display:none;">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">ELIMINAR NOTAS </h4>
                                </div>
                                <div class="card-body">
                                    <form class="form-inline md-form mr-auto mb-4" ><!-- action="#" method="POST" -->
                                        <input name="buscar33" class="form-control col-md-8" type="text" placeholder="Ingrese documento a buscar" aria-label="Search">
                                        <button  class="btn aqua-gradient btn-rounded btn-sm my-1" type="submit">Buscar</button>
                                    </form> 
                                </div>                                
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content33 -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->
    
    <!--Local Scripts--> 
    <script src="bootstrap-4_1_3/js/jquery.min.js"></script>
    <script src="bootstrap-4_1_3/js/popper.min.js"></script>
    <script src="bootstrap-4_1_3/js/bootstrap.js"></script>
    <script src="bootstrap-4_1_3/js/jquery.matchHeight.min.js"></script> 
    <script src="fontawesome-free-5.11.2-web/js/all.js"></script>        
    <script src="js/selectores.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>

