<?
    require('header.php');
?>
<body>
    <div data-role="page" id="home" data-theme="b">
        <div data-role="header" data-position="fixed">
            <h1>个人登录</h1>
        </div>
        <div data-role="content" id="homeContent">
            <form id="callAjaxForm" method="post" action="phpcallapi.php"> 
                <div data-role="fieldcontain">   
                    <label for="username">用户名：</label>
                    <input type="text" id="username" placeholder="请输入用户名" />
                    <label for="userpassword">密码：</label>
                    <input type="password" id="password" placeholder="请输入密码 " />
                   <button data-theme="b" id="submit" type="submit">登陆</button>  
                </div> 
            </form>
        </div>
        <div data-role="footer" data-position="fixed" id="footer">
            <h1>Copy Right By MinMax-SRS</h1>
        </div>
    </div>
</body>