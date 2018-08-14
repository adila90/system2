<?php 
session_start();

include "Database.php";
$DataBase = new Database();

 
$name=$_POST['name6'];
 
 
  $Sid=$_POST['hidden9'];
 
 


$strQuery="UPDATE states SET name_state = '$name' WHERE PK_ID = '$Sid'";;

//echo "<hr>".$strQuery;

$result=$DataBase->query($strQuery);
 
 

//echo "<hr>".$count;exit;

 if($result == true){
@header("location:main.php?page=workflow");
 }
  

?>