<!DOCTYPE html>
<html>
<?php
  require('header.php');
?>
<script type="text/javascript">
     jQuery(document).ready(function() {
        //输入事件
        $("input[id]").bind("focus",function () { 
        if($(this).attr("value")=='用户名'||$(this).attr("value")=='密码')
          $(this).attr("value",""); 
        }); 
        //提交
        $("#regist").bind("click", function() {
              var formData = $("form#registform").serialize();
              // debugger;
              if (true) {
                $.ajax({
                   type: "POST",
                   url: "common.php",
                   data: formData,
                   success: function(msg){
                     if(msg=='success'){
                        $.mobile.changePage("../content/first.html","slidedown", true, true);
                     }else{
                        $.mobile.changePage("../content/loginfalse.html","slidedown", true, true);
                     }
                      
                   }
                }); 
              }
            });
        });
    </script>
     
    <style type="text/css">
    p {
        font-size: 1.5em;
        font-weight: bold;
    }
    header div{
        font-size: 1.5em;
    }
    </style>
     
<body> 
 
<!-- begin first page -->
<section data-role="page">
  <header data-role="header" data-type="horizontal" data-theme="b">
            <a href="javascript:location.href='login.php'" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left">登录</a>
            <h1>会员注册</h1>
  </header>
  <div data-role="content" class="content">
        <form method="post" id="registform">
        <label for="companyname">公司名称</label>
        <input type="text" name="companyname" id="companyname"/>
        <label for="password">密 码</label>
        <input type="password" name="password" id="password"/>

        <label for="repassword">确认密码</label>
        <input type="password" name="repassword" id="repassword"/>

        <label for="vendorCode">供应商代码</label>
        <input type="text" name="vendorCode" id="vendorCode"/>
        <label for="email">手机号码</label>
        <input type="text" name="phoneno" id="phoneno"/>
        <label for="phonecode">获取验证码</label>
        <input type="text" name="phonecode" id="phonecode"/>
        <input  type="hidden" name="functionname" id="functionname" value="register">
        <center>
            <a data-role="button" id="regist" data-theme="e">立即注册</a>
        </center>
        </form>
  </div>
</section>
<!-- end first page -->
</body>
</html>