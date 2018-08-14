<?php 
session_start();

include "Database.php";
$DataBase = new Database();

$User_Id= $_SESSION['id'];
$name=$_POST['name'];
$p=$_POST['proj'];
$desc=$_POST['desc'];
 
$name = stripslashes($name);
$desc = stripslashes($desc);
 
$name = mysql_real_escape_string($name);
$desc = mysql_real_escape_string($desc);
 


$strQuery="insert into sub(FK_User_ID,name_sub,desc_sub,1st_time_date,FK_Proj_Id) values ('$User_Id','$name','$desc',Now(),'$p')";

//echo "<hr>".$strQuery;

$result=$DataBase->query($strQuery);
 
 

//echo "<hr>".$count;exit;

 if($result == true){
@header("location:main.php");
 }
  

?>