<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
 <tr>
       
  <div id="stylized" class="myform2"  >
  <form id="form" name="form" method="post" action="SecurityHandle.php?Dev=<? echo $Dev ?>">
  
  <h1 style="text-align:left" >View: User Story</h1>
  </br>
  
 
 <input name="story" style="display:none" value="<? echo $story ?> " />
 <input name="project" style="display:none" value="<? echo $projId ?> " />
 <textarea disabled readonly="readonly" style="font-weight:bold;background-color: #E5E5E5;color:#000;padding-top:30px;padding-left:5px;width:100%;font-size:20px;" placeholder="Title" type="text" name="title" id="title" ><?php
  $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_story'];
			 
              $id= $Row['PK_ID'];
               echo($id.'|'.$name);

			   }
			   ?>
</textarea>

 
 </br>
  </br>

<label  style="font-size:14px;float:left;text-align:left;font-weight:normal;display:inline;" for="select4" > Project </label>

<span style="font-size:12px;float:left" >
    
   <?php
			
		 
             $DataBase = new Database();
             $strQuery4='select * from project where PK_ID='.$projId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_Proj'];
			  $desc= $Row['desc_proj'];
              $id= $Row['PK_ID'];
               echo($name);

			   }
			   
			    
			?>
 </span> 
 
 <span style="font-size:12px;float:right;width:30%;text-align:center" >
    
   <?php
			
		 
             $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $flowId= $Row['Workflow'];
			 
            }
			
			$strQuery4='select * from states where PK_ID='.$flowId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $flow= $Row['name_state'];
			 
            }
			
			
               echo($flow);
			   echo('<input name="flow" style="display:none" value="');
			   echo $flow;
			   echo('" />');
			   

			   
			   
			    
			?>
 </span> 
   
 <label  style="float:right;text-align:left;font-weight:normal;display:inline;"   > Workflow Step </label>
<br />
 <br />
     
 <label  style="font-size:14px;float:left;text-align:left;font-weight:normal;display:inline;"  > Release </label>
   <span style="font-size:12px;float:left" >
    
   <?php
			
		 
             $DataBase = new Database();
             $strQuery4='SELECT
version.release_name
FROM
version ,
sprint ,
sprint_story ,
stories
WHERE
version.PK_ID = sprint.FK_Version_ID AND
sprint.PK_ID = sprint_story.FK_Sprint_ID AND
sprint_story.FK_Story_ID ='.$story.'
LIMIT 1';

			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			    if($Rows != null)
				{
			   foreach($Rows as $Row){

              $release= $Row['release_name'];
			 
            
               echo($release);

			   }
			   
			   }
			   else
			   {
			   echo("not assigned yet");
			   }
			   
			    
			?>
 </span> 
 
 
 
 
 <span style="font-size:12px;float:right;width:30%;text-align:center;margin-left:48px;" >
    
   <?php
			
		 
             $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $sDate= $Row['Start_Date'];
			 
            
               echo($sDate);

			   }
			   
			    
			?>
 </span> 
  
 
 <label style="float:right" for="cal" >Start Date : </label>  
<br />

<br />
  
 


 
       
   <span style="font-size:12px;float:right;width:30%;text-align:center;margin-left:10px;" >
    
   <?php
			
		 
             $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $sDate= $Row['completion_date'];
			 
            
               echo($sDate);

			   }
			   
			    
			?>
 </span> 
             <label style="float:right" >Completion Date : </label>  
       
              
 
 
<label  style="float:left;text-align:left;font-weight:normal;" for="select9" > Requested By </label>
 <span style="font-size:12px;float:left;text-align:center" >
    
   <?php
			
		 
             $DataBase = new Database();
               $strQuery4='SELECT users.username FROM stories ,users WHERE stories.Requested_by = users.PK_ID AND stories.PK_ID ='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   if($Rows != null)
			   {
			   foreach($Rows as $Row){

              $Requested= $Row['username'];
			 
            
               echo($Requested);
               
			   }
			   }
			   else{
			   echo("not assigned yet");
			   }
			   
			    
			?>
 </span> 
 <br />
 <br  />
