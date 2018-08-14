<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
 <tr>
       
 
 <div id="stylized" class="myform" style="width:500px;height:250px;">
  <form id="form" name="form" method="post" onSubmit="return formValidation();" action="addVersionHandle.php"
  <h1>Add Iteration</h1>
  <br />
  
 
 <input style="display:none" value="<? echo $projId; ?>" name="proj" />
 
     <label class="small">Iteration Name
  
   </label>
 <input style="margin-left:30px;" type="text" name="name" id="name" class="name" />
 <br />
 <br />
  <br />
 <br />
   <label style="float:left;margin-top:3px;" for="cal" >Start Date : </label>  
 <div id="cal" style="float:left;margin-left:10px;">
 
  <?php
					  $myCalendar = new tc_calendar("Vdate1", true, false);
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
 

 

 
    
 <div id="cal" style="float:right;margin-right:25px;margin-left:10px;">
 
  <?php
					  $myCalendar = new tc_calendar("Vdate2", true, false);
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
<span style="font-size:14px;float:right;margin-top:3px;">Due Date :</span> 
<br />
<br />
<br />
<br />
     <button  style="float:right;" type="submit">Add</button>
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



