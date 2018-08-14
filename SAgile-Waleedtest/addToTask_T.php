<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
 <tr>
       
  <div id="stylized" class="myform2"  >
  <form id="AddStoryform" name="AddStoryform" onSubmit="return formValidation4();" method="post" action="addTaskCheck.php">
  
  <h1 style="text-align:left" >Add: New Task</h1>
  </br>
  
 
 <textarea   style="width:100%;font-size:20px;" placeholder="Title" type="text" name="title" id="story" ><?
 echo $story;
			   ?>
</textarea>

  <input style="display:none" value="<? echo $projId; ?>" id="TR"/>
  <input style="display:none" value="<? echo $projDate; ?>" id="projDate" name="projDate"/>
 </br>
  </br>

<label  style="float:leftt;text-align:left;font-weight:normal;display:inline;" for="select7" > Team </label>
 <select   style="float:left;width:30%;" onchange="javascript:Refresh(this)" name="select07" id="select07">
 <option selected="selected">Choose Team</option>
   <?php
			$DataBase = new Database();
              
			
             $strQuery4='select * from teams';
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['Team_name'];
			  $id=$Row['PK_ID'];
             
		       
			        if($id==$teamId)
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
 
 
  <select   style="float:right;width:30%;" name="select5" id="select5" >
 <?php
			$DataBase = new Database();
                    
			
             $strQuery4='select * from states';
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_state'];
		 
              $id= $Row['PK_ID'];	  
		       
			    
				    echo('<option  id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			    

			   }
			   
			    
			
			    
			?>
  
 </select>
 <label  style="float:right;text-align:left;font-weight:normal;display:inline;" for="select5" > Workflow Step </label>
<br />
 <br />
     
 
  <span style="font-size:14px;float:left"   >Start Date : </span>  
 <div id="cal" style="float:left;margin-left:52px;">
 
  <?php
					  $myCalendar = new tc_calendar("date5", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  //$myCalendar->setDate(date('d'), date('m'), date('Y'));
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
					  $myCalendar = new tc_calendar("date7", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  //$myCalendar->setDate(date('d'), date('m'), date('Y'));
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
 
 <br />
<br />
<label  style="float:leftt;text-align:left;font-weight:normal;display:inline;" for="select7" > Priority </label>
 <select   style="float:left;width:30%;" name="select7" id="select7">
 <option value="Medium" selected="selected">Medium</option>
  <option value="High"  >High</option>
   <option value="Low"  >Low</option>
    
  
 </select>
 
 
   <select   style="float:right;width:30%;" name="select8" id="select8">
 
      <?php
			
		 $DataBase = new Database();
             $strQuery4="SELECT username FROM users WHERE PK_ID =".$_SESSION['id'];

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
 <label  style="float:right;text-align:left;font-weight:normal;" for="select8" > Assigned To </label>
 
 <br />
<br />
 <label  style="float:left;text-align:left;font-weight:normal;" for="select9" > Requested By </label>
 <select   style="float:left;width:30%;" name="select9" id="select9" >
 <option selected="selected">Choose Member</option>
    <?php
			
		 $DataBase = new Database();
             $strQuery4="SELECT username FROM users WHERE PK_ID =".$_SESSION['id'];

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
 
 <select  onchange="javascript:assignRType(this,select12)"  style="margin-top:7px;margin-left:5px;margin-right:57px;float:right;width:10%;" id="select10" name="select10">
 <option value="Mins" selected="selected">Mins</option>
 <option value="Hrs"  >Hrs</option>
 <option value="days"  >Days</option>
  <option value="months"  >Months</option>
    
  
 </select>
 
<input onblur="javascript:assignRemain();" name="original" id="original" style="float:right;width:100px;" type="text" />
<label style="margin-top:7px;float:right" for="orginal"> Original Estimate </label>
<br />
<br />
<br />
  
<select   style="margin-top:7px;float:right;width:10%;margin-left:5px;margin-right:57px;" id="select12" name="select12">
 <option value="Mins" selected="selected">Mins</option>
 <option value="Hrs"  >Hrs</option>
 <option value="days"  >Days</option>
   <option value="Months"  >months</option>
    
  
 </select>
 
<input name="Res" id="Res" style="width:100px;float:right;" type="text" />

<label style="width:150px;margin-top:7px;float:right" for="Res"> Remaining Estimate </label>

 <br />
 <br />
 <textarea   style="width:100%;height:100px;font-size:20px;" placeholder="Description" type="text" name="description" id="description" >
</textarea>


<br />
 <br />
   <button style="float:right;" type="submit">Add</button>
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



