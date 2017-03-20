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

function getUrlParam(name){
      var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
      var r = window.location.search.substr(1).match(reg);
      if (r!=null) return unescape(r[2]);
      return null;
}