<label  style="float:left;text-align:left;font-weight:normal;display:inline;" for="select7" > Team </label>
  <span style="font-size:12px;float:left;text-align:center" >
    
   <?php
			
		 
             $DataBase = new Database();
           $strQuery4='SELECT teams.Team_name FROM stories ,teams WHERE stories.FK_Team_ID = teams.PK_ID AND stories.PK_ID ='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   if($Rows != null)
			   {
			   
			   foreach($Rows as $Row){

              $Team= $Row['Team_name'];
			 
            
               echo($Team);

			   }
			   }
			   else
			   {
			   echo("not assigned yet");
			   }
			   
			    
			?>
 </span> 
   

    <span style="font-size:12px;float:right;text-align:center;width:30%;" >
     <?php
			
		 
             $DataBase = new Database();
               $strQuery4='SELECT users.username,users.PK_ID FROM stories ,users WHERE stories.assigned_to_tester = users.PK_ID AND stories.PK_ID ='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   if($Rows != null)
			   {
			   foreach($Rows as $Row){

              $Tester= $Row['username'];
			   $TesterId= $Row['PK_ID'];
            
               echo($Tester);
			   echo('<input name="Tester" style="display:none" value="');
			   echo $TesterId;
			   echo('" />');

			   }
			   }
			   else
			   {
			   echo("not assigned yet");
			   }
			   
			    
			?>
    </span>
 <label  style="float:right;text-align:left;font-weight:normal;"  > Assigned To Tester</label>
 
 <br />
<br />
<label  style="float:left;text-align:left;font-weight:normal;display:inline;" for="select7" > Priority </label>
  <span style="font-size:12px;float:left;text-align:center" >
    
   <?php
			
		 
             $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $prio= $Row['prio_story'];
			 
            
               echo($prio);

			   }
			   
			    
			?>
 </span> 
   

    <span style="font-size:12px;float:right;text-align:center;width:30%;" >
     <?php
			
		 
             $DataBase = new Database();
               $strQuery4='SELECT users.username,users.PK_ID  FROM stories ,users WHERE stories.assigned_to = users.PK_ID AND stories.PK_ID ='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   if($Rows != null)
			   {
			   
			   foreach($Rows as $Row){

              $Dev= $Row['username'];
			  $DevId= $Row['PK_ID'];
            
               echo($Dev);
			    
			   echo('<input name="Dev" style="display:none" value="');
			   echo $DevId;
			   echo('" />');

			   }
			   }
			   else
			   {
			   echo("not assigned yet");
			   }
			   
			    
			?>
    </span>
 <label  style="float:right;text-align:left;font-weight:normal;"  > Assigned To </label>
 
 <br />
<br />
 <label  style="float:left;text-align:left;font-weight:normal;" for="select9" > Remaining Estimate </label>
 <span style="font-size:12px;float:left;text-align:center" >
    
   <?php
			
		 
             $DataBase = new Database();
               $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $remain= $Row['remain_Es'];
			  
			  $type= $Row['Es_Type'];
			 
               $date= $Row['1st_time_date'];	 
				 
   
date_default_timezone_set('Asia/Singapore');
 
 $date1 = new DateTime();
 
