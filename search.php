<!DOCTYPE html>
<html>
  <head>
    <?
      require('header.php');
    ?>
  </head>
  <body>
    <script type="text/javascript">
    $(document).on('pageinit', '#search', function(){   
        getData.getDataFn({function:"getListDefault"});
    });

    $(document).ready(function(){  
      $('#timeselect').change(function(){ 
        var p1=$(this).children('option:selected').val();
        // var p2=$('#param2').val();
        $('#project-list').empty();
        $('#project-list').listview('refresh');
           var mydate = new Date();
           var startdate = AddDays(mydate,0);
           var closeDate = AddDays(mydate,parseInt(p1));
           console.log(startdate);
           console.log(closeDate);
           getData.getDataFn({function:'getListFilter',startdate:startdate,closeDate:closeDate});
        });  
      }); 

    function AddDays(date,days){
       var nd = new Date(date);
       nd = nd.valueOf();
       nd = nd + days * 24 * 60 * 60 * 1000;
       nd = new Date(nd);
       var y = nd.getFullYear();
       var m = nd.getMonth()+1;
       var d = nd.getDate();
       if(m <= 9) m = "0"+m;
       if(d <= 9) d = "0"+d; 
       var cdate = y + "-" + m + "-" + d;
       return cdate;
      }

    var getData={
      getDataFn:function (jsonPara) {
          $.ajax({
              type:'GET',
              data:jsonPara,
              url:'common.php',
              dataType: "json",
              success: function (result) {
                // console.log(result);
                ajax.parseJSON(result);
              },
              error: function (request,error) {
                  console.log(error)
                  // alert(error);
              }
          }); 
      }
    }

    var ajax = {  
        parseJSON:function(result){  
           var obj = jQuery.parseJSON(result);
            $('#project-list').empty();
            console.log(obj.total);
           for (var i = obj.data.length - 1; i >= 0; i--) {
                $('#project-list').append('<li><a href="javascript:location.href=\'detail.php?bidno='+ obj.data[i].bidno +'\'">'+ '【' + obj.data[i].area + '】' + obj.data[i].projectName + '</a></li>');
            }
            $('#project-list').listview('refresh');
        }
    }

    </script>
    <div data-role="page" id="search" >
        <div data-role="header" data-position="fixed" data-theme="b">
            <a href="login.php" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left">退出</a>
            <h1>公告动态</h1>
        </div>
        <!-- <input type="search" name="search-project" id="search-project" placeholder="工程名" /> -->
        <select name="timeselect" id="timeselect" data-native-menu="false">
           <option value="3">3天內</option>
           <option value="7">1周內</option>
           <option value="15">15天內</option>
           <option value="30">1個月內</option>
        </select>
<!--          <div class="ui-grid-c">
              <div class="ui-block-a">
                <select id="a" data-role="none">
                     <option value="1">地区</option>
                </select>
              </div>
              <div class="ui-block-b">
                <select id="b" data-role="none">
                     <option value="2">类别</option>
                </select>
              </div>
              <div class="ui-block-c">
                <select id="c" data-role="none">
                    <option value="3">范围</option>
                </select>
              </div>
              <div class="ui-block-d">
                <select id="d" data-role="none">
                    <option value="4">时间</option>
                </select>
              </div>  
          </div> -->
        <div data-role="content">
            <div>
                <ul data-role="listview" id = "project-list">
                <li data-role="list-divider"></li>
                </ul>
            </div>
        </div>
        <div data-role="footer" data-position="fixed" id="footer" data-theme="b">
            <h1>Copy Right By MinMax-SRS</h1>
        </div>
        <!-- <div data-role="footer" data-position="fixed" id="footer" data-theme="b">
                <div data-role="navbar">
                  <ul>
                    <li><a href="#">公告动态</a></li>
                    <li><a href="#">招标信息</a></li>
                    <li><a href="#">我要投标</a></li>
                    <li><a href="#">我参与的</a></li>
                  </ul>
                </div>
        </div> -->
    </div>
  </body>
</html>

