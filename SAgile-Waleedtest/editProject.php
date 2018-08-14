<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
 <tr>
       
  
 
   
 <br />
  <br />
 <div id="stylized" class="myform" >
  <form id="form2" name="form2" method="post"  onSubmit="return formValidation3();" action="editHandle.php">
  <h1>Edit Project</h1>
 
 
     <label class="small">Project Name
  
   </label>
 <input style="margin-left:30px;" type="text" name="name2" id="name2" class="name2" value="<?  
 
  $DataBase = new Database();
             $strQuery4='select * from project where PK_ID='.$projId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_Proj'];
	          $desc= $Row['desc_proj'];
			  echo $name;
              
			   }
			?>"
 
  />
   <br />
   <br />
   <label class="small"    >Start Date : </label>  
 <div id="cal" style="float:left;margin-left:30px;">
 
  <?php
  $DataBase = new Database();
             $strQuery4='select Start_Date from project where PK_ID='.$projId;
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
 

 <br />
  <br />
   <br />
  
     
         <label class="small">Completion Date :</label> 
 <div id="cal" style="float:left;margin-left:30px;">
 
  <?php
  
   $DataBase = new Database();
             $strQuery4='select completion_date from project where PK_ID='.$projId;
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
   <br />
  <br />
   <br />
  
 <input style="display:none;" value="<? echo $projId ?>" type="text" name="hidden" id="hidden" class="hidden" />
 <label class="small">Project Description
  
   </label>
  <textarea  class="Tarea"  value="" type="text" name="desc2" id="desc2" ><? 
  
   $DataBase = new Database();
             $strQuery4='select * from project where PK_ID='.$projId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

           
	          $desc= $Row['desc_proj'];
			  echo $desc;
              
			   }
			?></textarea>
 
   <br />
   <br />
   
 
     <button  type="submit">Edit</button>
 <div class="spacer"></div>
 
   </form>
 </div>

  </br>
 

     </tr>
    
  </table>

</td>
 
</tr>

<tr>
 
</tr>
</table>



