<?php  

require('simple_html_dom.php');
include 'C:\xampp\htdocs\Dairy\include\connection.php';


function Add($str)
{
		# code...
		include 'C:\xampp\htdocs\Dairy\include\connection.php';
		$html = file_get_html($str);

		if(!$html) {echo "NO conn";}


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



$str="https://www.spoj.com/users/master/";
	// echo "$str<br>";

	$html = file_get_html($str);
	if(!$html) {echo "NO conn";}
	// echo $html;
	$table=$html->find('table.table.table-condensed',0);
	foreach ($table->find('tr') as $pk) {
		for($i=0;$i<7;$i++){
			$ab=$pk->find('td',$i);
			
			$gg=$ab->find('a',0);
			$url="https://www.spoj.com";
			$url=$url.$gg->href;
			if($gg->plaintext!=""){
					Add($url);
			}

		}
		# code...
	}


?>