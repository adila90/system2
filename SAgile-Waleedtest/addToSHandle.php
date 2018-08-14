<?php 
session_start();
include "Database.php"; 
$DataBase = new Database();

$User_Id= $_SESSION['id'];
  $sprint=$_POST['sp'];
    $proj=$_POST['sp2'];
 

 
 $strQuery="select * from sprint_story where FK_Sprint_ID =".$sprint; 
			     $DataBase->query($strQuery);
               $Rows = $DataBase->fetch_all();
			 
			   foreach($Rows as $Row){
 
                    $id= $Row['FK_Story_ID'];
					
                    $strQuery="update stories set addedToSprint='' where PK_ID=".$id; 
			     $DataBase->query($strQuery);
 
			   }	  
			   $strQuery="delete from sprint_story where FK_Sprint_ID =".$sprint; 
			    $result=$DataBase->query($strQuery);

 

 

       
          foreach ($_POST['Field2'] as $value) {
			  
			 $strQuery="insert into sprint_story (FK_User_ID,FK_Sprint_ID,FK_Story_ID,1st_time_date) values('$User_Id','$sprint','$value',Now())"; 
			 $result=$DataBase->query($strQuery);
			 $strQuery2="update stories set addedToSprint='yes' where PK_ID=".$value;
			  $result=$DataBase->query($strQuery2);
			  
            
          }
       if($result == true){
@header("location:main.php?page=Sbacklog&proj=".$proj."&Spr=".$sprint);
 }
   

?>