<?php 
session_start();

include "Database.php";
$DataBase = new Database();

 
$name=$_POST['name2'];
 
 $id=$_POST['hidden'];
 
 


$strQuery="UPDATE teams SET Team_name = '$name' WHERE PK_ID = '$id'";;

//echo "<hr>".$strQuery;

$result=$DataBase->query($strQuery);
 
 

//echo "<hr>".$count;exit;

 if($result == true){
@header("location:main.php?page=Teams");
 }
  

?>