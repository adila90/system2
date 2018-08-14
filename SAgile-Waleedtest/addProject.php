<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
 <tr>
       
 
 <div id="stylized" class="myform" >
  <form id="form" name="form" method="post" onSubmit="return formValidation();" action="addHandle.php">
  <h1>Add Project</h1>
 
 
     <label class="small">Project Name
  
   </label>
 <input style="margin-left:30px;" type="text" name="name" id="name" class="name" />
 <br />
  <br />
   <br />
   <label class="small"    >Start Date : </label>  
 <div id="cal" name="date1" style="float:left;margin-left:30px;">
 
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
 

 <br />
  <br />
   <br />
  
     
         <label class="small">Completion Date :</label> 
 <div id="cal2" name="date2" style="float:left;margin-left:30px;">
 
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
             
     

       <br />
 <br />
       <br />
 <label class="small">Project Description
  
   </label>
 
 
   
  <textarea  class="Tarea" type="text" name="desc" id="desc" >
</textarea>

<br />
<br />
     <button  type="submit">Add</button>

 
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



