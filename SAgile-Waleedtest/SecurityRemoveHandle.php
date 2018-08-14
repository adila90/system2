<?php 
session_start();

include "Database.php";
$DataBase = new Database();

 $User_Id= $_SESSION['id'];
$story=$_POST['story'];
$comment=$_POST['Scomment'];
$project=$_POST['project'];
 


$strQuery="update stories set AddedToSecurity=1 where PK_ID=".$story;

 

$result=$DataBase->query($strQuery);
 
 
 
 

 $strQuery="Delete From  feature_story where FK_Story_ID='$story'"; 
			  $result=$DataBase->query($strQuery);
 
 
  
          
         $strQuery2="update stories set addedToSecurity= 0,SecurityComment='' where PK_ID='$story'";
			  $result=$DataBase->query($strQuery2);

 

 if($result == true){
@header("location:main.php?page=Secbacklog");
 }
  

?>