<?php 
session_start();

include "Database.php";
$DataBase = new Database();

 
$name=$_POST['name'];
 $pass=$_POST['pass'];
 
$name = stripslashes($name);
 
 
$name = mysql_real_escape_string($name);

$pass = stripslashes($pass);
 
 
$pass = mysql_real_escape_string($pass);
 $email=$_POST['email'];
 $role=$_POST['select5'];
  $Team=$_POST['select4'];
  $id=$_POST['hidden'];
 $strQuery="UPDATE users SET username = '$name',password='$pass',email = '$email',role='$role',FK_Team_ID='$Team' WHERE PK_ID = '$id'";
 
//echo "<hr>".$strQuery;

$result=$DataBase->query($strQuery);
 
 

//echo "<hr>".$count;exit;

 if($result == true){
@header("location:main.php?page=Team&Team=".$Team);
 }
  

?>