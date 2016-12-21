    <!DOCTYPE html>
    <html>
    <?
        require('header.php');
    ?>
    <body>
    <script type="text/javascript">
    $(document).ready(function(){  
        $('#btnLogin').click(function(){checkLogin();return false;});
      }); 

    function checkLogin()
    {
        var username = $('#username').val();
        var password = $('#password').val();
        if (username==''){$('#username').focus();return false;}
        if (password==''){$('#password').focus();return false;} 
        // console.log(username);
        $.ajax({
                type:'POST',
                data:{functionname:"getVipLogin",username:username,password:password},
                url:'common.php',
                dataType: "JSON",
                success: function (result) {
                        var obj = jQuery.parseJSON(result);
                        if ( obj.errorFlag == "E0000") {
                            location.href = "search.php";
                        }
                        else{
                            // alert("帳號密碼錯誤");
                            console.log(obj.errorFlag);
                        }
                },
                error: function (request,error) {
                   console.log(error);
                }
        }); 
    }
    </script>
     <div data-role="page" id="home" data-theme="b">
            <div data-role="header" data-position="fixed">
                <h1>个人登录</h1>
            </div>
            <div data-role="content" id="homeContent">
                <form action="index.php" method="get">     
                    用户名：<input type="text" name="username" id="username" value="2601917">                 
                    密码：<input type="password" name="password" id="password" value="2601917">                 
                    <a data-role="button" data-ajax="false" id = "btnLogin">登录</a>     
                    <a data-role="button" href="javascript:location.href='register.php'" data-ajax="false" id = "btnLogin">注册</a>     
                </form>
            </div>
            <div data-role="footer" data-position="fixed" id="footer">
                <h1>Copy Right By MinMax-SRS</h1>
            </div>
        </div>
    </body>
</html>
