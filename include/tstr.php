<?php  


	function madestr($str)
	{
		$array = str_split($str);
		$temp = array();
		foreach($array as $ch){
			if(ord($ch)==39){
				array_push($temp, chr(39),chr(39));
			}
			else array_push($temp , $ch);
		}
		$str = implode("", $temp);
		return $str;
		# code...
	}


?>