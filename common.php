<?
    $function = $_REQUEST["function"];
    switch ($function)
    {
    	case 'getLogin':
            getLogin();
          break;
        case 'getList':
            getList();
          break;  
        case 'getDetail':
            getDetail();
          break;
        default:
          break;
    }

    function getLogin()
    {
    	$url = 'http://10.138.1.17:8082/EbidServices/checkLogin?userName=ebid&password=3333302eac36ff5158dc5d3ff2db2447';
       	getJson($url);
    }

    function getList()
    {
    	//$categorycode = $_REQUEST["function"];
        $url = "http://10.138.1.17:8082/EbidServices/getBidList?categorycode=%E9%9D%9C%E9%9B%BB&token=P1e8UbJZmtQUQ8LtOg98ff0LjmHivcPiK50aLPNv0AU";
       	getJson($url);
    }

    function getDetail()
    {
    	$bidno = $_REQUEST["bidno"];
        $url = "http://10.138.1.17:8082/EbidServices/getBid?bidno=".$bidno."&token=P1e8UbJZmtQUQ8LtOg98ff0LjmHivcPiK50aLPNv0AU";
       	getJson($url);
    }

	function getJson($url){
		$handle = fopen($url,"rb");
		$content = "";
		while (!feof($handle)) {
		    $content .= fread($handle, 10000);
		}
		fclose($handle);
		$content = json_encode($content);
		echo $content;
	}


?>