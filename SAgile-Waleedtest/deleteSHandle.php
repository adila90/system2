<?php 
session_start();

include "Database.php";
$DataBase = new Database();

 
$name=$_POST['name5'];
 
 $Pid=$_POST['hidden5'];
  $Vid=$_POST['hidden6'];
  $Sid=$_POST['hidden7'];
 


$strQuery="delete from sprint WHERE PK_ID = '$Sid'";

//echo "<hr>".$strQuery;

$result=$DataBase->query($strQuery);
 
 

//echo "<hr>".$count;exit;

 if($result == true){
@header("location:main.php?page=manageSprints&proj=".$Pid."&Ver=".$Vid."&Spr=".$Sid);
 }
  

?>