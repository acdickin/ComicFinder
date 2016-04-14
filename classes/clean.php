<?php
	function clean($data)	{
	$data1=$data;
	$data= htmlentities($data);
	$data=preg_replace("/[^a-zA-Z0-9]+/", "", $data);
	$data= filter_var($data, FILTER_SANITIZE_STRING);
		
		if ($data1!=$data){
			//Echo ('Data was changed from '. $data1. ' to '.$data); 
			return $data;
		}
		
	return $data;
	}
?>