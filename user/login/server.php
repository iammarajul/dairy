<?php
// LOGIN USER
include 'C:\xampp\htdocs\Dairy\include\connection.php';

$errors=array();
if (isset($_POST['login_user'])) {
  $username = ( $_POST['username']);
  $password = ( $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$query = "SELECT * FROM user WHERE un='$username' AND pass='$password'";
  	$results = $conn->query($query);
    $user=$results->fetch_assoc();
  	if ($results->num_rows == 1) {
	//   session_start();
		$name='un';
		setcookie($name, $username, time()+30*24*60*60,"/");
		header('location: /dairy/user/dashboard/examples/dashboard.php');
		//exit();
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>