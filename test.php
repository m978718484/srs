<?
  require('header.php');
?>
<script type="text/javascript">
    $(document).ready(function(){  
        console.log('xxxxxxxxx');
         $.ajax({
                type:'POST',
                data:{function:"getVipLogin"},
                url:'common.php',
                success: function (result) {
                    console.log(result);
                },
                error: function (request,error) {
                   console.log(error);
                }
        }); 
      }); 
</script>