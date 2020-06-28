<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Assignment 4</title>
<link href="assets/css/style.css" rel="stylesheet" />
</head>
<style>
  .red{color:red;}
  .lgtext{color:#470404; font-size:22px; color:green;}
  .nobos input[type="number"]{
     width:30%; border:#c8775d solid 1px, border-radius:10px; height:25px;padding:3px; border-radius: 5px;
  }

  .nobos input[type="text"]{
     width:30%; border:#c8775d solid 1px, border-radius:10px; height:25px;padding:3px; border-radius: 5px;
  }  


</style>
<body>
<form action="#" name="formone"  id="formone" method="post">   
  <table width="100%" border="0">
    <tr>
      <td colspan="2" style="text-align: center; color:#ff5e14;"><h1>Assignment 4</h1></td>
    </tr>
    <tr>
      <td>Result</td>
      <td id="result" class="lgtext"></td>
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
      <td width="15%">Please Enter the number of array elements using a (,)comma: </td>
      <td width="85%" class="nobos">
        <input type="text" name="arrayelements" id="arrayelements" placeholder="Enter nos of elements arrays not more than 5 using a , and should be a numeric" class=""><br>
        <span class="red" id="arrayprb"></span>
        
      </td>
    </tr>
    <tr>
      <td colspan="2" id="inputfill">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submitbtn" id="submitbtn" value="Submit"></td>
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