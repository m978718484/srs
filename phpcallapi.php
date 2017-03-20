<?php    
	require('common.php');
	$url = "http://10.138.1.17:8082/EbidServices/checkLogin?userName=ebid&password=3333302eac36ff5158dc5d3ff2db2447";
	$content = getJson($url);
	if($content->errorFlag != 0)
	{
	    echo 'Illegal Access API !';
	}
	else
	{	
		setCookie('token',$content->token,time()+3600*24*30);
		Header("Location:index.php"); 
	}
?>
