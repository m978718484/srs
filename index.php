<?
require('header.php');
?>
<div data-role="page" id="home" data-theme="b">
    <div data-role="header" data-position="fixed">
        <a href="login.php" class="ui-btn ui-corner-all ui-shadow ui-icon-arrow-l ui-btn-icon-left">登出</a>
        <h1>公告动态</h1>
        <a href="search.php" class="ui-btn ui-corner-all ui-shadow ui-icon-search ui-btn-icon-left">搜索</a>
    </div>
    <div data-role="content">
        <ul data-role="listview">
            <li data-role="list-divider"></li>
            <li><a href="#detail">[龍華] 加工區A07棟1樓、3樓二處金加一廠零星改造工程</a></li>
            <li><a href="#detail">[龍華] LH-D1棟4F屋面維修工程(二期工程）</a></li>
            <li><a href="#detail">[龍華] 龍華J4物流倉消防工程</a></li>
            <li><a href="#detail">[觀瀾] L07 1F 北二空調改造安裝工程 for Be/L07 1F 南一空調改造安裝工程 for Be</a></li>
            <li><a href="#detail">[鄭州] B05B06棟水裱維修更換</a></li>
            <li><a href="#detail">[鄭州] 濟源A01棟製造二處表面二廠基礎沖漿工程</a></li>
            <li><a href="#detail">[重慶] D05 D09配電房天棚防水整改工程</a></li>
            <li><a href="#detail">[重慶] 航空港區B02棟1樓車間下陷吊頂維修工程</a></li>
        </ul>
    </div>
    <div data-role="footer" data-position="fixed" id="footer">
        <h1>Copy Right By MinMax-SRS</h1>
    </div>
</div>
<div data-role="page" id="detail" data-theme="b">
    <div data-role="header" data-position="fixed">
        <a href="#home" class="ui-btn ui-corner-all ui-shadow ui-icon-home ui-btn-icon-left">主页</a>
        <h1>公告详情</h1>
    </div>
    <div data-role="footer" data-position="fixed" id="footer">
        <h1>Copy Right By MinMax-SRS</h1>
    </div>
</div>