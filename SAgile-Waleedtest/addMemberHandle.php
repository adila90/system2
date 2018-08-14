<?php 
session_start();

include "Database.php";
$DataBase = new Database();

 $User_Id= $_SESSION['id'];
$name=$_POST['name'];
 $pass=$_POST['pass'];
 
$name = stripslashes($name);
 
 
$name = mysql_real_escape_string($name);

$pass = stripslashes($pass);
 
 
$pass = mysql_real_escape_string($pass);
 $email=$_POST['email'];
 $role=$_POST['select5'];
  $Team=$_POST['select4'];
 
$strQuery="insert into users (FK_User_ID,username,password,email,role,FK_Team_ID,1st_time_date) values ('$User_Id','$name','$pass','$email','$role',$Team,Now())";

//echo "<hr>".$strQuery;

$result=$DataBase->query($strQuery);
 
 

//echo "<hr>".$count;exit;

 if($result == true){
@header("location:main.php?page=Team&Team=".$Team);
 }
  

?>