$date2 = new DateTime($date);
$diff = $date1->diff($date2);
if($type == 'Mins')
			{
	             
				 
				$value=$diff->i- $remain;
		      
		        if($diff->h != 0 || $diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('0 '.$type);
				 
				}
				else if($value > 0)
				{
				echo('0 '.$type);
				 
				}
				else
				{
					$value=abs($value);
					
				echo($value.' '.$type);
					 
					 
				}
			}
			 if($type == 'Hrs')
			{
				
				 
		     
		
				$value=$diff->h- $remain;
				 
			     if($diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
			    echo('0 '.$type);
				 
				}
			   else if($value > 0)
				{
				echo('0 '.$type);
				 
				}
				else if($value==-1)
				{	 
			 
					$type="Mins";
					$value=60-$diff->i;
				 
				   echo($value.' '.$type);
				}
				 else
				{			
				 
					$value=abs($value);
					 
				   echo($value.' '.$type);
				}
			}
			if($type == 'days')
			{
		
				$value=$diff->d- $remain;
				 
				if($diff->m != 0 || $diff->y != 0 )
				{
			echo('0 '.$type);
				 
				}				
				else if($value > 0)
				{
				echo('0 '.$type);
				 
				}
				else if($value==-1)
				{
			    
					  
					$type="Hrs";
					 
					$value=24-$diff->h;
				 				
					if ($value==1)
					{
					 
						$type="Mins";
					    $value=60-$diff->i;
						echo($value.' '.$type);
					}
					else
					{
				  echo($value.' '.$type);
					}
				}
				 else
				{			
				 
					
				    $value=abs($value);
				   echo($value.' '.$type);
				}
			}
			
			if($type == 'months')
			{
				$value=$diff->m- $remain;
				if($diff->y != 0 )
				{
	           echo('0 '.$type);
				 
				}
				 else if($value > 0)
				{
				echo('0 '.$type);
				 
				}
				else if($value==-1)
				{
			        $type="days";
					$value=30-$diff->d;
					if($value==1)
					{		  
					$type="Hrs";
					 
					$value=24-$diff->h;
				 				
					if ($value==1)
					{
					 
						$type="Mins";
					    $value=60-$diff->i;
						echo($value.' '.$type);
					}
					else
					{
				    echo($value.' '.$type);
					}
					}
				else
				{
				echo($value.' '.$type);
				}
				}
				 else
				{			
				 
					$value=abs($value);
					 
				   echo($value.' '.$type);
				}
			}
			   }
			   
			    
			?>
 </span> 
   
  <span style="font-size:12px;float:right;text-align:center;width:30%;" >
     <?php
			
		 
             $DataBase = new Database();
               $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $org= $Row['original_Es'];
			  $orgType= $Row['Es_Type'];
			 
            
               echo($org.'   '.$orgType);

			   }
			   
			    
			?>
    </span>
 
<label style="float:right;text-align:left;" for="orginal"> Original Estimate </label>
<br />
<br />
<br />
 
 <textarea   disabled readonly="readonly" style="font-weight:bold;background-color: #E5E5E5;color:#000;padding-left:5px;width:100%;font-size:14px;" placeholder="No Description" type="text" name="description" id="description" ><?php
  $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $desc= $Row['desc_story'];
			 
  
               echo($desc);

			   }
			   ?>
</textarea>


<br />
 <br />
 
  <? if ($_SESSION['role'] == 'Project Manager')
{
echo('<h1 style="text-align:left" >Security Information</h1><br />');	
echo('<textarea readonly style="font-weight:bold;background-color: #E5E5E5;color:#000;padding-left:5px;height:100px;width:100%;font-size:15px;"  type="text"   >');
 
  $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $sec= $Row['SecurityComment'];
			 
  
               echo($sec);

			   }
			  
echo('</textarea>');
echo('<h5 style="text-align:left" >Security Features</h5><br />');
$DataBase = new Database();
             $strQuery4='select * from feature_story where FK_Story_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			 
			   foreach($Rows as $Row){
 
                    $FID[]= $Row['FK_Feature_ID'];
                    
 
			   }	  
	
 
 
 $strQuery4='select * from security_features' ;
	
$DataBase->query($strQuery4);
 $Rows = $DataBase->fetch_all();
 
   foreach($Rows as $Row){
$name= $Row['name_Feature'];
$id= $Row['PK_ID'];
 
  if($FID != null)
 {
 if (in_array($id, $FID)) {
echo('<input disabled="disabled" checked type="checkbox" value="'.$id.'" name="Field2[]" />');
echo('<label style="text-align:left;" for="'.$name.'">'.$name.'</label>');
 
}
else 
{
 
 
echo('<input disabled="disabled" type="checkbox" value="'.$id.'" name="Field2[]" />');
echo('<label style="text-align:left;" for="'.$name.'">'.$name.'</label>');
}
}
else
{
echo('<input disabled="disabled" type="checkbox" value="'.$id.'" name="Field2[]" />');
echo('<label style="text-align:left;" for="'.$name.'">'.$name.'</label>');
}
 

		echo('<br />');
		echo('<br />');
}
echo('<h1 style="text-align:left" >Development Information</h1><br />');	
echo('<textarea readonly style="font-weight:bold;background-color: #E5E5E5;color:#000;padding-left:5px;height:100px;width:100%;font-size:15px;"  type="text" >');
  $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $dev= $Row['Developer_Comment'];
			 
  
               echo($dev);

			   }
