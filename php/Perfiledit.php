<?php
	if(isset($_POST["submit"]))
	{
		$hostname_User_Information = "localhost";
$username_User_Information = "root";
$password_User_Information = "admin";
$User_Information = mysqli_connect($hostname_User_Information, $username_User_Information, $password_User_Information) or trigger_error(mysql_error(),E_USER_ERROR); 

		session_start();
		$Correo = $_POST["email"];
		$Contrasena = $_POST["password"];
    if ($Contrasena == $_POST["confirm"]){
    $ContraMD5 = md5($Contrasena);
    $Cookie_name = 'usuario';
		if (!mysqli_select_db($User_Information, "tienda")) {
    die("Uh oh, couldn't select database");
}

  $sql = "INSERT INTO customers VALUES ('$Correo', '$ContraMD5', 'Nombre', 'Direccion1', 'Direccion2', 'Ciudad', 'Estado','00000', 'Pais', 'No. Celular')";
  	
    if(mysqli_query($User_Information, $sql)){
		echo "Registro Exitoso";
    setcookie($Cookie_name, $Correo, (30));
		}
			else{
				echo "La dirección de correo que intentas usar ya está en uso, elige otra o inica sesión. ".mysqli_error($User_Information);
				}
		
  }
  else{
    echo "Las contraseñas no coinciden.";
  }
  }
  
 
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <!-- Website CSS style -->
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <!-- Website Font style -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
        <title>Editar Perfil</title>
    </head>

    <body>
        <div class="container">
            <div class="row main">
                <div class="panel-heading">
                    <div class="panel-title text-center">
                        <h1 class="title">Editar Perfil</h1>
                        <hr />
                    </div>
                </div>
                <div class="main-login main-center">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group">
                            <label for="nombre" class="cols-sm-2 control-label">Nombre</label>
                            <div class="cols-sm-10">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="nombre" class="form-control input" name="nombre" id="nombre" placeholder="Nombre" required/>
                                </div>
                            </div>
                            <label for="email" class="cols-sm-2 control-label">Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="email" class="form-control input" name="email" id="email" placeholder="Email" required/>
                                </div>
                            </div>
                            <label for="Direccion" class="cols-sm-2 control-label">Dirección linea 1</label>
                            <div class="cols-sm-10">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="Direccion" class="form-control input" name="Direccion" id="Direccion" placeholder="Dirección Línea 1" required/>
                                </div>
                            </div>
                            <label for="Direccion2" class="cols-sm-2 control-label">Dirección línea 2</label>
                            <div class="cols-sm-10">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="Direccion2" class="form-control input" name="Direccion2" id="Direccion2" placeholder="Dirección Línea 2" required/>
                                </div>
                            </div>
                            <label for="Ciudad" class="cols-sm-2 control-label">Ciudad</label>
                            <div class="cols-sm-10">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="Ciudad" class="form-control input" name="Ciudad" id="Ciudad" placeholder="Ciudad" required/>
                                </div>
                            </div>
                            <label for="Estado" class="cols-sm-2 control-label">Estado</label>
                            <div class="cols-sm-10">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="Estado" class="form-control input" name="Estado" id="Estado" placeholder="Estado" required/>
                                </div>
                            </div>
                            <label for="CodigoPostal" class="cols-sm-2 control-label">Codigo Postal</label>
                            <div class="cols-sm-10">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="CodigoPostal" class="form-control input" name="CodigoPostal" id="CodigoPostal" placeholder="Código Postal" required/>
                                </div>
                            </div>
                            <label for="Pais" class="cols-sm-2 control-label">País</label>
                            <div class="cols-sm-10">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="Pais" class="form-control input" name="Pais" id="Pais" placeholder="País" required/>
                                </div>
                            </div>
                            <label for="CelNum" class="cols-sm-2 control-label">CelNum</label>
                            <div class="cols-sm-10">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="CelNum" class="form-control input" name="CelNum" id="CelNum" placeholder="Número de celular" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="cols-sm-2 control-label">Contraseña</label>
                                <div class="cols-sm-10">
                                    <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-button">Cambiar mis datos</button>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    </body>

    </html>