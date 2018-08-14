<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
 <tr>
       
 
 <div id="stylized" class="myform2" >
  <form id="form" name="form" method="post"  action="addToSHandle.php">
  <h1>Add Task to Feature</h1>
  <br />
 <?
 $DataBase = new Database();
             $strQuery4='select * from sprint_story where FK_Sprint_ID='.$sprintId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			 
			   foreach($Rows as $Row){
 
                    $FID[]= $Row['FK_Story_ID'];
                    
 
			   }	  
	
 
  
 $strQuery4='select * from stories where FK_Proj_ID='.$projId ;
	
$DataBase->query($strQuery4);
 $Rows = $DataBase->fetch_all();
 
   foreach($Rows as $Row){
$name= $Row['name_story'];
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
 
 }
 

		echo('<br />');
		echo('<br />');
 ?>
 
 <input  style="display:none" name="sp" id="sp" value="<? echo $sprintId ?>" /> 
 <input  style="display:none" name="sp2" id="sp2" value="<? echo $projId ?>" /> 
  <br />
  <br />
      <button  style="float:right;" type="submit">Add</button>
      
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



