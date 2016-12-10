    <?
        require('header.php');
    ?>
    <body>
    <script type="text/javascript">
    $(function(){
        //验证登陆
         $('#btnLogin').click(function(){checkLogin();return false;});
    });
    //验证登陆
    function checkLogin()
    {
        var username = $('#username').val();
        var password = $('#password').val();
        if (username==''){$('#username').focus();return false;}
        if (password==''){$('#password').focus();return false;} 
        $.ajax({
                type:'POST',
                data:{function:"getVipLogin",username:username,password:password},
                url:'common.php',
                // dataType: "json",
                success: function (result) {
                        if (result=="E0000") {
                            location.href = "search.php";
                        }
                },
                error: function (request,error) {
                   console.log(error);
                }
        }); 
    }
    </script>
     <div data-role="page" id="home">
            <div data-role="header" data-position="fixed" data-theme="b">
                <h1>个人登录</h1>
            </div>
            <div data-role="content" id="homeContent">
                <form action="index.php" method="get">     
                    用户名：<input type="text" name="username" id="username">                 
                    密码：<input type="password" name="password" id="password">                 
                    <a data-role="button" data-ajax="false" id = "btnLogin">登录</a>     
                    <a data-role="button" href="javascript:location.href='register.php'" data-ajax="false" id = "btnLogin">注册</a>     
                </form>
            </div>
            <div data-role="footer" data-position="fixed" id="footer" data-theme="b">
                <h1>Copy Right By MinMax-SRS</h1>
            </div>
        </div>
    </body>
