<?
      // $redis = new Redis();  
      // $redis->connect('10.138.1.17', 8084);  
      // $redis->auth('Foxconn88');  
      // $json =json_decode($redis->hget('UserLoginMap', 'ebid'));

      // echo $json->token;
      // echo "<br/>";
      // $num = $json->timeOut;
      // echo $date=date('H:i:s','1482462171944');
	header("Content-type: text/html; charset=utf-8");
	include('convert.php');
	$str = zhconversion_hant('马');
	$str1 = zhconversion_hans('馬');
	echo $str . $str1;
?>
