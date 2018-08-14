 <?
	  $DataBase = new Database();
             $strQuery4='select * from sub where PK_ID='.$subId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_sub'];
			   $id= $Row['PK_ID'];
	     echo('<p style="float:left;font-size:10px;">'.$name.' >> BackLog  </p>' );
			   }
	 ?>
   <?   
 if(isset($newSub))
{
 
	$DataBase2 = new Database();
	  $User_Id= $_SESSION['id'];
			   $strQuery6="insert into sub_story (FK_User_ID,FK_Sub_ID,FK_Story_ID,1st_time_date) values ('$User_Id','$newSub','$story',Now())";
		 
			      $DataBase2->query($strQuery6);
			 
}

	 ?>

 <div  <? if ($_SESSION['role'] != 'Project Manager')
{
echo('style="display:none;font-size:12px');
} ?> style="font-size:12px;" onclick="top.location.href='main.php?page=addToSub&proj=<? echo $projId ?>&Sub=<? echo $subId ?>';" class='button red small'>Add Stories to Sub </div>
 
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
             <?
			  if ($_SESSION['role'] == 'Project Manager')
			  {
            echo('<th  >Copy</th>');
			  }
			  ?>
            
        </tr>
    </thead>
    
 
    <?php
	
	if(isset($subId))
	{
		 $DataBase = new Database();
             $strQuery4="select st.name_state,s.assigned_to,s.AddedToSecurity,s.1st_time_date,s.name_story,s.desc_story,s.FK_Proj_ID,s.prio_story,s.remain_Es,s.Es_Type,s.PK_ID,u.username from stories AS s INNER JOIN users AS u ON s.assigned_to = u.PK_ID  INNER JOIN sub_story AS ss ON s.PK_ID = ss.FK_Story_ID  INNER JOIN states AS st  ON s.Workflow = st.PK_ID WHERE ss.FK_Sub_ID ='$subId' ORDER BY s.PK_ID DESC";
	
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
				    $date= $Row['1st_time_date'];	
					$assignedTo= $Row['assigned_to'];
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
			 if ($_SESSION['role'] == 'Project Manager')
			{
			echo('<td style="background-color:green;color:white"><select id="select3" onchange="javascript:copyToSub(this,'.$subId.')">
             <option selected="selected">Copy To</option>');
			
		
		
		
		    $DataBase20 = new Database();
              $strQuery20="select * from sub where FK_Proj_Id='$projId' AND PK_ID != '$subId'";
			  $DataBase20->query($strQuery20);
               $Rows20 = $DataBase20->fetch_all();
			   
			   foreach($Rows20 as $Row20){

              $name20= $Row20['name_sub'];
			  $desc20= $Row20['desc_sub'];
              $id20= $Row20['PK_ID'];
 
			   	  
             
			 
			  echo('<option class="'.$projId.'" id="'.$id20.'" value="'.$id.'">'.$name20.'</option>');
			   }
			   echo('</select></td>');
			}

	  }
	   else
	   {
	  echo('<td>'.$id.'</td><td><a style="color:red" href="main.php?page=storyDetails&story='.$id.'&proj='.$proj.'" >'.$name.'</a></td>'.'<td>'.$status.'</td><td>'.$proio.'</td>'.'<td>'.$user.'</td>');
			 
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

	 if ($_SESSION['role'] == 'Project Manager')
			{
			echo('<td><select id="select3" onchange="javascript:copyToSub(this,'.$subId.')">
             <option selected="selected">Copy To</option>');
			
		
		
		
		    $DataBase20 = new Database();
              $strQuery20="select * from sub where FK_Proj_Id='$projId' AND PK_ID != '$subId'";
			  $DataBase20->query($strQuery20);
               $Rows20 = $DataBase20->fetch_all();
			   
			   foreach($Rows20 as $Row20){

              $name20= $Row20['name_sub'];
			  $desc20= $Row20['desc_sub'];
              $id20= $Row20['PK_ID'];
 
			   	  
             
			 
			  echo('<option class="'.$projId.'" id="'.$id20.'" value="'.$id.'">'.$name20.'</option>');
			   }
			   echo('</select></td>');
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
			 if ($_SESSION['role'] == 'Project Manager')
			{
			echo('<td style="background-color:green;color:white"><select id="select3" onchange="javascript:copyToSub(this,'.$subId.')">
             <option selected="selected">Copy To</option>');
			
		
		
		
		    $DataBase20 = new Database();
              $strQuery20="select * from sub where FK_Proj_Id='$projId' AND PK_ID != '$subId'";
			  $DataBase20->query($strQuery20);
               $Rows20 = $DataBase20->fetch_all();
			   
			   foreach($Rows20 as $Row20){

              $name20= $Row20['name_sub'];
			  $desc20= $Row20['desc_sub'];
              $id20= $Row20['PK_ID'];
 
			   	  
             
			 
			  echo('<option class="'.$projId.'" id="'.$id20.'" value="'.$id.'">'.$name20.'</option>');
			   }
			   echo('</select></td>');
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

			 
			 if ($_SESSION['role'] == 'Project Manager')
			{
			echo('<td><select id="select3" onchange="javascript:copyToSub(this,'.$subId.')">
             <option selected="selected">Copy To</option>');
			
		
		
		
		    $DataBase20 = new Database();
              $strQuery20="select * from sub where FK_Proj_Id='$projId' AND PK_ID != '$subId'";
			  $DataBase20->query($strQuery20);
               $Rows20 = $DataBase20->fetch_all();
			   
			   foreach($Rows20 as $Row20){

              $name20= $Row20['name_sub'];
			  $desc20= $Row20['desc_sub'];
              $id20= $Row20['PK_ID'];
 
			   	  
             
			 
			  echo('<option class="'.$projId.'" id="'.$id20.'" value="'.$id.'">'.$name20.'</option>');
			   }
			   echo('</select></td>');
			}
 }
   

 
 echo('</tr>');
 }
	}
	}
	?>
    
    </tr>
    </table>
    
   

 

