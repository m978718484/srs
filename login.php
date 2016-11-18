<?
    require('header.php');
?>

<body>
    <div data-role="page" id="home" data-theme="b">
        <div data-role="header" data-position="fixed">
            <h1>个人登录</h1>
        </div>
        <div data-role="content" id="homeContent">
            <form action="index.php" method="post">     
                用户名：<input type="text" name="username">                 
                密码：<input type="password" name="password">                 
                <a data-role="button" href="javascript:location.href='index.php'" data-ajax="false" id = "btnLogin">登陆</a>     
            </form>
        </div>
        <div data-role="footer" data-position="fixed" id="footer">
            <h1>Copy Right By MinMax-SRS</h1>
        </div>
    </div>
</body>