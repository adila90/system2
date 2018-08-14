<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
 <tr>
       
 
 <div id="stylized" class="myform" style="width:500px;height:350px;">
  <form id="form" name="form" method="post" onSubmit="return formValidation();" action="editMemberHandle.php"
  <h1>Edit Member</h1>
  <br />
    <br />
      <br />
  
 
 
 
     <label class="small">Member Name
  
   </label>
 <input style="margin-left:30px;" type="text" name="name" id="name" class="name" value="<?  
 
  $DataBase = new Database();
             $strQuery4='select * from users where PK_ID='.$MemId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['username'];
	     
			  echo $name;
              
			   }
			?>"/>
 
   <label class="small">Password
  
   </label>
 <input style="margin-left:30px;" type="text" name="pass" id="pass" class="pass" value="<?  
 
  $DataBase = new Database();
             $strQuery4='select * from users where PK_ID='.$MemId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $pass= $Row['password'];
	     
			  echo $pass;
              
			   }
			?>"/> 
 
  <label class="small">Email
  
   </label>
 <input style="margin-left:30px;" type="text" name="email" id="email" class="email" value="<?  
 
  $DataBase = new Database();
             $strQuery4='select * from users where PK_ID='.$MemId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $email= $Row['email'];
	     
			  echo $email;
              
			   }
			?>"/>
 
 <label for="select5" class="small">Member  Role
  
   </label>
 
  <select style="width:200px;"  name="select5" id="select5" >
 <option value="New Request" selected="selected">Choose Role</option>
  
  <?php
			$DataBase = new Database();
             $strQuery4='select * from users where PK_ID='.$MemId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

               $Pname= $Row['role'];
			   }
            
			
             $strQuery4='select * from users';
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['role'];
			  
              $id= $Row['PK_ID'];
			  if($name==$Pname)
			  {
               echo('<option selected="selected" id="'.$name.'" value="'.$name.'">'.$name.'</option>');
			  }
		       else
			   {
				    echo('<option  id="'.$name.'" value="'.$name.'">'.$name.'</option>');
			   }

			   }
			   
			    
			
			    
			?>
  
 </select>
 <br />
 <input style="display:none;" value="<? echo $MemId ?>" type="text" name="hidden" id="hidden" class="hidden" />
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
 
     <button  style="float:right;" type="submit">Edit</button>
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



