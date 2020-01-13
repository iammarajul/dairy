<?php 

require('simple_html_dom.php');

// Create DOM from URL or file


  for($k=0;$k<10;$k++){

 	
        //echo "$sk<br>";
	$str="https://www.codechef.com/submissions?page=".$k."&sort_by=All&sorting_order=asc&language=All&status=All&year=all&handle=ramprosadg&pcode=&ccode=&Submit=GO";
	//echo "$str";

	$html = file_get_html($str);

// Find top ten videos
	$cnt = 1;
	foreach ($html->find('tr.\"kol\"') as $video) {
        

        $as = $video->find('td',0);
        echo $as." ----------- ";//echo "<br>";

        $bs = $video->find('td',2);
        $time = $video->find('td',1);
        //$time1 = $time->find('span.timestamp',0);
        echo $time."------";

        //$cs = $video->find('span.truncated',2);
        
        // echo $bs->plaintext."--------";

        // $ver = $video->find('td.text-right.submission-status-col',0);
        // //$ver2 = $video->find('td.text-right.submission-status-col',0);

        // // $ver1 = $ver->find('span',0);

        //  echo $ver."<br>";

        // $bs = $video->find('td.sproblem.text-center',0);
        // $st = $video->find('td.statusres.text-center',0);
        // $cs = $bs->find('a',0);
        // //$ds = $cs->find('title',0);
        // //$qq=strval($cs) ;

        // //echo $qq;

        // $ds = 'https://www.spoj.com/problems/' . $cs->title;
        // // $ds = $cs->find('href',1);

        // echo $as . " ---- <a href='$ds'>$cs->plaintext</a> --------" . $st . "<br>";



        $cnt++;
	}


 }


	
 ?>