echo('</textarea>');		   
echo('<h1 style="text-align:left" >Testing Information</h1><br />');	
echo('<textarea readonly style="font-weight:bold;background-color: #E5E5E5;color:#000;padding-left:5px;height:100px;width:100%;font-size:15px;"  type="text" >');
  $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $dev= $Row['Tester_Comment'];
			   $buged= $Row['Bug_Found'];
  
               echo($dev);

			   }
echo('</textarea>');	
 echo('<br />');
 echo('<br />');
 
  echo('<label  style="margin-left:90px;text-align:left;font-weight:normal;display:inline;"> Bugs Found </label>');
 if($buged==1)
 {
 echo('<input checked disabled  style="margin-left:70px;"   type="checkbox" name="bug_found" value="1" />');
 }
 else
 {
 echo('<input  disabled  style="margin-left:70px;"   type="checkbox" name="bug_found" value="1" />');
 }
} 
 

?>

  <? if ($_SESSION['role'] == 'Security Master')
{
echo('<h1 style="text-align:left" >Security Information</h1><br />');	
echo('<textarea style="font-weight:bold;background-color: #E5E5E5;color:#000;padding-left:5px;height:100px;width:100%;font-size:15px;"  type="text" name="Scomment" id="Scomment" >');
 
  $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $sec= $Row['SecurityComment'];
			 
  
               echo($sec);

			   }
			  
echo('</textarea>');
echo('<h5 style="text-align:left" >Security Features</h5><br />');
$DataBase = new Database();
             $strQuery4='select * from feature_story where FK_Story_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			 
			   foreach($Rows as $Row){
 
                    $FID[]= $Row['FK_Feature_ID'];
                    
 
			   }	  
	
 
 
 $strQuery4='select * from security_features' ;
	
$DataBase->query($strQuery4);
 $Rows = $DataBase->fetch_all();
 
   foreach($Rows as $Row){
$name= $Row['name_Feature'];
$id= $Row['PK_ID'];
 if($FID != null)
 {
 if (in_array($id, $FID)) {
echo('<input checked type="checkbox" value="'.$id.'" name="Field2[]" />');
echo('<label style="text-align:left;" for="'.$name.'">'.$name.'</label>');
 
}
else 
{
 
 
echo('<input type="checkbox" value="'.$id.'" name="Field2[]" />');
echo('<label style="text-align:left;" for="'.$name.'">'.$name.'</label>');
}
 
 }
 else
 {
 echo('<input type="checkbox" value="'.$id.'" name="Field2[]" />');
 echo('<label style="text-align:left;" for="'.$name.'">'.$name.'</label>');
 }
 

		echo('<br />');
		echo('<br />');
}
echo('<h1 style="text-align:left" >Development Information</h1><br />');	
echo('<textarea readonly style="font-weight:bold;background-color: #E5E5E5;color:#000;padding-left:5px;height:100px;width:100%;font-size:15px;"  type="text"  >');
  $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $dev= $Row['Developer_Comment'];
			 
  
               echo($dev);

			   }
echo('</textarea>');	

echo('<h1 style="text-align:left" >Testing Information</h1><br />');	
echo('<textarea readonly style="font-weight:bold;background-color: #E5E5E5;color:#000;padding-left:5px;height:100px;width:100%;font-size:15px;"  type="text" >');
  $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $dev= $Row['Tester_Comment'];
			   $buged= $Row['Bug_Found'];
  
               echo($dev);

			   }
echo('</textarea>');	
 echo('<br />');
 echo('<br />');
 
  echo('<label  style="margin-left:90px;text-align:left;font-weight:normal;display:inline;"> Bugs Found </label>');
 if($buged==1)
 {
 echo('<input checked disabled  style="margin-left:70px;"   type="checkbox" name="bug_found" value="1" />');
 }
 else
 {
 echo('<input  disabled  style="margin-left:70px;"   type="checkbox" name="bug_found" value="1" />');
 }
        

			  
   

 
