<?php
session_start();

// initializing variables
$Korisnicko_ime = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'Forum');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $Korisnicko_ime = mysqli_real_escape_string($db, $_POST['Korisnicko_ime']);
  $lozinka1 = mysqli_real_escape_string($db, $_POST['lozinka1']);
  $lozinka2 = mysqli_real_escape_string($db, $_POST['lozinka2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($Korisnicko_ime)) { array_push($errors, "Korisnicko ime nedostaje"); }
 


  if (empty($lozinka1)) { array_push($errors, "Lozinka nedostaje"); }
  if ($lozinka1 != $lozinka2) {
	array_push($errors, "Lozinke se ne podudaraju!");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM Korisnik WHERE Korisnicko_ime='$Korisnicko_ime' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['Korisnicko_ime'] === $Korisnicko_ime) {
      array_push($errors, "Username already exists");
    }

  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($lozinka1);//encrypt the password before saving in the database

  	$query = "INSERT INTO Korisnik (Korisnicko_ime, Lozinka) 
  			  VALUES('$Korisnicko_ime', '$lozinka1')";
  	mysqli_query($db, $query);
  	$_SESSION['Korisnicko_ime'] = $Korisnicko_ime;
  	//$_SESSION['success'] = "You are now logged in";
    array_push($errors1, "Uspesno ste napravili nalog");
  	
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  
    $Korisnicko_ime = mysqli_real_escape_string($db, $_POST['Korisnicko_ime']);
    $lozinka1 = mysqli_real_escape_string($db, $_POST['lozinka1']);
    
  
    if (empty($Korisnicko_ime)) {
        array_push($errors, "Username is required");
    }
    if (empty($lozinka1)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        //$lozinka1 = md5($lozinka1);
        $query = "SELECT * FROM Korisnik WHERE Korisnicko_ime='$Korisnicko_ime' AND Lozinka='$lozinka1'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['Korisnicko_ime'] = $Korisnicko_ime;
          //$_SESSION['success'] = "Korisnicko_ime";
          echo $Korisnicko_ime;
          header('Location:index.php');
          
        }else {
            array_push($errors, "Wrong username/password combination");
            $_SESSION['Korisnicko_ime'] = $Korisnicko_ime;
            
        }
    }
    
  }
  
  ?>
