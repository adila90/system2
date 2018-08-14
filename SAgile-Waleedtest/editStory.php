<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
 <tr>
       
  <div id="stylized" class="myform2"  >
  <form id="EditStoryform" onSubmit="return formValidation5();" name="EditStoryform" method="post" action="EditStoryHandle.php">
   <input id="St" name="story" style="display:none" value="<? echo $story ?> " />
    <input id="ER" name="project" style="display:none" value="<? echo $projId ?> " />
    <input style="display:none" value="<? echo $projDate; ?>" id="projDate2" name="projDate"/>
  <h1 style="text-align:left" >Edit: User Story</h1>
  </br>
  
 
 <textarea   style="width:100%;font-size:20px;padding-top:10px;" placeholder="Title" type="text" name="title" id="title" ><?php
             $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_story'];
			 
              $id= $Row['PK_ID'];
               echo($name);

			   }
			   ?></textarea>

 
 </br>
  </br>

<label  style="font-size:14px;float:left;text-align:left;font-weight:normal;display:inline;" for="select4" > Project </label>
   <select   style="float:left;width:30%;" name="select4" id="select4" >
 <option selected="selected">Choose Project</option>
   <?php
			
		 
             $DataBase = new Database();
             $strQuery4='select * from project where PK_ID='.$projId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

               $Pname= $Row['name_Proj'];
			   }
            
			
             $strQuery4='select * from project';
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_Proj'];
			  $desc= $Row['desc_proj'];
              $id= $Row['PK_ID'];
			  if($name==$Pname)
			  {
               echo('<option selected="selected" id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			  }
		       else
			   {
				    echo('<option  id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			   }

			   }
			   
			    
			?>
 </select> 
 
  <select style="float:right;width:30%;" name="select5">
  <?
  
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
			  if($name==$Pname)
			  {
               echo('<option selected="selected" id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			  }
		       else
			   {
				    echo('<option  id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			   }

			   }
			   
   
  ?>
  </select>
 
 

 <label  style="float:right;text-align:left;font-weight:normal;display:inline;" for="select5" > Workflow Step </label>
<br />
 <br />
     
  <span style="font-size:14px;float:left"   >Start Date : </span>  
 <div id="cal" style="float:left;margin-left:52px;">
 
  <?php
		  $DataBase = new Database();
             $strQuery4='select Start_Date from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

               $Sdate= $Row['Start_Date'];
			   }
		 $split_date = split("-", $Sdate);
          $year = $split_date[0];
		    $month = $split_date[1];
			$days = $split_date[2];
			 
					  $myCalendar = new tc_calendar("date5", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setDate($days,$month,$year);
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval(2000, 2015);
					  $myCalendar->dateAllow('2008-05-13', '2015-03-01');
					  $myCalendar->setDateFormat('j F Y');
					  //$myCalendar->setHeight(350);
					  //$myCalendar->autoSubmit(true, "form1");
					  $myCalendar->setAlignment('left', 'bottom');
					   
					  $myCalendar->setSpecificDate(array("2011-06-01"), 0, '');
					  $myCalendar->writeScript();
					  ?> 
    
 </div>
 
       
 <div id="cal" style="float:right;margin-right:120px;">
 
  <?php
  
   $DataBase = new Database();
             $strQuery4='select completion_date from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

               $Sdate= $Row['completion_date'];
			   }
		 $split_date = split("-", $Sdate);
          $year = $split_date[0];
		    $month = $split_date[1];
			$days = $split_date[2];
			
			
					  $myCalendar = new tc_calendar("date7", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					   $myCalendar->setDate($days,$month,$year);
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval(2000, 2015);
					  $myCalendar->dateAllow('2008-05-13', '2015-03-01');
					  $myCalendar->setDateFormat('j F Y');
					  //$myCalendar->setHeight(350);
					  //$myCalendar->autoSubmit(true, "form1");
					  $myCalendar->setAlignment('left', 'bottom');
					   
					  $myCalendar->setSpecificDate(array("2011-06-01"), 0, '');
					  $myCalendar->writeScript();
					  ?> 
    
 </div>
             
       <span style="font-size:14px;float:right;margin-right:35px;">Completion Date :</span>            
              
<br />
<br />

<label  style="float:leftt;text-align:left;font-weight:normal;display:inline;" for="select7" > Team </label>
 <select  onchange="javascript:EditTeamRefresh(this)" style="float:left;width:30%;" name="select07" id="select07">
 
    <?php
			$DataBase = new Database();
             $strQuery4='select * from teams where PK_ID='.$teamId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

               $Pname= $Row['Team_name'];
			   }
            
			
             $strQuery4='select * from teams';
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['Team_name'];
			  
              $id= $Row['PK_ID'];
			  if($name==$Pname)
			  {
               echo('<option selected="selected" id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			  }
		       else
			   {
				    echo('<option  id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			   }

			   }
			   
			    
			
			    
			?>
    
  
 </select>
 
 
   <select   style="float:right;width:30%;" name="select08" id="select08">
 
     <?php
			
		 $DataBase = new Database();
             $strQuery4="SELECT
users.username
FROM
users ,
stories
WHERE
users.PK_ID = stories.assigned_to_tester AND
stories.PK_ID = '$story'";

			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

               $uname= $Row['username'];
		 
			   }
              
             $strQuery4='select * from users where FK_Team_ID='.$teamId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['username'];
			 	 $role= $Row['role'];
              $id= $Row['PK_ID'];
			   if($role == "Tester")
			  {
			  if($name==$uname)
			  {
               echo('<option selected="selected" id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			  }
		       else
			   {
				    echo('<option  id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			   }

              }

			   }
			   
			    
			?>
 </select> 
 <label  style="float:right;text-align:left;font-weight:normal;" for="select8" > Assigned To Tester </label>
 
 <br />
 <br />

<?
  
             $DataBase = new Database();
             $strQuery4='select prio_story from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

               $priority= $Row['prio_story'];
			   }
			   
			   
   
  ?>
  
 
<label  style="float:leftt;text-align:left;font-weight:normal;display:inline;" for="select7" > Priority </label>
  
 <select style="float:left;width:30%;" name="select7">
<option value="Medium" <?php if ($priority=="Medium") echo 'selected="selected"';?>>Medium</options>
<option value="High" <?php if ($priority=="High") echo 'selected="selected"';?>>High</options>
<option value="Low" <?php if ($priority=="Low") echo 'selected="selected"';?>>Low</options>
 
</select>
 
   <select   style="float:right;width:30%;" name="select8" id="select8">
  
   <?php
			
		 $DataBase = new Database();
             $strQuery4="SELECT
users.username
FROM
users ,
stories
WHERE
users.PK_ID = stories.assigned_to AND
stories.PK_ID = '$story'";

			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

               $uname= $Row['username'];
		 
			   }
              
             $strQuery4='select * from users where FK_Team_ID='.$teamId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['username'];
			 $role= $Row['role'];
              $id= $Row['PK_ID'];
			  if($role == "Developer")
			  {
			  if($name==$uname)
			  {
               echo('<option selected="selected" id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			  }
		       else
			   {
				    echo('<option  id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			   }

              }

			   }
			   
			    
			?>
 </select> 
 <label  style="float:right;text-align:left;font-weight:normal;" for="select8" > Assigned To </label>
 
 <br />
<br />
 <label  style="float:left;text-align:left;font-weight:normal;" for="select9" > Requested By </label>
 <select   style="float:left;width:30%;" name="select9" id="select9" >
 <option selected="selected">Choose Member</option>
   <?php
			
		 
            $DataBase = new Database();
             $strQuery4="SELECT
users.username
FROM
users ,
stories
WHERE
users.PK_ID = stories.Requested_by AND
stories.PK_ID = '$story'";

			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

               $uname= $Row['username'];
		 
			   }
              
             $strQuery4='select * from users';
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['username'];
			 
              $id= $Row['PK_ID'];
			  if($name==$uname)
			  {
               echo('<option selected="selected" id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			  }
		       else
			   {
				    echo('<option  id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			   }

              

			   }
			   
			    
			    
			?>
 </select> 
  <?php
			
		 
             $DataBase = new Database();
               $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

       
			  $orgType= $Row['Es_Type'];
			 
        
        

			   }
			   
			    
			?>
 <select  onchange="javascript:assignRType(this,select12)"  style="margin-top:7px;margin-left:5px;margin-right:57px;float:right;width:10%;" id="select10" name="select10">
 <option value="Mins" <?php if ($orgType=="Mins") echo 'selected="selected"';?>>Mins</options>
<option value="Hrs" <?php if ($orgType=="Hrs") echo 'selected="selected"';?>>Hrs</options>
<option value="days" <?php if ($orgType=="days") echo 'selected="selected"';?>>Days</options>
<option value="months" <?php if ($orgType=="months") echo 'selected="selected"';?>>Months</options>

  
    
  
 </select>
 
<input onblur="javascript:assignRemain();" name="original" id="original" value="
 <?php
			
		 
             $DataBase = new Database();
               $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $org= $Row['original_Es'];
			 
			 echo($org);
            
        

			   }
			   
			    
			?>"
style="float:right;width:100px;" type="text" />
<label style="margin-top:7px;float:right" for="orginal"> Original Estimate </label>
<br />
<br />
<br />
 
 
 
<select   style="margin-top:7px;float:right;width:10%;margin-left:5px;margin-right:57px;" id="select12" name="select12">
  <option value="Mins" <?php if ($orgType=="Mins") echo 'selected="selected"';?>>Mins</options>
<option value="Hrs" <?php if ($orgType=="Hrs") echo 'selected="selected"';?>>Hrs</options>
<option value="days" <?php if ($orgType=="days") echo 'selected="selected"';?>>Days</options>
<option value="months" <?php if ($orgType=="months") echo 'selected="selected"';?>>Months</options>
    
  
 </select>
 
<input value="<?php
			
		 
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
		 
		 
				if($value > 0)
				{
				echo('0 ');
				 
				}
				else
				{
					$value=abs($value);
					
					 echo($value);
					 
					 
				}
			}
			 if($type == 'Hrs')
			{
				
				 
		     
		
				$value=$diff->h- $remain;
					 
			 
			   if($value > 0)
				{
				echo('0 ');
				 
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo($value);
				}
			}
			if($type == 'days')
			{
				 
				$value=$diff->d- $remain;
			 
				 if($value > 0)
				{
				echo(' 0 ');
				 
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo($value);
				}
			}
			
			if($type == 'months')
			{
				$value=$diff->m- $remain;
				 if($value > 0)
				{
				echo('0 ');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo($value);
				}
			}

			   }
			   
			    
			?>" name="Res" id="Res" style="width:100px;float:right;" type="text" />

<label style="width:150px;margin-top:7px;float:right" for="Res"> Remaining Estimate </label>

 <br />
 <br />
 <textarea   style="width:100%;height:100px;font-size:20px;" placeholder="Description" type="text" name="description" id="description" ><?php
  $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $desc= $Row['desc_story'];
			 
  
               echo($desc);

			   }
			   ?></textarea>


<br />
 <br />
   <button style="float:right;" type="submit">Update</button>
 <div class="spacer"></div>
 
   </form>
 </div>
     </tr>
    
  </table>

</td>
 
</tr>

<tr>
 
</tr>
</table>



