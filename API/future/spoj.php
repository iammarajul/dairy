<?php 

require('simple_html_dom.php');


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dairy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





for($k=0;$k<5;$k++){
	$sk=$k*2;
	$str="https://www.spoj.com/status/iammarajul/start="."$sk"."0";
	// echo "$str<br>";

	$html = file_get_html($str);

	if(!$html) {echo "NO conn";break;}


	$cnt = 1;
	foreach ($html->find('tr.kol1') as $video) {
        //echo $video;

        $time = $video->find('td.status_sm',0);
        
        $as = $video->find('td.statustext.text-center',0);
        $bs = $video->find('td.sproblem.text-center',0);
        $st = $video->find('td.statusres.text-center',0);
        $cs = $bs->find('a',0);
        //$ds = $cs->find('title',0);
        //$qq=strval($cs) ;

        //echo $qq;

        $ds = 'https://www.spoj.com/problems/' . $cs->title;

		

        // $ds = $cs->find('href',1);
        $str=(string)$time->plaintext;
        $number =strtotime($str);
        
        // echo "$number<br>";

        $as=$as->plaintext;

        $sql = "SELECT * FROM submission WHERE id='$as' AND oj='spoj'";
        $result = $conn->query($sql);
        if($result->num_rows==0)
        {
        	$sql = "INSERT INTO submission (id,dt,link,name,ver,oj)
			VALUES ('$as', '$number' , '$ds' ,'$cs->plaintext', '$st->plaintext' , 'spoj')";
			$conn->query($sql);
        }

        $cnt++;
	}

	foreach ($html->find('tr.kol') as $video) {
        //echo $video;

        $time = $video->find('td.status_sm',0);
        
        $as = $video->find('td.statustext.text-center',0);
        $bs = $video->find('td.sproblem.text-center',0);
        $st = $video->find('td.statusres.text-center',0);
        $cs = $bs->find('a',0);
        //$ds = $cs->find('title',0);
        //$qq=strval($cs) ;

        //echo $qq;

        $ds = 'https://www.spoj.com/problems/' . $cs->title;

		
        $str=(string)$time->plaintext;
        $number = strtotime($str);

        $sql = "SELECT * FROM submission WHERE id='$as' AND oj='spoj'";
        $result = $conn->query($sql);
        if($result->num_rows==0)
        {
        	$sql = "INSERT INTO submission (id,dt,link,name,ver,oj)
			VALUES ('$as->plaintext', '$number' , '$ds' ,'$cs->plaintext', '$st->plaintext', 'spoj')";
			$conn->query($sql);
        }
        



        $cnt++;
	}




}

// $conn->close();


	
 ?>