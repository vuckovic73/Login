<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
<style>
* {
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 120%;
  background: #F8F8FF;
}

.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #5F9EA0;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;

.error1 {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #AFE1AF; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
</style>
</head>
<body>
     <!-- <?php
       $Korisnicko_ime = "";
       $emailErr="";

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "Forum";
            $conn = new mysqli($servername, $username, $password, $dbname);

            if (empty($_POST["Korisnicko_ime"])) {
                $emailErr = "Korisnicko ime je obavezno";
              } else {
                  $emailErr = "";
                $Korisnicko_ime = test_input($_POST["Korisnicko_ime"]);
                if (!filter_var($Korisnicko_ime, FILTER_VALIDATE_EMAIL))
                {
                  $emailErr = "Neispravan format";
                  $Korisnicko_ime = "";
                }
              }

              function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }


    ?>  -->
  <div class="header">
  	<h2>Registracija</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Korisnicko ime</label>
  	  <input type="email" name="Korisnicko_ime" >
  	</div>
  	<div class="input-group">
  	  <label>Lozinka</label>
  	  <input type="password" name="lozinka1" >
  	</div>
  	<div class="input-group">
  	  <label>Ponovljena lozinka</label>
  	  <input type="password" name="lozinka2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Vec ste clan? <a href="login.php">Ulogujte se</a>
  	</p>
  </form>
</body>
</html>