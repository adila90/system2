 <?
 
	     echo('<p style="float:left;font-size:10px;"> Security >> BackLog  </p>' );
		 
			?>
 

<br />
<br />
<br />
    <table class="table" id="table">
   <thead>
    	<tr>
        	<th >ID</th>
            <th  >Title</th>
            <th  >Workflow step</th>
            <th >priority</th>
            <th  >Assigned To</th>
            <th  >Remaining</th>
             <th  >Project</th>
        </tr>
    </thead>
    
  
    <?php
	
	 
		 $DataBase = new Database();
             $strQuery4='select st.name_state,s.AddedToSecurity,s.1st_time_date,s.FK_Proj_ID,s.PK_ID,s.name_story,s.desc_story,s.prio_story,s.remain_Es,s.Es_Type,s.PK_ID,u.username from stories AS s INNER JOIN users AS u  ON s.assigned_to = u.PK_ID INNER JOIN states AS st  ON s.Workflow = st.PK_ID WHERE s.AddedToSecurity ="1"' ;
	
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
		  
	foreach($Rows as $Row){
            
			 
   
			
		  $name= $Row['name_story'];
		   $secured= $Row['AddedToSecurity'];
                   $id= $Row['PK_ID'];
 			  $desc= $Row['desc_story'];
			  $status=$Row['name_state'];
			  $proio=$Row['prio_story'];
              $id= $Row['PK_ID'];
			    $remain= $Row['remain_Es'];
				$type= $Row['Es_Type'];
			    $user= $Row['username'];	 
              $proj= $Row['FK_Proj_ID'];	
			    $date= $Row['1st_time_date'];	 
				 
   
date_default_timezone_set('Asia/Singapore');
 
 $date1 = new DateTime();
 
$date2 = new DateTime($date);
$diff = $date1->diff($date2);
 


 echo('<tr>');
 
  
	  echo('<td style="background-color:#DC143C;color:white">'.$id.'</td><td style="background-color:#DC143C;color:white"><a style="color:white" href="main.php?page=securityDetails&story='.$id.'&proj='.$proj.'" >'.$name.'</a></td>'.'<td style="background-color:#DC143C;color:white">'.$status.'</td><td style="background-color:#DC143C;color:white">'.$proio.'</td>'.'<td style="background-color:#DC143C;color:white">'.$user.'</td>');
			 
			 	if($type == 'Mins')
			{
	             
				 
				$value=$diff->i- $remain;
		 
		        if($diff->h != 0 || $diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('<td style="background-color:#DC143C;color:white">0 '.$type.'</td>');
				 
				}
				else if($value > 0)
				{
				echo('<td style="background-color:#DC143C;color:white">0 '.$type.'</td>');
				 
				}
				else
				{
					$value=abs($value);
					
					 echo('<td style="background-color:#DC143C;color:white">'.$value.' '.$type.'</td>');
					 
					 
				}
			}
			 if($type == 'Hrs')
			{
				
				 
		     
		
				$value=$diff->h- $remain;
					 
			     if($diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('<td style="background-color:#DC143C;color:white">0 '.$type.'</td>');
				 
				}
			   else if($value > 0)
				{
				echo('<td style="background-color:#DC143C;color:white">0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{	 
			 
					$type="Mins";
					$value=60-$diff->i;
				 
				    echo('<td style="background-color:#DC143C;color:white">'.$value.' '.$type.'</td>');
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td style="background-color:#DC143C;color:white">'.$value.' '.$type.'</td>');
				}
			}
			
			
			
			if($type == 'days')
			{
				$value=$diff->d- $remain;
				
				if($diff->m != 0 || $diff->y != 0 )
				{
				echo('<td style="background-color:#DC143C;color:white">0 '.$type.'</td>');
				 
				}				
				else if($value > 0)
				{
				echo('<td style="background-color:#DC143C;color:white">0 '.$type.'</td>');
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
						echo('<td style="background-color:#DC143C;color:white">'.$value.' '.$type.'</td>');
					}
					else
					{
				   echo('<td style="background-color:#DC143C;color:white">'.$value.' '.$type.'</td>');
					}
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td style="background-color:#DC143C;color:white">'.$value.' '.$type.'</td>');
				}
			}
			
			if($type == 'months')
			{
				$value=$diff->m- $remain;
				if($diff->y != 0 )
				{
				echo('<td style="background-color:#DC143C;color:white">0 '.$type.'</td>');
				 
				}
				 else if($value > 0)
				{
				echo('<td style="background-color:#DC143C;color:white">0 '.$type.'</td>');
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
						echo('<td style="background-color:#DC143C;color:white">'.$value.' '.$type.'</td>');
					}
					else
					{
				  echo('<td style="background-color:#DC143C;color:white">'.$value.' '.$type.'</td>');
					}
					}
				else
				{
				echo('<td style="background-color:#DC143C;color:white">'.$value.' '.$type.'</td>');
				}
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td style="background-color:#DC143C;color:white">'.$value.' '.$type.'</td>');
				}
			}


			 
			
			
			   $DataBase = new Database();
             $strQuery4='select * from project where PK_ID='.$proj;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_Proj'];
		 
             
               echo('<td style="background-color:#DC143C;color:white">');

			   echo($name.'</td>');
			   }
  
  
 echo('</tr>');
	}
	 
	?>
    
    </tr>
    </table>
    
   

 

