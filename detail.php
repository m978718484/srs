<?
	require('header.php'); 
?>
<script type="text/javascript">
$(document).on('pageinit', '#detail', function(){  
    var bidno = getUrlParam('bidno');
   $.ajax({
        type:'GET',
        data:{function:"getDetail",bidno:bidno},
        url:'common.php',
        dataType: "json",
        success: function (result) {
            ajax.parseJSON(result);
        },
        error: function (request,error) {
            alert('Network error has occurred please try again!');
        }
    }); 
});
var ajax = {  
    parseJSON:function(result){  
       var obj = jQuery.parseJSON(result);
       console.log(obj.data.bucode)
    }
}
function getUrlParam(name){
    //构造一个含有目标参数的正则表达式对象
    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
    //匹配目标参数
    var r = window.location.search.substr(1).match(reg);
    //返回参数值
    if (r!=null) return unescape(r[2]);
    return null;
}
</script>
<div data-role="page" id="detail" data-theme="b">
    <div data-role="header" data-position="fixed">
         <a href="javascript:location.href='index.php'" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left">返回</a>
        <h1>公告详情</h1>
    </div>
    <div data-role="content">
    	<label>I'm the detail !</label>
    </div>
    <div data-role="footer" data-position="fixed" id="footer">
        <h1>Copy Right By MinMax-SRS</h1>
    </div>
</div>