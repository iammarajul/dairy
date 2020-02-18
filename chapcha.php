<?php 
  include 'C:\xampp\htdocs\Dairy\include\connection.php';

  $x='ueuihefui';

  $new=mysqli_real_escape_string($conn,$x);

  echo $new;
  

?>