echo('<button style="float:right;"   type="submit">Add To Security BackLog </button>');
} 
 

?>

   <? if ($_SESSION['role'] == 'Developer')
{

echo('<h1 style="text-align:left" >Security Information</h1><br />');	
echo('<textarea readonly style="font-weight:bold;background-color: #E5E5E5;color:#000;padding-left:5px;height:100px;width:100%;font-size:15px;"  type="text" >');
 
  $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $sec= $Row['SecurityComment'];
			 
  
               echo($sec);

			   }
			  
echo('</textarea>');

echo('<h5 style="text-align:left" >Security Features</h5><br />');
$DataBase = new Database();
             $strQuery4='select * from feature_story where FK_Story_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			 
			   foreach($Rows as $Row){
 
                    $FID[]= $Row['FK_Feature_ID'];
                    
 
			   }	  
	
 
 
 $strQuery4='select * from security_features' ;
	
$DataBase->query($strQuery4);
 $Rows = $DataBase->fetch_all();
 
   foreach($Rows as $Row){
$name= $Row['name_Feature'];
$id= $Row['PK_ID'];
 
  if($FID != null)
 {
 if (in_array($id, $FID)) {
echo('<input disabled="disabled" checked type="checkbox" value="'.$id.'" name="Field2[]" />');
echo('<label style="text-align:left;" for="'.$name.'">'.$name.'</label>');
 
}
else 
{
 
 
echo('<input disabled="disabled" type="checkbox" value="'.$id.'" name="Field2[]" />');
echo('<label style="text-align:left;" for="'.$name.'">'.$name.'</label>');
}
}
else
{
echo('<input disabled="disabled" type="checkbox" value="'.$id.'" name="Field2[]" />');
echo('<label style="text-align:left;" for="'.$name.'">'.$name.'</label>');
}
 

		echo('<br />');
		echo('<br />');
}
 
echo('<h1 style="text-align:left" >Development Information</h1><br />');	
echo('<textarea style="font-weight:bold;background-color: #E5E5E5;color:#000;padding-left:5px;height:100px;width:100%;font-size:15px;"  type="text" name="Dcomment" id="Dcomment" >');
  $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $dev= $Row['Developer_Comment'];
			 
  
               echo($dev);

			   }
echo('</textarea><br /><br />');
 echo('<br />');
