<?php


$username = "";
$email    = "";
$errors = array(); 
$success=0;
$toph="";
$spoj="";
$uva="";
$cf="";


include 'C:\xampp\htdocs\Dairy\include\connection.php';


if (isset($_POST['reg_user'])) {
  $username = ( $_POST['username']);
  $email = ( $_POST['email']);
  $password_1 = ($_POST['password_1']);
  $password_2 = ($_POST['password_2']);
  $password_2 = ($_POST['password_2']);
  $cf = ($_POST['cf']);
  $spoj = ($_POST['spoj']);
  $uva = ($_POST['uva']);
  $toph = ($_POST['toph']);
  $secretkea="6LfUcMwUAAAAAJGzJLco2hdEa7sFK5oEiLnObspN";
  $responseKea=$_POST['g-recaptcha-response'];
  $url='https://www.google.com/recaptcha/api/siteverify?secret=$secretkea&response=$responseKea';
  $responce=file_get_contents($url);
  if($responce){
  $responce=json_decode($responce);
  }
  else{
    array_push($errors, "connection Error");
  }



  
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  $sql = "SELECT * FROM user WHERE un='$username' OR email='$email' LIMIT 1";
  $result = $conn->query($sql);
  $user=$result->fetch_assoc();
  
  if ($result->num_rows>0) { 
    if ($user['un'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
    if($responce->success)
    {
        array_push($errors, "cheak this chapcha");
    }
 
  if (count($errors) == 0) {

    $sql="INSERT INTO user(un,email,pass,uva,cf, spoj, toph) VALUES ('$username','$email','$password_1', '$uva','$cf','$spoj','$toph')";
    $tablename="p".$username;
    $sql2="CREATE TABLE dairy. $tablename ( id INT(18) NOT NULL AUTO_INCREMENT , subid VARCHAR(18) NOT NULL , date VARCHAR(18) NOT NULL , link VARCHAR(200) NOT NULL , name VARCHAR(100) NOT NULL , ver VARCHAR(100) NOT NULL , oj VARCHAR(18) NOT NULL , PRIMARY KEY (id))";

    $res=$conn->query($sql);
    $res2=$conn->query($sql2);
  	if($res) $success=1;
  	header('signup.php');


  }
}

?>