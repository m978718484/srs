<?
    $function = $_REQUEST["function"];
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
    }

    function getToken()
    {  
      $key = 'srsebidweixintokencache';
      $redis = new Redis();  
      $redis->connect('10.138.1.17', 8084);  
      $redis->auth('Foxconn88');  
      $token = $redis->get($key);
      if ($token=='') {
          $url = 'http://10.138.1.17:8082/EbidServices/checkLogin?userName=ebid&password=3333302eac36ff5158dc5d3ff2db2447';
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
      $url = "http://10.138.1.17:8082/EbidServices/getCategoryList?token=".$token;
      echo json_encode(getJson($url));
    }

    function getListDefault()
    {
        $token = getToken();
        $date = date('Y-m-d');
        $url = "http://10.138.1.17:8082/EbidServices/getBidList?startdate=".$date."&token=".$token;
        // echo $url;
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
        $url = "http://10.138.1.17:8082/EbidServices/getBidList?startdate=".$startdate."&token=".$token."&closeDate=".$closeDate;
        echo json_encode(getJson($url));
    }

    //
    function getDetail()
    {
      $token = getToken();
    	$bidno = $_REQUEST["bidno"];
      $url = "http://10.138.1.17:8082/EbidServices/getBid?flag=0&bidno=".$bidno."&token=".$token;
      echo json_encode(getJson($url));
    }

    function getVipLogin()
    {
      $token = getToken();
      $userName = $_REQUEST["username"];
      $password = $_REQUEST["password"];
      // $url = "http://10.138.1.17:8082/EbidServices/login?token=".$token."&userName=2601917&password=2601917";
      $url = "http://10.138.1.17:8082/EbidServices/login?token=".$token."&userName=".$userName."&password=".$password;
      $json_data =json_decode(getJson($url));
      if ($json_data->errorFlag=="E0000") {
        //設置Session
        echo $json_data->errorFlag;
      }
      else
      {
        echo "string";
      }
      // echo json_encode(getJson($url));
    }

  	function getJson($url){
  		$handle = fopen($url,"rb");
  		$content = "";
  		while (!feof($handle)) {
  		  $content .= fread($handle, 10000);
  		}
  		fclose($handle);
  		// $content = json_encode($content);
  		return $content;
  	}


?>