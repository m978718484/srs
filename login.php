<?
require('header.php');
?>
<div data-role="page" id="home" data-theme="b">
    <div data-role="header" data-position="fixed">
        <h1>个人登录</h1>
    </div>
    <div data-role="content" id="homeContent">
        <label for="username">用户名：</label>
        <input type="text" id="username" placeholder="请输入用户名" />
        <label for="userpassword">密码：</label>
        <input type="password" id="password" placeholder="请输入密码 " />
       <a href="index.php" data-role="button" id = "btnLogin" enable="false">登陆</a> 
    </div>
    <div data-role="footer" data-position="fixed" id="footer">
        <h1>Copy Right By MinMax-SRS</h1>
    </div>
</div>