<!DOCTYPE html>
<html>
<head>
    <?
        require('header.php');
    ?>
</head>
<body>
    <script type="text/javascript">
    $(document).on('pageinit', '#home', function(){   
       $.ajax({
            type:'GET',
            data:{function:"getList"},
            url:'common.php',
            dataType: "json",
            success: function (result) {
                ajax.parseJSON(result);
            },
            error: function (request,error) {
                alert('Network error has occurred please try againxxxx!');
            }
        }); 
    });
    var ajax = {  
        parseJSON:function(result){  
           var obj = jQuery.parseJSON(result);
            $('#project-list').empty();
           for (var i = obj.data.length - 1; i >= 0; i--) {
                $('#project-list').append('<li><a href="javascript:location.href=\'detail.php?bidno='+ obj.data[i].bidno +'\'">'+obj.data[i].projectName+ '</a></li>');
            }

            $('ul').listview('refresh');
        }
    }
    </script>
    <div data-role="page" id="home" data-theme="b">
        <div data-role="header" data-position="fixed">
            <a href="login.php" class="ui-btn ui-corner-all ui-shadow ui-icon-arrow-l ui-btn-icon-left">登出</a>
            <h1>公告动态</h1>
            <a href="search.php" class="ui-btn ui-corner-all ui-shadow ui-icon-search ui-btn-icon-left">搜索</a>
        </div>
        <div data-role="content">
            <div>
                <ul data-role="listview" id = "project-list">
                <li data-role="list-divider"></li>
            </ul>
            </div>
        </div>
        <div data-role="footer" data-position="fixed" id="footer">
            <h1>Copy Right By MinMax-SRS</h1>
        </div>
    </div>
</body>
</html>

