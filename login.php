<?php
$username = null;
$password = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if(!empty($_POST["username"]) && !empty($_POST["password"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		if($username == 'hr' && $password == 'hr') {
			session_start();
      $_SESSION["authenticated"] = 'true';
			$_SESSION["user"] = 'hr';
			header('Location: index.php');
    }
    else if($username == 'admin' && $password == 'admin') {
			session_start();
      $_SESSION["authenticated"] = 'true';
			$_SESSION["user"] = 'admin';
			header('Location: index.php');
		}
		else {
			header('Location: login.php');
		}
		
	} else {
		header('Location: login.php');
	}
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Nazwa strony test test test</title>
  <link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="login.css" rel="stylesheet" >
<style>

input[type=password] {

background-color: #f6f6f6;

border: none;

color: #0d0d0d;

padding: 15px 32px;

text-align: center;

text-decoration: none;

display: inline-block;

font-size: 16px;

margin: 5px;

width: 85%;

border: 2px solid #f6f6f6;

-webkit-transition: all 0.5s ease-in-out;

-moz-transition: all 0.5s ease-in-out;

-ms-transition: all 0.5s ease-in-out;

-o-transition: all 0.5s ease-in-out;

transition: all 0.5s ease-in-out;

-webkit-border-radius: 5px 5px 5px 5px;

border-radius: 5px 5px 5px 5px;

}

input[type=password]:focus {

background-color: #fff;

border-bottom: 2px solid #5fbae9;

}

input[type=password]:placeholder {

color: #cccccc;

}

</style>


</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Login Form -->
    <form id="login" method="post">
      <input type="text" class="fadeIn second" name="username" placeholder="login">
      <input type="password" id="pass" class="fadeIn third" name="password"  placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="mailto:name@email.com">Zapomniales hasla? Skontaktuj się z administratorem.</a>
    </div>

  </div>
</div>

<script src="bootstrap.min.js"></script>
<script src="jquery.min.js"></script>
</body>
</html>