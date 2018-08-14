<?php 
session_start();

include "Database.php";
$DataBase = new Database();

$User_Id= $_SESSION['id'];
$name=$_POST['name'];
$desc=$_POST['desc'];
 $sDate=$_POST['date5'];
 
$FinishDate=$_POST['date7'];

$name = stripslashes($name);
$desc = stripslashes($desc);
 
$name = mysql_real_escape_string($name);
$desc = mysql_real_escape_string($desc);
 


$strQuery="insert into project (FK_User_ID,name_Proj,desc_proj,1st_time_date,Start_Date,completion_date) values ('$User_Id','$name','$desc',Now(),'$sDate','$FinishDate')";

//echo "<hr>".$strQuery;

$result=$DataBase->query($strQuery);
 
 

//echo "<hr>".$count;exit;

 if($result == true){
@header("location:main.php");
 }
  

?>