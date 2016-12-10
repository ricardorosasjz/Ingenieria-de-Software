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
		$Contra = md5($Contrasena);

    $Cookie_name = 'usuario';
		if (!mysqli_select_db($User_Information, "tienda")) {
    die("Uh oh, couldn't select database");
}

  $sql = "SELECT email_address, contraseña, complete_name FROM customers where email_address like '". $Correo . "' " .
  "AND contraseña like '" . $Contra . "'";
$result = mysqli_query($User_Information, $sql) or die(mysql_error());
    if (mysqli_num_rows($result) == 1) {
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
 extract($row);
 echo "Welcome " . $complete_name . " to our Shopping Mall <br>";
 }
 }
			else{
				echo "Por favor, ingresa una dirección de correo o contraseña válidas".mysqli_error($User_Information);
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

		<title>Log in</title>
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
							<label for="email" class="cols-sm-2 control-label">Correo electrónico</label>
							<div class="cols-sm-10">
								<div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control input" name="email" id="email"  placeholder="Correo electrónico" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Contraseña</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Password"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
          					<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-button">Iniciar sesión</button>
						</div>
						<div class="login-register"> <a href="register.php">Registrarte</a> </div>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	</body>
</html>
