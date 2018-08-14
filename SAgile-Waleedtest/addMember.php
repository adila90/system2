<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
 <tr>
       
 
 <div id="stylized" class="myform" style="width:500px;height:350px;">
  <form id="form" name="form" method="post" onSubmit="return formValidation();" action="addMemberHandle.php"
  <h1>Add Member</h1>
  <br />
    <br />
      <br />
  
 
 
 
     <label class="small">Member Name
  
   </label>
 <input style="margin-left:30px;" type="text" name="name" id="name" class="name" />
 
   <label class="small">Password
  
   </label>
 <input style="margin-left:30px;" type="text" name="pass" id="pass" class="pass" />
 
  <label class="small">Email
  
   </label>
 <input style="margin-left:30px;" type="text" name="email" id="email" class="email" />
 
 <label for="select5" class="small">Member  Role
  
   </label>
 
  <select style="width:200px;"  name="select5" id="select5" >
 <option value="New Request" selected="selected">Choose Role</option>
  
  <?php
			
		 $DataBase = new Database();
              
              
             $strQuery4='select * from roles';
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['role_name'];
			 
              $id= $Row['PK_ID'];
			 
				    echo('<option  id="'.$name.'" value="'.$name.'">'.$name.'</option>');
			    

              

			   }
			   
			    
			?>
 
  
 </select>
 <br />
  <br />
  <label  class="small"  for="select4" > Team </label>
   <select    style="width:200px;"  name="select4" id="select4" >
 <option selected="selected">Choose Team</option>
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
  <br />
  <br />
 
     <button  style="float:right;" type="submit">Add</button>
 <div class="spacer"></div>
    <br />
  <br />
   <br />
  <br />
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



