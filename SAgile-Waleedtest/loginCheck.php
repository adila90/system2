<?php session_start();

include "Database.php";
$DataBase = new Database();

$User_Id=htmlentities($_POST['name'],ENT_QUOTES);
$User_Pass=$_POST['pass'];

$User_Id = stripslashes($User_Id);
$User_Pass = stripslashes($User_Pass);
$User_Id = mysql_real_escape_string($User_Id);
$User_Pass = mysql_real_escape_string($User_Pass);


$strQuery="SELECT * FROM users WHERE username='$User_Id' and password='$User_Pass'";

//echo "<hr>".$strQuery;

$DataBase->query($strQuery);

$count=$DataBase->get_num_rows();

//echo "<hr>".$count;exit;

if($count==1){
$Record = $DataBase->fetch_array();

 
session_start();
// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['loggedin'] = "YES";

$_SESSION['id'] =  $Record['PK_ID'] ;
$_SESSION['name'] =  $Record['username'] ;
$_SESSION['role'] =  $Record['role'] ;
$_SESSION['pass'] = $Record['password'] ;
@header("location:main.php");
}
else {
  
}

?>