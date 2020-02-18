<?php


    $json = file_get_contents('https://codeforces.com/api/user.status?handle=.marajul.');

	$json_data = json_decode($json,true);
	include 'C:\xampp\htdocs\Dairy\include\connection.php';
    include 'C:\xampp\htdocs\Dairy\include\tstr.php';
    
    $a = $json_data["result"];
    $cnt =0;
    foreach($a as $row){
        $id=$row['id'];
        $ver=$row['verdict'];
        $time=$row['creationTimeSeconds'];
        $pname=madestr((string)$row['problem']['name']);
        $conid=$row['problem']['contestId'];
        $pindex=$row['problem']['index'];
        $link="https://codeforces.com/contest/".$conid."/problem/".$pindex;
        // echo $id." ".$pname." ".$ver." ".$link."<br>"; 

		$sql = "SELECT * FROM piammarajul WHERE subid='$id' AND oj='cf'";
        $result = $conn->query($sql);
        if($result->num_rows==0)
        {
            $cnt++;
        	$sql = "INSERT INTO piammarajul (subid,dt,link,name,ver,oj)
			VALUES ('$id', '$time' , '$link' ,'$pname', '$ver', 'cf')";
			$conn->query($sql);
        }
        else{
            break;
        }
    }
    echo $cnt;

?>