<!DOCTYPE html>
<html>
  <?
    require('header.php');
  ?>
  <body>
    <script type="text/javascript">
    $(document).on('pageinit', '#search', function(){   
      var mydate = new Date();
      var startdate = AddDays(mydate,0);
      var closeDate = AddDays(mydate,3);
       getData.getDataFn({functionname:'getListFilter',startdate:startdate,closeDate:closeDate});
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
           getData.getDataFn({functionname:'getListFilter',startdate:startdate,closeDate:closeDate});
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
                // $('#project-list').append('<li><a href="javascript:location.href=\'detail.php?bidno='+ obj.data[i].bidno +'\'">'+ '【' + obj.data[i].area + '】' + obj.data[i].projectName + '</a></li>');
                // <li data-icon="false"><a href="#"><p style="white-space:pre-wrap;" align="center">【龍華】航空港區A05棟1樓新制程新增消防設施工程/港區A03樓1樓西側碼頭治具倉新增煙感工程</p><p align="center">工程類型:零星工程  2012-02-25 21:37</p></a></li>
              var item = '<li>' + 
                          '<a href="javascript:location.href=\'detail.php?bidno='+ obj.data[i].bidno +'\'">' +
                            '<table width="100%"" border="0"><tr>' +
                              '<td class="body">' + 
                                '<div class="r_title">' +
                                  '<b>项目类型：'+ obj.data[i].categorycode + '</b> ' +
                                '</div>' +
                                '<div class="TextContent"><b>[' + obj.data[i].area + '] </b>' +
                                    obj.data[i].projectName +
                                '</div>' +
                                '<div class="opts">' +
                                '<b>开始时间：'+ obj.data[i].starttime + '</b> ' +
                                '</div>' +
                              '</td>' + 
                            '</tr></table></a></li>'


                $('#project-list').append(item);
            }
            $('#project-list').listview('refresh');




        }
    }

    </script>
    <div data-role="page" id="search" data-theme="b">
        <div data-role="header" data-position="fixed">
            <a href="javascript:location.href='login.php'" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left">退出</a>
            <h1>公告动态</h1>
            <a href="#advancedSearch" class="ui-btn ui-corner-all ui-shadow ui-icon-search ui-btn-icon-left">搜索</a>
        </div>
        <!-- <input type="search" name="search-project" id="search-project" placeholder="工程名" /> -->
        <div>
            <select name="timeselect" id="timeselect" data-native-menu="false">
               <option value="3">3天內</option>
               <option value="7">1周內</option>
               <option value="15">15天內</option>
               <option value="30">1个月內</option>
            </select>
        </div>
        <div data-role="content" data-theme="b">
            <div>
                <ul data-role="listview" id = "project-list">
                <li data-role="list-divider"></li>
                </ul>
            </div>
        </div>
	    <?
	        require('footer.php');
	    ?>
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

    <div data-role="page" id="advancedSearch" data-theme="b">
    <div data-role="header" data-position="fixed" >
        <a href="#search" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left">返回</a>
        <h1>高级搜索</h1>
    </div>
    <input type="search" name="search-project" id="search-project" placeholder="工程名" />
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
    <?
        require('footer.php');
    ?>
</div>

        <style type="text/css">
     .opts {text-align:right;}
     .opts b {text-decoration:none;font-size:8pt;color:#778899;}
     .r_title {font-size:8pt;color:#778899;}
     .TextContent {white-space:pre-wrap;margin-top:5px;font-size:11pt;}
  </style>
  </body>
</html>

