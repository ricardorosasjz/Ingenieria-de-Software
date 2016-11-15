<?php

	include ("db.php");	

	$msg = "";
	if(isset($_POST["submit"]))
	{
		$name = $_POST["name"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$msg = "prueba";
		$name = mysqli_real_escape_string($db, $name);
		$email = mysqli_real_escape_string($db, $email);
		$password = mysqli_real_escape_string($db, $password);
		$password = md5($password);
		
		
		$sql="SELECT Correo FROM CLIENTE WHERE Correo='$email'";
		$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if(mysqli_num_rows($result) == 1)
		{
			$msg = "Esta dirección de correo no es válida";
		}
		else
		{
			$query = mysqli_query($db, "INSERT INTO CLIENTE (Id, Contraseña, Nombre,
			 Correo, Telefono, Direccion, Ciudad, Estado, CodPostal)VALUES (151697,'$password', '$name', '$email','2131','aaa','bbb','ccc',74311)");
			if($query)
			{
				$msg = "Gracias! Te has registrado con éxito";
				mysqli_commit($db);//para hacerle update a la base de datos
			}
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
<title>Registro</title>
</head>
<body>
<div class="container">
  <div class="row main">
    <div class="panel-heading">
      <div class="panel-title text-center">
        <h1 class="title">PointMéxico</h1>
        <hr />
      </div>
    </div>
    <div class="main-login main-center">
      <form class="form-horizontal" method="post" action="#">
        <div class="form-group">
          <label for="name" class="cols-sm-2 control-label">Nombre</label>
          <div class="cols-sm-10">
            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
              <input type="text" class="form-control" name="name" id="name"  placeholder="Nombre" required/>
            </div>
          </div>
        </div>
        <div class="form-group">
        <label for="email" class="cols-sm-2 control-label">Correo electrónico</label>
        <div class="cols-sm-10">
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
            <input type="email" class="form-control input" name="email" id="email"  placeholder="Email" required/>
          </div>
        </div>
        <div class="form-group">
          <label for="username" class="cols-sm-2 control-label">Nombre de usuario</label>
          <div class="cols-sm-10">
            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
              <input type="text" class="form-control input" name="username" id="username"  placeholder="Nombre de usuario" required/>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="cols-sm-2 control-label">Contraseña</label>
          <div class="cols-sm-10">
            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
              <input type="password" class="form-control" name="password" id="password"  placeholder="Password" required/>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="confirm" class="cols-sm-2 control-label">Confirma tu contraseña</label>
          <div class="cols-sm-10">
            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
              <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Password" required/>
            </div>
          </div>
        </div>
        <div class="form-group ">
          <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-button">Registrarte</button>
        </div>
        <div class="login-register"> <a href="login.php">Iniciar sesión</a> </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html>