echo('<label  style="text-align:left;font-weight:normal;display:inline;" for="select5" > Workflow Step </label>');
echo('<select style="text-align:left;width:30%;" name="DState">');

  
  
             $DataBase = new Database();
             $strQuery4='select Workflow from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

               $workflow= $Row['Workflow'];
			   
			   }
			   $strQuery4='select * from states';
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_state'];
			  
              $id= $Row['PK_ID'];
			   
			  if($id==$workflow)
			  {
               echo('<option selected="selected" id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			  }
		       else
			   {
				    echo('<option  id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			   }

			   }
			   
   
 
 
 
 
  

echo('</select>');


 
 echo('<br /><br />');

 			   
echo('<h1 style="text-align:left" >Testing Information</h1><br />');	
echo('<textarea readonly style="font-weight:bold;background-color: #E5E5E5;color:#000;padding-left:5px;height:100px;width:100%;font-size:15px;"  type="text" >');
  $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $dev= $Row['Tester_Comment'];
			 
  
               $buged= $Row['Bug_Found'];
  
               echo($dev);

			   }
echo('</textarea>');	
 echo('<br />');
 echo('<br />');
 
  echo('<label  style="margin-left:90px;text-align:left;font-weight:normal;display:inline;"> Bugs Found </label>');
 if($buged==1)
 {
 echo('<input checked disabled  style="margin-left:70px;"   type="checkbox" name="bug_found" value="1" />');
 }
 else
 {
 echo('<input  disabled  style="margin-left:70px;"   type="checkbox" name="bug_found" value="1" />');
 }
        
 
echo('<button style="float:right;"   type="submit">Update Development Status </button>');
} 
 

?>
    <? if ($_SESSION['role'] == 'Tester')
{

echo('<h1 style="text-align:left" >Security Information</h1><br />');	
echo('<textarea readonly style="font-weight:bold;background-color: #E5E5E5;color:#000;padding-left:5px;height:100px;width:100%;font-size:15px;"  type="text" >');
 
  $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $sec= $Row['SecurityComment'];
			 
  
               echo($sec);

			   }
			  
echo('</textarea>');
echo('<h5 style="text-align:left" >Security Features</h5><br />');
$DataBase = new Database();
             $strQuery4='select * from feature_story where FK_Story_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			 
			   foreach($Rows as $Row){
 
                    $FID[]= $Row['FK_Feature_ID'];
                    
 
			   }	  
	
 
 
 $strQuery4='select * from security_features' ;
	
$DataBase->query($strQuery4);
 $Rows = $DataBase->fetch_all();
 
   foreach($Rows as $Row){
$name= $Row['name_Feature'];
$id= $Row['PK_ID'];
 if($FID != null)
 {
 if (in_array($id, $FID)) {
echo('<input disabled="disabled" checked type="checkbox" value="'.$id.'" name="Field2[]" />');
echo('<label style="text-align:left;" for="'.$name.'">'.$name.'</label>');
 
}
else 
{
 
 
echo('<input disabled="disabled" type="checkbox" value="'.$id.'" name="Field2[]" />');
echo('<label style="text-align:left;" for="'.$name.'">'.$name.'</label>');
}
 
 }
 else
 {
 echo('<input disabled="disabled" type="checkbox" value="'.$id.'" name="Field2[]" />');
echo('<label style="text-align:left;" for="'.$name.'">'.$name.'</label>');
 }
 

		echo('<br />');
		echo('<br />');
}


echo('<h1 style="text-align:left" >Development Information</h1><br />');	
echo('<textarea readonly style="font-weight:bold;background-color: #E5E5E5;color:#000;padding-left:5px;height:100px;width:100%;font-size:15px;"  type="text"  >');
  $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $dev= $Row['Developer_Comment'];
			 
  
               echo($dev);

			   }
echo('</textarea>');		   

echo('<h1 style="text-align:left" >Testing Information</h1><br />');	
echo('<textarea style="font-weight:bold;background-color: #E5E5E5;color:#000;padding-left:5px;height:100px;width:100%;font-size:15px;"  type="text" name="Tcomment" id="Tcomment" >');
  $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $dev= $Row['Tester_Comment'];
			 
  
               echo($dev);

			   }
echo('</textarea>');

echo('<br />');
echo('<br />');

echo('<label  style="margin-left:90px;text-align:left;font-weight:normal;display:inline;" for="select5" > Workflow Step </label>');
echo('<select style="text-align:left;width:30%;" name="TState">');

  
  
             $DataBase = new Database();
             $strQuery4='select Workflow from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

               $workflow= $Row['Workflow'];
			   }
			   $strQuery4='select * from states';
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_state'];
			  
              $id= $Row['PK_ID'];
			  if($id==$workflow)
			  {
               echo('<option selected="selected" id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			  }
		       else
			   {
				    echo('<option  id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			   }

			   }
			   
   
 
 
 
 
  

echo('</select>');


 
 echo('<br /><br /><br /><br />');
 
 			   
 
 echo('<label  style="margin-left:90px;text-align:left;font-weight:normal;display:inline;"> Bugs Found </label>');
 
  
 $strQuery4='select Bug_Found from stories where PK_ID='.$story;
	
$DataBase->query($strQuery4);
 $Rows = $DataBase->fetch_all();
 
   foreach($Rows as $Row){
$bug= $Row['Bug_Found'];
 }
 if($bug == 1)
 {	   
 echo('<input  checked style="margin-left:70px;"   type="checkbox" name="bug_found" value="1" />');
 }
 else
 {
  echo('<input  style="margin-left:70px;"   type="checkbox" name="bug_found" value="1" />');
 }
echo('<button style="float:right;"   type="submit">Update Testing Status </button>');
} 


?>
   </form>
 </div>
     </tr>
    
  </table>

</td>
 
</tr>

<tr>
 
</tr>
</table>



