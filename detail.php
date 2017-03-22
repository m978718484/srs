<!DOCTYPE html>
<?php
	require('header.php'); 
?>
<style type="text/css">
    .ui-tc {
        text-align: center;
    }
    .ui-grid-a 
    {
        font-size:0.8em;
    }
    .ui-grid-a .ui-block-a {
        width: 37%;
    }
    .ui-grid-a .ui-block-b {
        width: 63%;
    }
    a,span
    {
        word-break:normal;
        width:auto; 
        display:block; 
        white-space:pre-wrap;
        word-wrap:break-word;
        overflow:hidden;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){  
        $('#buttonpay').click(function(){checkPay();return false;});
        
      }); 

    $(document).on('pageinit', '#detail', function(){
       var bidno = getUrlParam('bidno');
       var fromHistory = getUrlParam('fromHistory');
       if (fromHistory) {
             $("#enter").remove();
       }

       $.ajax({
            type:'GET',
            data:{functionname:"getDetail",bidno:bidno},
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
           if (obj.data.creatortel==''||obj.data.creatortel==null) {
                $("#enter").remove();
                var url =$.base64.encode(window.location.href);
                $('#signup').attr('href',"javascript:location.href='login.php?url="+url+"'"); 
                // console.log(window.location.pathname);
                // console.log(window.location.search);
           }
           else{
                $("#signup").remove();
           }
           // alert(obj.data)
           console.log(obj);
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
           $('#payProject').text('项目名称：'+ obj.data.projectName);
           $('#payStartTime').text('开标时间：'+ obj.data.starttime);
        }
    }

    function checkPay()
    {
        alert('缴费成功！');
        location.href = "mybidding.php"
    }
</script>
<div data-role="page" id="detail">
    <div data-role="header" data-position="fixed"  data-theme="b">
        <a href="javascript:void(0);" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left">返回</a>
        <h1>公告详情</h1>
    </div>
    <a data-role="button" href="#pay" id="enter" >我要报名</a>
    <a data-role="button"  id="signup">登陸查看詳情</a>
    <div data-role="content" id="content">
    <ul data-role="listview" id="listview"> 
        <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>工程名称:</span>
                </div>
                <div class="ui-block-b">
                    <a id="projectName"></a> 
                </div>
            </div>
        </li> 
        <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>厂  区:</span>
                </div>
                <div class="ui-block-b">
                    <a id="area"></a> 
                </div>
            </div>
        </li> 
        <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>标  号:</span>
                </div>
                <div class="ui-block-b">
                    <a id="bidno"></a> 
                </div>
            </div>
        </li> 
        <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>招标部门:</span>
                </div>
                <div class="ui-block-b">
                    <a id="bucode"></a> 
                </div>
            </div>
        </li> 
        <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>招标类型:</span>
                </div>
                <div class="ui-block-b">
                    <a id="categorycode"></a> 
                </div>
            </div>
        </li> 
         <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>开始时间:</span>
                </div>
                <div class="ui-block-b">
                    <a id="starttime"></a> 
                </div>
            </div>
        </li> 
         <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>结束时间:</span>
                </div>
                <div class="ui-block-b">
                    <a id="closetime"></a> 
                </div>
            </div>
        </li> 
         <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>描  述:</span>
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
                    <span>联 系 人:</span>
                </div>
                <div class="ui-block-b">
                    <a id="creatorname"></a> 
                </div>
            </div>
        </li> 
        <li> 
            <div class="ui-grid-a"> 
                <div class="ui-block-a">
                    <span>联系人电话:</span>
                </div>
                <div class="ui-block-b">
                    <a id="creatortel"></a> 
                </div>
            </div>
        </li>                 
    </ul> 
    </div>
    <?php
        require('footer.php');
    ?>
</div>

<div data-role="page" id="pay">
    <div data-role="header" data-position="fixed" data-theme="b">
        <a href="#detail" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left">返回</a>
        <h1>确认报名</h1>
    </div>
    <div data-role="content" id="paycontent">

        <label><a id = "payProject"></a></label>
        <label><a id = "payStartTime"></a></label>
        <label>
           <h3 style="text-align:center;">缴费金额:200￥</h3>
        </label>
        <label for="radio-choice-0b">微信支付</label>
        <input type="radio" name="radio-choice-0" checked="checked" id="radio-choice-0b" class="custom">
        <label for="radio-choice-1b">支付宝支付</label>
        <input type="radio" name="radio-choice-0" id="radio-choice-1b" class="custom">
        <a data-role="button" id="buttonpay" href="mybidding.php">提  交</a>
    </div>
    <?php
        require('footer.php');
    ?>
</div>
