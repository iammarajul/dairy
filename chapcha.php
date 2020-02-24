<?php 

  
    function s2d( $sec ) 
    {
        $m=$sec/60;
        $s=$sec%60;
        $h=$m/60;
        $m=$m%60;
        $d=$h/24;
        $h=$h%24;

        if($d==0) {
        	$str=$h." h ".$m." m";
        	echo $str;
        	// return $str;
        }
        else{
        	$str=$d." d";
        	echo $str;
        }

        # code...
    }
    

    s2d("172800‬");
    // echo $ac;
    

?>