<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
<tr>
<td width="13"><img src="images/top_leftround.gif" width="13" height="13" border="0" alt="Rounded corner: top-left" /></td>
<td width="1200" class="top"></td>
<td width="13"><img src="images/top_rightround.gif" width="13" height="13" border="0" alt="Rounded corner: top-right" /></td>
</tr>

<tr>
<td class="left"></td>
<td align="center" width="100%" valign="top">

     
     
 
<div  <? if ($_SESSION['role'] != 'Project Manager')
{
echo('style="display:none"');
} ?> style="font-size:12px;" onclick="top.location.href='main.php?page=addState';" class='button red'>Add Workflow Step </div>

<input style="font-size:12px;" onClick="document.location.reload(true)" type="submit" class="button green small" value="Refresh" />   
 
 
 
 
 
    <table  class="table" id="table">
   <thead>
    	<tr>
        	<th >State ID</th>
            <th  >State Name </th>
            <?
			  if ($_SESSION['role'] == 'Project Manager')
			  {
            echo('<th  >Edit</th>');
			  }
			  ?>
            
             
        </tr>
    </thead>
    
     
    <?php
	
	 
	 
		 $DataBase = new Database();
             $strQuery4='select * from states';
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_state'];
			  
			   $id= $Row['PK_ID'];
			    echo('<tr><td>'.$id.'</td><td>'.$name.'</td>');
              if ($_SESSION['role'] == 'Project Manager')
			  {
			   echo(' <td><a class="stylish-button" type="button" href="main.php?page=editState&state='.$id.'" >Edit</a></td>');
			  }
			  echo('</tr>');
			   }
			?>
    
    </table>
    


