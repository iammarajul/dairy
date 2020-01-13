<?php

	include 'C:\xampp\htdocs\Dairy\include\connection.php';
	include 'C:\xampp\htdocs\Dairy\include\tstr.php';


	$json = file_get_contents('https://uhunt.onlinejudge.org/api/p');
	$json_data = json_decode($json,true);
	

	$array= $json_data;

	foreach ($array as $num) {
		# code...
		$id = $num[0];
		$name = $num[2];
		$name=madestr($name);
		$sql = "INSERT INTO uva (id,name)
			VALUES ('$id','$name')";
		$conn->query($sql);

	}
	$conn->close();
?>