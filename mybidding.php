    <!DOCTYPE html>
    <html>
    <?
        require('header.php');
    ?>
    <body>
	<div data-role="page" id="page-title">  
        <div data-role="header" data-position="fixed" data-theme="b">
            <h1>我的标案</h1>
            <div data-role="tabs">  
	            <ul>  
	                <li><a href="#tab-1" class="">Tab 1</a></li>  
	                <li><a href="#tab-2" class="">Tab 2</a></li>  
	            </ul>  
       		</div>  
        </div>
		<div data-role="content">  
        <ul id="tab-1">  
            <li>First thing</li>  
            <li>Second Thing</li>  
        </ul>  
  
        <div id="tab-2">  
            <h2>Here is the second tab</h2>  
        </div>  
    </div>  
    <?
        require('footer.php');
    ?>
    </div>
    </body>