<?php 

	$json = file_get_contents('https://uhunt.onlinejudge.org/api/subs-user/888032');

	$json_data = json_decode($json,true);
	include 'C:\xampp\htdocs\Dairy\include\connection.php';
	include 'C:\xampp\htdocs\Dairy\include\tstr.php';

	$pk =array();

	$verdict= array(
	"10" =>"Submission error" , 
	"15" =>"Can't be judged",
	"20" => "In queue",
	"30" => "Compile error",
	"35" => "Restricted function",
	"40" => "Runtime error",
	"45" => "Output limit",
	"50" => "Time limit",
	"60" => "Memory limit",
	"70" => "Wrong answer",
	"80" => "PresentationE",
	"90" => "Accepted");

	// var_dump($json_data);
	$array = $json_data["subs"];

	foreach ($array as $num) {
		$cnt=0;
		$id = $num[0];
		$pid = $num[1];
		$ver = $num[2];
		$tim = $num[4];
		$link ="https://onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem=".$pid;
		$pkl="SELECT * FROM uva WHERE id=$pid";
		$n1=$conn->query($pkl);
		$pk2=$n1->fetch_assoc();
		$pname=$pk2['name'];
		$pname2=madestr($pname);

		$sql = "SELECT * FROM piammarajul WHERE subid='$id' AND oj='uva'";
        $result = $conn->query($sql);
        if($result->num_rows==0)
        {
        	$sql = "INSERT INTO piammarajul (subid,dt,link,name,ver,oj)
			VALUES ('$id', '$tim' , '$link' ,'$pname2', '$verdict[$ver]', 'uva')";
			$conn->query($sql);
        }

	}
	
 ?>