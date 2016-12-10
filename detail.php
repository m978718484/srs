<?
	require('header.php'); 
?>
<style type="text/css">
    .ui-tc {
        text-align: center;
    }
    .ui-grid-a 
    {
        font-size:0.5em;
    }
    .ui-grid-a .ui-block-a {
        width: 37%;
    }
    .ui-grid-a .ui-block-b {
        width: 63%;
    }
    a,span
    {word-break:normal; width:auto; display:block; white-space:pre-wrap;word-wrap : break-word ;overflow: hidden ;}
</style>
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
       console.log(obj.data)
       $('#area').text(obj.data.area);
       $('#projectName').text(obj.data.projectName);
       $('#bidno').text(obj.data.bidno);
       $('#bucode').text(obj.data.bucode);
       $('#categorycode').text(obj.data.categorycode);
       $('#starttime').text(obj.data.starttime);
       $('#closetime').text(obj.data.closetime);
       $('#description').text(obj.data.description);
       $('#modeName').text(obj.data.modeName);
       $('#creatorname').text(obj.data.creatorname);
       $('#creatortel').text(obj.data.creatortel);
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
<div data-role="page" id="detail">
    <div data-role="header" data-position="fixed" data-theme="b">
        <a href="javascript:location.href='search.php'" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left">返回</a>
        <h1>公告详情</h1>
    </div>
    <p class="ui-tc">
        <a href="#" data-role="button" data-inline="true"  data-mini="true" data-inline="true" data-icon="check">我要报名</a>
    </p>
    <div data-role="content" id="content">
    <ul data-role="listview" id="listview"> 
