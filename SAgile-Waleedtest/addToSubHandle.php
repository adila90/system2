<?php 
session_start();
include "Database.php"; 
$DataBase = new Database();

$User_Id= $_SESSION['id'];
  $sub=$_POST['sub'];
    $proj=$_POST['projId'];
 

//echo "<hr>".$strQuery;


 
 

//echo "<hr>".$count;exit;

 $strQuery="select * from sub_story where FK_Sub_ID =".$sub; 
			     $DataBase->query($strQuery);
               $Rows = $DataBase->fetch_all();
			 
			   foreach($Rows as $Row){
 
                    $id= $Row['FK_Story_ID'];
					
                    $strQuery="update stories set addedToSub='' where PK_ID=".$id; 
			     $DataBase->query($strQuery);
 
			   }	  
			   $strQuery="delete from sub_story where FK_Sub_ID =".$sub; 
			    $result=$DataBase->query($strQuery);

 

       
          foreach ($_POST['Field2'] as $value) {
		  
		  
				
			 $strQuery="insert into sub_story (FK_User_ID,FK_Sub_ID,FK_Story_ID,1st_time_date) values('$User_Id','$sub','$value',Now())"; 
			 $result=$DataBase->query($strQuery);
			 $strQuery2="update stories set addedToSub='yes' where PK_ID=".$value;
			  $result=$DataBase->query($strQuery2);
			  
            
          }
       if($result == true){
@header("location:main.php?page=Subbacklog&proj=".$proj."&Sub=".$sub);
 }
   

?>