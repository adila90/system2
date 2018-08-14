<?php 
session_start();

include "Database.php";
$DataBase = new Database();


 
 $id=$_POST['hidden'];
 $Team=$_POST['hidden2'];
 


$strQuery="delete from users WHERE PK_ID =".$id;

 
 
$result=$DataBase->query($strQuery);

 

 

 if($result == true){
@header("location:main.php?page=Team&Team=".$Team);
 }
  

?>