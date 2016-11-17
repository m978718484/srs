<?
require('header.php');
?>
<div data-role="page" id="search" >
    <div data-role="header" data-position="fixed" data-theme="b">
        <a href="index.php" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left">返回</a>
        <h1>高级搜索</h1>
    </div>
    <input type="search" name="search-restaurants" id="search-restaurants" placeholder="工程名" />
     <div class="ui-grid-c">
          <div class="ui-block-a">
            <select id="a" data-role="none">
                 <option value="mon">地区</option>
            </select>
          </div>
          <div class="ui-block-b">
            <select id="b" data-role="none">
                 <option value="mon">类别</option>
            </select>
          </div>
          <div class="ui-block-c">
            <select id="c" data-role="none">
                <option value="mon">范围</option>
            </select>
          </div>
          <div class="ui-block-d">
            <select id="d" data-role="none">
                <option value="mon">时间</option>
            </select>
          </div>  
    </div>
    <div data-role="footer" data-position="fixed" id="footer" data-theme="b">
        <h1>Copy Right By MinMax-SRS</h1>
    </div>
</div>

<div data-role="page" id="Detail" data-theme="b">
    <h1>I'm the detail!</h1>
</div>