 

 
  
 
  
 
<div  <? if ($_SESSION['role'] != 'Project Manager')
{
echo('style="display:none;font-size:12px');
}

?>  style="font-size:12px" onclick="top.location.href='main.php?page=addProject';"  class='button red'>Add Project</div>
 
<input style="font-size:12px;" onClick="document.location.reload(true)" type="submit" class="button green small" value="Refresh" />   
 
 
 
  <table  class="table" id="table">
   <thead>
    	<tr>
        	<th >Project ID</th>
            <th  >Project Name </th>
             <th  >Project Description </th>
             
             <?
			  if ($_SESSION['role'] == 'Project Manager')
			  {
            echo('<th  >Edit</th><th  >Chart</th>
            <th >Delete</th>');
			  }
			  ?>
        </tr>
    </thead>
    
     
    <?php
	
	 
	 
		 $DataBase = new Database();
             $strQuery4='select * from project';
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_Proj'];
			      $desc= $Row['desc_proj'];
			   $id= $Row['PK_ID'];
			   echo('<tr><td>'.$id.'</td><td>'.$name.'</td><td>'.$desc.'</td>');
                if ($_SESSION['role'] == 'Project Manager')
{
echo('<td><a class="stylish-button" type="button" href="main.php?page=projchart&proj='.$id.'" >Chart</a></td><td><a class="stylish-button" type="button" href="main.php?page=editProject&proj='.$id.'" >Edit</a></td><td><a class="stylish-button" type="button" href="main.php?page=deleteProject&proj='.$id.'" >Delete</a></td>');
}

 
		echo('</tr>');	   
              
			   }
			?>
    
    </table>
    
   

 
 
 


