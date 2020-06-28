<?php
if(isset($_GET['pid']) && $_GET['pid']!=''){$pid=$_GET['pid'];}else{$pid='';}

switch ($pid) {
  case "ReverseString":

  $error=array();
  $sum=0;
  if(isset($_POST['string']) && $_POST['string']!=''){$str=$_POST['string'];}else{$str='';}
  
  if($str==''){
  	$error['emptystring']="Input String cannot be Empty!";
  }else{ $sum=$sum+1; }

  if(preg_match('/^[A-Za-z ! _-]*$/', $str)){
	$sum=$sum+1;
}else{$error['onlystr']="Please Enter only String No numbers"; }	

	
  if($sum!='2'){
	echo json_encode($error);  
  }else{
  	$ktm=array();
	$presult=ReverseString($str);
	$ktm['result']=$presult;
  	
  	echo json_encode($ktm);
  }	
  
  break;

  case "DecToBin":
  if(isset($_POST['decimal'])){$decimal=$_POST['decimal'];}else{$decimal='';}

  $error=array();
  $sum=0;
  $results=array();
  if($decimal==''){
  $error['decimalerror']="The field cannot be left Empty!";  
  }else{
    $sum=$sum+1;
  }

  if($sum=='1'){
    $func=DecimalToBinary($decimal);
    $func=$func."  Bin";  
    $results['results']=$func;  
    echo json_encode($results);
  }else{
    echo json_encode($error);
  }
  break;

  case "ArrayAddElements":
  
  $results=array();
  $sum=0;
  $totalsum=0;
  if(isset($_POST['arrayelements'])){$elements=$_POST['arrayelements'];}else{$elements='';}
  $exp_ele=explode(',',$elements);
  foreach($exp_ele as $ele){
    if (!is_numeric($ele)) {
    $sum=$sum+1;      
    }else{
      $totalsum=$totalsum+$ele;
    } 
  }// foreach ends here.

  if(!$sum>0){
    $results['result']=$totalsum;
  }else{
    $results['errors']="The array elements should be Numeric Only!";
  }

  echo json_encode($results);
  break;

  

  default:
   echo "Oopps no function found";
} // switch ends here.



function ReverseString($str){
$revstr=strrev($str);
return $revstr;			
} // Reverse String ends here.

function DecimalToBinary($decimal){
$binary=decbin($decimal);
return $binary;  
} // Decimal to Binary ends here.

?>