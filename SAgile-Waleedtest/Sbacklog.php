 <?
	  $DataBase = new Database();
             $strQuery4='select * from sprint where PK_ID='.$sprintId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['sprint_name'];
			   $id= $Row['PK_ID'];
	     echo('<p style="float:left;font-size:10px;">'.$name.' >> Story  </p>' );
			   }
	 ?>
      
 

 <div  <? if ($_SESSION['role'] != 'Project Manager')
{
echo('style="display:none;font-size:12px');
} ?> style="font-size:12px;" onclick="top.location.href='main.php?page=addToSprint&proj=<? echo $projId ?>&Spr=<? echo $sprintId ?>';" class='button red small'>Add Task to Feature </div>
 
<input style="font-size:12px;" onClick="document.location.reload(true)" type="submit" class="button green small" value="Refresh" />   
 
  
  
  
 

    
 
    <table class="table" id="table">
   <thead>
    	<tr>
        	<th >ID</th>
            <th  >Title</th>
            <th  >Workflow step</th>
            <th >priority</th>
            <th  >Assigned To</th>
            <th  >Remaining</th>
        </tr>
    </thead>
    
 
    <?php
	
	if(isset($sprintId))
	{
		 $DataBase = new Database();
             $strQuery4="select   st.name_state,s.assigned_to,s.assigned_to_tester,s.AddedToSecurity,s.1st_time_date,s.name_story,s.desc_story,s.FK_Proj_ID,s.prio_story,s.remain_Es,s.Es_Type,s.PK_ID,u.username from stories AS s INNER JOIN users AS u ON s.assigned_to = u.PK_ID  INNER JOIN sprint_story AS ss ON s.PK_ID = ss.FK_Story_ID  INNER JOIN states AS st  ON s.Workflow = st.PK_ID WHERE ss.FK_Sprint_ID ='$sprintId' ORDER BY s.PK_ID DESC";
	
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
		  
	foreach($Rows as $Row){
               	  $secured= $Row['AddedToSecurity'];
              $name= $Row['name_story'];
			  $desc= $Row['desc_story'];
			  $status=$Row['name_state'];
			  $proio=$Row['prio_story'];
              $id= $Row['PK_ID'];
			   $proj= $Row['FK_Proj_ID'];
			    $remain= $Row['remain_Es'];
				$type= $Row['Es_Type'];
			    $user= $Row['username'];
					$assignedTo= $Row['assigned_to'];	
			$date= $Row['1st_time_date'];	 
				$assignedToTester= $Row['assigned_to_tester'];	
				 
   
date_default_timezone_set('Asia/Singapore');
 
 $date1 = new DateTime();
 
$date2 = new DateTime($date);
$diff = $date1->diff($date2);
   echo('<tr>');
 if($secured==1)
 {   
 
        if($_SESSION['id']== $assignedTo || $_SESSION['id']==$assignedToTester)
	  {
	 echo('<td style="background-color:green;color:white">'.$id.'</td><td style="background-color:green;color:red"><a style="color:red" href="main.php?page=storyDetails&story='.$id.'&proj='.$proj.'" >'.$name.'</a></td>'.'<td style="background-color:green;color:white">'.$status.'</td><td style="background-color:green;color:white">'.$proio.'</td>'.'<td style="background-color:green;color:white">'.$user.'</td>');
	 if($type == 'Mins')
			{
	             
				 
				$value=$diff->i- $remain;
		 
		        if($diff->h != 0 || $diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}
				else if($value > 0)
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}
				else
				{
					$value=abs($value);
					
					 echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					 
					 
				}
			}
			 if($type == 'Hrs')
			{
				
				 
		     
		
				$value=$diff->h- $remain;
					 
			     if($diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}
			   else if($value > 0)
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{	 
			 
					$type="Mins";
					$value=60-$diff->i;
				 
				    echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
			}
			
			
			
			if($type == 'days')
			{
				$value=$diff->d- $remain;
				
				if($diff->m != 0 || $diff->y != 0 )
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}				
				else if($value > 0)
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{
			    
					  
					$type="Hrs";
					 
					$value=24-$diff->h;
				 				
					if ($value==1)
					{
					 
						$type="Mins";
					    $value=60-$diff->i;
						echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					}
					else
					{
				   echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					}
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
			}
			
			if($type == 'months')
			{
				$value=$diff->m- $remain;
				if($diff->y != 0 )
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}
				 else if($value > 0)
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{
			        $type="days";
					$value=30-$diff->d;
					if($value==1)
					{		  
					$type="Hrs";
					 
					$value=24-$diff->h;
				 				
					if ($value==1)
					{
					 
						$type="Mins";
					    $value=60-$diff->i;
						echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					}
					else
					{
				  echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					}
					}
				else
				{
				echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
			}
			 
	  }
	   else
	   {
	  echo('<td>'.$id.'</td><td><a style="color:red" href="main.php?page=storyDetails&story='.$id.'&proj='.$proj.'" >'.$name.'</a></td>'.'<td >'.$status.'</td><td>'.$proio.'</td>'.'<td>'.$user.'</td>');
			 
			if($type == 'Mins')
			{
	             
				 
				$value=$diff->i- $remain;
		 
		        if($diff->h != 0 || $diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('<td>0 '.$type.'</td>');
				 
				}
				else if($value > 0)
				{
				echo('<td>0 '.$type.'</td>');
				 
				}
				else
				{
					$value=abs($value);
					
					 echo('<td>'.$value.' '.$type.'</td>');
					 
					 
				}
			}
			 if($type == 'Hrs')
			{
				
				 
		     
		
				$value=$diff->h- $remain;
					 
			     if($diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('<td>0 '.$type.'</td>');
				 
				}
			   else if($value > 0)
				{
				echo('<td>0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{	 
			 
					$type="Mins";
					$value=60-$diff->i;
				 
				    echo('<td>'.$value.' '.$type.'</td>');
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td>'.$value.' '.$type.'</td>');
				}
			}
			
			
			
			if($type == 'days')
			{
				$value=$diff->d- $remain;
				
				if($diff->m != 0 || $diff->y != 0 )
				{
				echo('<td>0 '.$type.'</td>');
				 
				}				
				else if($value > 0)
				{
				echo('<td>0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{
			    
					  
					$type="Hrs";
					 
					$value=24-$diff->h;
				 				
					if ($value==1)
					{
					 
						$type="Mins";
					    $value=60-$diff->i;
						echo('<td>'.$value.' '.$type.'</td>');
					}
					else
					{
				   echo('<td>'.$value.' '.$type.'</td>');
					}
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td>'.$value.' '.$type.'</td>');
				}
			}
			
			if($type == 'months')
			{
				$value=$diff->m- $remain;
				if($diff->y != 0 )
				{
				echo('<td>0 '.$type.'</td>');
				 
				}
				 else if($value > 0)
				{
				echo('<td>0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{
			        $type="days";
					$value=30-$diff->d;
					if($value==1)
					{		  
					$type="Hrs";
					 
					$value=24-$diff->h;
				 				
					if ($value==1)
					{
					 
						$type="Mins";
					    $value=60-$diff->i;
						echo('<td>'.$value.' '.$type.'</td>');
					}
					else
					{
				  echo('<td>'.$value.' '.$type.'</td>');
					}
					}
				else
				{
				echo('<td>'.$value.' '.$type.'</td>');
				}
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td>'.$value.' '.$type.'</td>');
				}
			}

			 
			 
}
 }
 else
 {
      if($_SESSION['id']== $assignedTo || $_SESSION['id']==$assignedToTester)
	  {
	 echo('<td style="background-color:green;color:white">'.$id.'</td><td style="background-color:green;color:white"><a style="color:white" href="main.php?page=storyDetails&story='.$id.'&proj='.$proj.'" >'.$name.'</a></td>'.'<td style="background-color:green;color:white">'.$status.'</td><td style="background-color:green;color:white">'.$proio.'</td>'.'<td style="background-color:green;color:white">'.$user.'</td>');
	 if($type == 'Mins')
			{
	             
				 
				$value=$diff->i- $remain;
		 
		        if($diff->h != 0 || $diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}
				else if($value > 0)
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}
				else
				{
					$value=abs($value);
					
					 echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					 
					 
				}
			}
			 if($type == 'Hrs')
			{
				
				 
		     
		
				$value=$diff->h- $remain;
					 
			     if($diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}
			   else if($value > 0)
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{	 
			 
					$type="Mins";
					$value=60-$diff->i;
				 
				    echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
			}
			
			
			
			if($type == 'days')
			{
				$value=$diff->d- $remain;
				
				if($diff->m != 0 || $diff->y != 0 )
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}				
				else if($value > 0)
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{
			    
					  
					$type="Hrs";
					 
					$value=24-$diff->h;
				 				
					if ($value==1)
					{
					 
						$type="Mins";
					    $value=60-$diff->i;
						echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					}
					else
					{
				   echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					}
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
			}
			
			if($type == 'months')
			{
				$value=$diff->m- $remain;
				if($diff->y != 0 )
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}
				 else if($value > 0)
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{
			        $type="days";
					$value=30-$diff->d;
					if($value==1)
					{		  
					$type="Hrs";
					 
					$value=24-$diff->h;
				 				
					if ($value==1)
					{
					 
						$type="Mins";
					    $value=60-$diff->i;
						echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					}
					else
					{
				  echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					}
					}
				else
				{
				echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
			}
			 
	  }
	  else
	  {
             echo('<td>'.$id.'</td><td><a href="main.php?page=storyDetails&story='.$id.'&proj='.$proj.'" >'.$name.'</a></td>'.'<td>'.$status.'</td><td>'.$proio.'</td>'.'<td>'.$user.'</td>');
	 
			if($type == 'Mins')
			{
	             
				 
				$value=$diff->i- $remain;
		      
		        if($diff->h != 0 || $diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('<td>0 '.$type.'</td>');
				 
				}
				else if($value > 0)
				{
				echo('<td>0 '.$type.'</td>');
				 
				}
				else
				{
					$value=abs($value);
					
					 echo('<td>'.$value.' '.$type.'</td>');
					 
					 
				}
			}
			 if($type == 'Hrs')
			{
				
				 
		     
		
				$value=$diff->h- $remain;
				 
			     if($diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('<td>0 '.$type.'</td>');
				 
				}
			   else if($value > 0)
				{
				echo('<td>0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{	 
			 
					$type="Mins";
					$value=60-$diff->i;
				 
				    echo('<td>'.$value.' '.$type.'</td>');
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td>'.$value.' '.$type.'</td>');
				}
			}
			if($type == 'days')
			{
		
				$value=$diff->d- $remain;
				 
				if($diff->m != 0 || $diff->y != 0 )
				{
				echo('<td>0 '.$type.'</td>');
				 
				}				
				else if($value > 0)
				{
				echo('<td>0 '.$type.'</td>');
				 
				}
				else if($value==-1)
				{
			    
					  
					$type="Hrs";
					 
					$value=24-$diff->h;
				 				
					if ($value==1)
					{
					 
						$type="Mins";
					    $value=60-$diff->i;
						echo('<td>'.$value.' '.$type.'</td>');
					}
					else
					{
				    echo('<td>'.$value.' '.$type.'</td>');
					}
				}
				 else
				{			
				 
					
				    $value=abs($value);
				    echo('<td>'.$value.' '.$type.'</td>');
				}
			}
			
			if($type == 'months')
			{
				
				$value=$diff->m- $remain;
				if($diff->y != 0 )
				{
				echo('<td>0 '.$type.'</td>');
				 
				}
				 else if($value > 0)
				{
				echo('<td>0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{
			        $type="days";
					$value=30-$diff->d;
					if($value==1)
					{		  
					$type="Hrs";
					 
					$value=24-$diff->h;
				 				
					if ($value==1)
					{
					 
						$type="Mins";
					    $value=60-$diff->i;
						echo('<td>'.$value.' '.$type.'</td>');
					}
					else
					{
				    echo('<td>'.$value.' '.$type.'</td>');
					}
					}
				else
				{
					echo('<td>'.$value.' '.$type.'</td>');
				}
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td>'.$value.' '.$type.'</td>');
				}
			}

			 
			 
 }
   

 
 echo('</tr>');
 }
	}
	}
	?>
    
    </tr>
    </table>
    
   

 

