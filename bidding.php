<!DOCTYPE html>
<html>
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
 <body>
<div data-role="page" id="page-title">  
    <div data-role="header" data-position="fixed" data-theme='b'>
            <h1>竞标室</h1>
            <a href="javascript:location.href='mybidding.php?p=1'" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left">返回</a>
	</div>
	    <div data-role="content" id="content">
			<div data-role="collapsible">
			    <h4>标案基本资料</h4>
			    <ul data-role="listview" id="listview"> 
			        <li> 
			            <div class="ui-grid-a"> 
			                <div class="ui-block-a">
			                    <span>标  号:</span>
			                </div>
			                <div class="ui-block-b">
			                    <a id="bidno">XSP201611230001</a> 
			                </div>
			            </div>
			        </li> 
			        <li> 
			            <div class="ui-grid-a"> 
			                <div class="ui-block-a">
			                    <span>工程名称:</span>
			                </div>
			                <div class="ui-block-b">
			                    <a id="projectName">竞标网供应商竞标平台系统测试</a> 
			                </div>
			            </div>
			        </li> 
			        <li> 
			            <div class="ui-grid-a"> 
			                <div class="ui-block-a">
			                    <span>客户报价:</span>
			                </div>
			                <div class="ui-block-b">
			                    <a id="area">3700.0</a> 
			                </div>
			            </div>
			        </li> 
			        <li> 
			            <div class="ui-grid-a"> 
			                <div class="ui-block-a">
			                    <span>每码幅度:</span>
			                </div>
			                <div class="ui-block-b">
			                    <a id="fudu">0.5%的整数倍</a> 
			                </div>
			            </div>
			        </li> 
			        <li> 
			            <div class="ui-grid-a"> 
			                <div class="ui-block-a">
			                    <span>每次最大降幅:</span>
			                </div>
			                <div class="ui-block-b">
			                    <a id="maxfudu">0.5%的0.0倍数</a> 
			                </div>
			            </div>
			        </li> 
			        <li> 
			            <div class="ui-grid-a"> 
			                <div class="ui-block-a">
			                    <span>币别:</span>
			                </div>
			                <div class="ui-block-b">
			                    <a id="currency">RMB</a> 
			                </div>
			            </div>
			        </li> 

			        <li> 
			            <div class="ui-grid-a"> 
			                <div class="ui-block-a">
			                    <span>招标部门:</span>
			                </div>
			                <div class="ui-block-b">
			                    <a id="bucode">Foxconn</a> 
			                </div>
			            </div>
			        </li> 
			        <li> 
			            <div class="ui-grid-a"> 
			                <div class="ui-block-a">
			                    <span>招标类別:</span>
			                </div>
			                <div class="ui-block-b">
			                    <a id="categorycode">工具类</a> 
			                </div>
			            </div>
			        </li> 
			        <li> 
			            <div class="ui-grid-a"> 
			                <div class="ui-block-a">
			                    <span>竞标方式:</span>
			                </div>
			                <div class="ui-block-b">
			                    <a id="wey">按供应商提供的初次报价竞标, 每次输入的降幅为百分比, 排名以累计降幅从大到小</a> 
			                </div>
			            </div>
			        </li> 
			        <li> 
			            <div class="ui-grid-a"> 
			                <div class="ui-block-a">
			                    <span>竞标类别:</span>
			                </div>
			                <div class="ui-block-b">
			                    <a id="wey">降价竞标</a> 
			                </div>
			            </div>
			        </li> 			                   
			    </ul> 
		    </div>
		    <div data-role="collapsible">
			    <h4>竞价时间</h4>
			    	<ul data-role="listview" id="listview"> 
			        <li> 
			            <div class="ui-grid-a"> 
			                <div class="ui-block-a">
			                    <span>开始时间:</span>
			                </div>
			                <div class="ui-block-b">
			                    <a id="starttime">2016-11-30 14:00:00</a> 
			                </div>
			            </div>
			        </li> 
			         <li> 
			            <div class="ui-grid-a"> 
			                <div class="ui-block-a">
			                    <span>结束时间:</span>
			                </div>
			                <div class="ui-block-b">
			                    <a id="closetime">2017-03-15 15:00:00</a> 
			                </div>
			            </div>
			        </li> 
			         <li> 
			            <div class="ui-grid-a"> 
			                <div class="ui-block-a">
			                    <span>剩余时间:</span>
			                </div>
			                <div class="ui-block-b">
			                    <a id="leavetime"><font color="red">1562:56:04</font></a> 
			                </div>
			            </div>
			        </li>                 
			    </ul> 
		    </div>
		    <div data-role="collapsible">
			    <h4>竞标价格</h4>
			    	<ul data-role="listview" id="listview"> 
			        <li> 
			            <div class="ui-grid-a"> 
			                <div class="ui-block-a">
			                    <span>当前排名:</span>
			                </div>
			                <div class="ui-block-b">
			                    <a id="current-rate">1</a> 
			                </div>
			            </div>
			        </li> 
			         <li> 
			            <div class="ui-grid-a"> 
			                <div class="ui-block-a">
			                    <span>累积降幅:</span>
			                </div>
			                <div class="ui-block-b">
			                    <a id="ljjf">1</a> 
			                </div>
			            </div>
			        </li> 
			         <li> 
			            <div class="ui-grid-a"> 
			                <div class="ui-block-a">
			                    <span>最终金额:</span>
			                </div>
			                <div class="ui-block-b">
			                    <a id="final-pay">3237.50 (RMB) </a> 
			                </div>
			            </div>
			        </li>  
			        <li> 
			            <div class="ui-grid-a"> 
			                <div class="ui-block-a">
			                    <span>当前降价幅度:</span>
			                </div>
			                <div class="ui-block-b">
			                    <a id="leavetime">1</a> 
			                </div>
			            </div>
			        </li>    
			        <li> 
			            <div class="ui-grid-a"> 
			                <div class="ui-block-a">
			                    <span>降价幅度:</span>
			                </div>
			                <div class="ui-block-b">
			                  <span><input type="textbox" name="input"></span>
			                </div>
			            </div>
			        </li> 
			        <li> 
			            <a data-role="button">保 存</a>
			        </li> 
			    </ul> 
		    </div>
		    <div data-role="collapsible" class="info_main">
			    <h4>竞标情况</h4>
			    <div data-role="navbar">
		          <ul>
		            <li style="width:35px">排名</li>
		            <li style="width:70px;">降价幅度</li>
		            <li style="width:150px;">竞价时间</li>
		          </ul>
		        </div>
		       <div data-role="navbar">
		          <ul>
		            <li style="width:35px;">2</li>
		            <li style="width:60px;">10%</li>
		            <li style="width:150px;">2015-10-20 10:30:25</li>
		          </ul>
		        </div>
		       <div data-role="navbar">
		          <ul>
		            <li style="width:35px">2</li>
		            <li style="width:70px;">10.3%</li>
		            <li style="width:150px;">2015-10-20 10:30:25</li>
		          </ul>
		        </div>
		       <div data-role="navbar">
		          <ul>
		            <li style="width:35px">2</li>
		            <li style="width:70px;">10%</li>
		            <li style="width:150px;">2015-10-20 10:30:25</li>
		          </ul>
		        </div>
		    </div>
	    </div>
	<a data-role="button">投	标</a>

	<?php
    require('footer.php');
?>

</div>


</body>
</html>