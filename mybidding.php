    <!DOCTYPE html>
    <html>
    <?php
        require('header.php');
    ?>
    <style type="text/css">
     .opts {text-align:right;}
     .opts b {text-decoration:none;font-size:8pt;color:#778899;}
     .r_title {font-size:8pt;color:#778899;}
     .TextContent {white-space:pre-wrap;margin-top:5px;font-size:11pt;}
  </style>
    <script type="text/javascript">
     $(document).on('pageinit', '#page-mybid', function(){   
        var p = getUrlParam('p');
        myEnrolled(p);
    });

      function getMyDate(diff)
      {
        var mydate = new Date();
        return AddDays(mydate,diff);
      }
      $(document).ready(function(){  
        $('#myEnrolled').click(function(){
          myEnrolled(1);
          return false;
        });
        $('#myEnrolledHistory').click(function(){
          myEnrolledHistory(1);
          return false;
        });
      }); 

       function myEnrolled(p)
       {  
           var para= {functionname:'getMyBid',startdate:getMyDate(0),closedate:getMyDate(365),page:p};
           getData.getDataFn(para,$('#project-list'),true);
       }
       function myEnrolledHistory(p)
       {
          getData.getDataFn({functionname:'getMyBid',closedate:getMyDate(0),startdate:getMyDate(-365),page:p},$('#project-list-history'),false);
       }

    var getData={
      getDataFn:function (jsonPara,e,unbidded) {
          $.ajax({
              type:'GET',
              data:jsonPara,
              url:'common.php',
              dataType: "json",
              success: function (result) {
                // console.log(result);
                ajax.parseJSON(result,e,unbidded);
              },
              error: function (request,error) {
                location.href = "login.php";
                console.log(error);
                  // alert(error);
              }
          }); 
      }
    }

    var ajax = {  
        parseJSON:function(result,e,unbidded){  
           // debugger;
           var obj = jQuery.parseJSON(result);
           var url = '';
           if (unbidded) {
              url = '<a href="javascript:location.href=\'bidding.html?bidno='
           }
           else{
              url = '<a href="javascript:location.href=\'detail.php?bidno='
           }
           e.empty();
           for (var i = obj.data.length - 1; i >= 0; i--) {
              var item = '<li>' + 
                          url + obj.data[i].bidno +'\'">' +
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
                e.append(item);
            }
            var pre_page = obj.page - 1;
            var next_page = obj.page + 1;
            var total_page = Math.ceil(obj.total/obj.size);
            $('#displayPage').empty();
            if (obj.page>1) {
                if (unbidded) {
                  $('#displayPage').append('<a onclick="myEnrolled('+pre_page+');" class="ui-btn ui-btn-inline">上一页</a>');
                }
                else{
                  $('#displayPage').append('<a onclick="myEnrolledHistory('+pre_page+');" class="ui-btn ui-btn-inline">上一页</a>');
                }
            }
            if (next_page<=total_page) {
               if (unbidded) {
                  $('#displayPage').append('<button onclick="myEnrolled('+next_page+');" class="ui-btn ui-btn-inline">下一页</button>');
                }
                else{
                  $('#displayPage').append('<a onclick="myEnrolledHistory('+next_page+');" class="ui-btn ui-btn-inline">下一页</a>');
                }
                
            }
            $('#displayPage').append(obj.page+'/'+total_page);

            e.listview('refresh');
        }
    }

    </script>    
    <body>
	<div data-role="page" id="page-mybid">  
    <div data-role="header" data-position="fixed" data-theme='b'>
            <h1>我的标案</h1>
    </div>
    <div  data-role="content">
        <div data-role="tabs" id="tabs">    
        <div data-role="navbar"> 
          <ul> 
            <li><a id="myEnrolled" href="#tab-1" class="ui-btn-active">未竞标</a></li> 
            <li><a id="myEnrolledHistory" href="#tab-2">历史竞标</a></li> 
          </ul> 
        </div>
          <div id="tab-1" class="ui-body-d ui-content">
              <div>
                  <ul data-role="listview" id = "project-list">
                  </ul>
              </div>
              <hr/>
          </div> 
          <div id="tab-2" class="ui-body-d ui-content">
            <div>
             <div>
                  <ul data-role="listview" id = "project-list-history">
                  </ul>
              </div>
            </div>
          </div> 
          <div id="displayPage"></div>
        </div>
    </div>
    <?php
        require('footer.php');
    ?>
    </body>