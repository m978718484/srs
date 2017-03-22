<?php
    header("Content-type: text/html; charset=utf-8");
    include('package/convert.php');
    $function = $_REQUEST["functionname"];
    switch ($function)
    {
        case 'getCategory':
          getCategory();
        break;
        case 'getListFilter':
          getListFilter();
        break; 
        case 'getListDefault':
          getListDefault();
        break;  
        case 'getDetail':
          getDetail();
        break;
        case 'getVipLogin':
          getVipLogin();
        break;
        case 'getMyBid':
          getMyBid();
        break;
        case 'register':
        break;
        case 'getBidNotices':
          getBidNotices();
        break;
        case 'loginout':
          loginout();
          break;
    }

    function getBidNotices(){
        $token = getToken();
        $url = "http://http://202.104.118.46//EbidServices/getBidNotices?token=".$token;
        // echo $url;
        echo json_encode(getJson($url));
    }

    function loginout()
    {
      session_start();
      unset($_SESSION['VIPNAME']);
      session_destroy();
      echo '注销成功';
    }

    function getToken()
    {  
      $key = 'srsebidweixintokencache';
      $redis = new Redis();  
      $redis->connect('http://202.104.118.46/', 8084);  
      $redis->auth('Foxconn88');  
      $token = $redis->get($key);
      if ($token=='') {
          $url = 'http://http://202.104.118.46//EbidServices/checkLogin?userName=ebid&password=3333302eac36ff5158dc5d3ff2db2447';
          $json_data =json_decode(getJson($url));
          if ($json_data->errorFlag=='E0000') {
            $redis->set($key,$json_data->token);
            $redis->expire($key ,3600);
          }
          return $json_data->token;
      }
      else{
        return $token;
      }
    }

    function getCategory()
    {
      $token = getToken();
      $url = "http://http://202.104.118.46//EbidServices/getCategoryList?token=".$token;
      echo json_encode(getJson($url));
    }

    function getListDefault()
    {
        $token = getToken();
        $date = date('Y-m-d');
        $url = "http://http://202.104.118.46//EbidServices/getBidList?startdate=".$date."&token=".$token;
        echo json_encode(getJson($url));
    }

    function getListFilter()
    {
        $token = getToken();
        // $categorycode = $_REQUEST["categorycode"];   
        $startdate = $_REQUEST['startdate'];
        $closeDate = $_REQUEST['closeDate'];
        // $categorycode = $_REQUEST['categorycode'];
        // $bucode = $_REQUEST['bucode'];
        // $bidno = $_REQUEST['bidno'];
        // $projectName = $_REQUEST['projectName'];
        $url = "http://http://202.104.118.46//EbidServices/getBidList?page=1&size=50&startdate=".$startdate."&token=".$token."&closeDate=".$closeDate;
        echo json_encode(getJson($url));
    }

    function getDetail()
    {
      $token = getToken();
    	$bidno = $_REQUEST["bidno"];
      $flag = '1';
      if (checkLogin()==1) {
        $flag = '0';
      }
      $url = "http://http://202.104.118.46//EbidServices/getBid?flag=". $flag."&bidno=".$bidno."&token=".$token;
      echo json_encode(getJson($url));
    }

    function getVipLogin()
    {
      $token = getToken();
      $userName = $_REQUEST["username"];
      $password = $_REQUEST["password"];
      $url = "http://http://202.104.118.46//EbidServices/login?token=".$token."&userName=".$userName."&password=".$password;
      $temp = getJson($url);
      $json_data =json_decode($temp);
      if ($json_data->errorFlag=="E0000") {
        SESSION_START();
        $_SESSION['VIPNAME'] = $userName;
      }
      echo json_encode($temp);
    }

    function getMyBid()
    {
      $token = getToken();
      $page = $_REQUEST["page"];
      $startdate = $_REQUEST["startdate"];
      $closeDate = $_REQUEST["closedate"];
      $username = '';
      if (checkLogin()==1) {
        $username = $_SESSION['VIPNAME'];
        $url = "http://http://202.104.118.46//EbidServices/getMyBidList?token=".$token."&userName=".$username."&startdate=".$startdate."&closeDate=".$closeDate."&page=".$page."&size=6";
        // echo $url;
        echo json_encode(getJson($url));
      }
      else{
        exit(0);
      }
    }

    function register()
    {
      $token = getToken();
      $url = "http://http://202.104.118.46//EbidServices?token=".$token."&tleNo=".$telno."&name=".$name."&pwd=".$password."&vendorCode=".$vendorCode;
      $json_data =json_decode(getJson($url));
      if ($json_data->status=="E0000") {
        echo $json_data->errorFlag;
      }
      else
      {
        echo "string";
      }
    }

    function checkLogin(){
       session_start();
       if (isset($_SESSION['VIPNAME'])) {
         return 1;
       }
       else{
        return 0;
       }

    }

  	function getJson($url){
        $content = file_get_contents($url);
        // $handle = fopen($url,"rb");
        // $content = "";
        // while (!feof($handle)) {
        //   try{
        //       $content .= fread($handle, 10000);
        //   }
        //   catch(Exception $e){
        //       break;
        //   }
        // }
        // fclose($handle);
        // $content = utf8_encode($content)
        return zhconversion_hans($content);
        // return $content;

  	}
?>