<!--         <li data-role='list-divider'>    
            <p class="ui-tc">
                <span id="projectName" style="font-size:1.5em;"></span>
            </p>
        </li> -->
        <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>工程名稱:</span>
                </div>
                <div class="ui-block-b">
                    <a id="projectName"></a> 
                </div>
            </div>
        </li> 
        <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>廠區:</span>
                </div>
                <div class="ui-block-b">
                    <a id="area"></a> 
                </div>
            </div>
        </li> 
        <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>標號:</span>
                </div>
                <div class="ui-block-b">
                    <a id="bidno"></a> 
                </div>
            </div>
        </li> 
        <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>招標部門:</span>
                </div>
                <div class="ui-block-b">
                    <a id="bucode"></a> 
                </div>
            </div>
        </li> 
        <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>招標類型:</span>
                </div>
                <div class="ui-block-b">
                    <a id="categorycode"></a> 
                </div>
            </div>
        </li> 
         <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>開始時間:</span>
                </div>
                <div class="ui-block-b">
                    <a id="starttime"></a> 
                </div>
            </div>
        </li> 
         <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>結束時間:</span>
                </div>
                <div class="ui-block-b">
                    <a id="closetime"></a> 
                </div>
            </div>
        </li> 
         <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>描述:</span>
                </div>
                <div class="ui-block-b">
                    <a id="description"></a> 
                </div>
            </div>
        </li>  
        <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>竞标方式:</span>
                </div>
                <div class="ui-block-b">
                    <a id="modeName"></a> 
                </div>
            </div>
        </li> 
        <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>聯係人:</span>
                </div>
                <div class="ui-block-b">
                    <a id="creatorname"></a> 
                </div>
            </div>
        </li> 
        <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>聯係人電話:</span>
                </div>
                <div class="ui-block-b">
                    <a id="creatortel"></a> 
                </div>
            </div>
        </li>                   
    </ul> 
    <!-- <div class="ui-grid-a"> 
        <div class="ui-block-a">
            <div class="ui-bar ui-bar-e" style="text-align:left;"><span>廠區:</span></div>
        </div>
        <div class="ui-block-b">
            <div class="ui-bar ui-bar-e" style="text-align:left;"><span id="area"></span></div>
        </div>
    </div>
    <div class="ui-grid-a"> 
        <div class="ui-block-a">
            <div class="ui-bar ui-bar-e" style="text-align:left;"><span>標號:</span></div>
        </div>
        <div class="ui-block-b">
            <div class="ui-bar ui-bar-e" style="text-align:left;"><span id="bidno">CFISTESTCD1117</span></div>
        </div>
    </div>
    <div class="ui-grid-a"> 
        <div class="ui-block-a">
            <div class="ui-bar ui-bar-e" style="text-align:left;"><span>招標部門:</span></div>
        </div>
        <div class="ui-block-b">
            <div class="ui-bar ui-bar-e" style="text-align:left;"><span id="bucode"></span></div>
        </div>
    </div>
    <div class="ui-grid-a"> 
        <div class="ui-block-a">
            <div class="ui-bar ui-bar-e" style="text-align:left;"><span>招標類型:</span></div>
        </div>
        <div class="ui-block-b">
            <div class="ui-bar ui-bar-e" style="text-align:left;"><span id="categorycode"></span></div>
        </div>
    </div>
    <div class="ui-grid-a"> 
        <div class="ui-block-a">
            <div class="ui-bar ui-bar-e" style="text-align:left;"><span>開始時間:</span></div>
        </div>
        <div class="ui-block-b">
            <div class="ui-bar ui-bar-e" style="text-align:left;"><span id="starttime"></span></div>
        </div>
    </div>
    <div class="ui-grid-a"> 
        <div class="ui-block-a">
            <div class="ui-bar ui-bar-e" style="text-align:left;"><span>結束時間:</span></div>
        </div>
        <div class="ui-block-b">
            <div class="ui-bar ui-bar-e" style="text-align:left;"><span id="closetime"></span></div>
        </div>
    </div>
    <div class="ui-grid-a"> 
        <div class="ui-block-a">
            <div class="ui-bar ui-bar-e" style="text-align:left;"><span>描述:</span></div>
        </div>
        <div class="ui-block-b">
            <div class="ui-bar ui-bar-e" style="text-align:left;"><span id="description"></span></div>
        </div>
    </div>
    <div class="ui-grid-a"> 
        <div class="ui-block-a">
            <div class="ui-bar ui-bar-e" style="text-align:left;"><span>竞标方式:</span></div>
        </div>
        <div class="ui-block-b">
            <div class="ui-bar ui-bar-e" style="text-align:left;"><span id="modeName"></span></div>
        </div>
    </div> -->


    <!-- </div> -->
    	<!-- <table>
            <tr>
                <td>
                    <span>廠區:</span>
                </td>
                <td>
                    <span id="area"></span>
                </td>
            </tr>  
            <tr>
                <td>
                    <span>標號:</span>
                </td>
                <td>
                    <span id="bidno"></span>
                </td>
            </tr>   
             <tr>
                <td>
                    <span>招標部門:</span>
                </td>
                  <td>
                    <span id="bucode"></span>
                </td>
            </tr>   
             <tr>
                <td>
                    <span>招標類型:</span>
                </td>
                  <td>
                    <span id="categorycode"></span>
                </td>
            </tr>   
            <tr>
                <td>
                    <span>開始時間:</span>
                </td>
                  <td>
                    <span id="starttime"></span>
                </td>
            </tr>  
            <tr>
                <td>
                    <span>結束時間:</span>
                </td>
                  <td>
                    <span id="closetime"></span>
                </td>
            </tr>   
            <tr>
                <td>
                    <span>描述:</span>
                </td>
                  <td>
                    <span id="description"></span>
                </td>
            </tr>   
            <tr>
                <td>
                    <span>竞标方式:</span>
                </td>
                  <td>
                    <span id="modeName"></span>
                </td>
            </tr>  
                    
        </table> -->
    </div>
    <div data-role="footer" data-position="fixed" id="footer" data-theme="b">
        <h1>Copy Right By MinMax-SRS</h1>
    </div>
</div>