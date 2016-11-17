<?
	require('header.php');
       

	$username=$_REQUEST['username'];
	$passwd=$_REQUEST['password'];
    echo("username: " . $username . " password " . $passwd); 

	// session_start();
	// $_SESSION['s_username']=$username;
	// $url = "http://10.138.1.17:8082/EbidServices/checkLogin?userName=".$username."&password=".$passwd;
	// echo $url;
	// $handle = fopen($url,"rb");
	// $content = "";
	// while (!feof($handle)) {
	//     $content .= fread($handle, 10000);
	// }
	// fclose($handle);
	// $content = json_decode($content);

	// if($content->errorFlag != 0)
	// {
	//     echo 'login fail!!';
?>
