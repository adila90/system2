<?php 
session_start();

include "Database.php";
$DataBase = new Database();

 
$name=$_POST['name4'];
 
 $id=$_POST['hidden3'];
  $Pid=$_POST['hidden4'];
 
 


$strQuery="UPDATE version SET release_name = '$name' WHERE PK_ID = '$id'";;

//echo "<hr>".$strQuery;

$result=$DataBase->query($strQuery);
 
 

//echo "<hr>".$count;exit;

 if($result == true){
@header("location:main.php?page=manageVersions&proj=".$Pid);
 }
  

?>