<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Assignment 4</title>
<link href="assets/css/style.css" rel="stylesheet" />
</head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}

.active {
  background-color: red;
}
</style>
<body>
<form action="#" name="formone"  id="formone" method="post">   
  <table width="100%" border="0">
    <tr>
      <td colspan="2" style="text-align: center; color:#ff5e14;"><h1>Assignment 5</h1></td>
    </tr>
    <tr>
      <td colspan=2>
          <ul>
            <li><a href="#">Why Us</a></li>
            <li><a href="#">Princing</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="#" class="active">Register</a></li>
          </ul>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
  </table>
</form>
</body>
</html>
<script src="assets/js/jquery.js" type="application/javascript"></script>

<script>
  $(document).ready(function(){
    $('#formone').submit(function(e){
      e.preventDefault();
      var arbot=$('#arrayelements').val();
      var arelems='arrayelements='+arbot;


      $.ajax({
        type      :   'POST',
        url       :    'Fileprocessing.php?pid=ArrayAddElements',
        data        :  arelems,
        processData :  false,
        ContentType:   false,
        success     :  function(event){
                       //alert(event);
                       var obj = jQuery.parseJSON(event);
                       if(obj.errors=="The array elements should be Numeric Only!")                         
                       {$('#arrayprb').html(obj.errors); $('#result').html(); }else{$('#arrayprb').html(''); $('#result').html('The total sum of the elements is '+obj.result); } 

                    } // function ends here.
        
      }); // ajax ends here

    }); // ends here.

  }); // fun ends here.



</script>