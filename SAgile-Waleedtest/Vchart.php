<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
<tr>
<center>
<div id="chartContainer">
<div id="chartHeader">
This chart shows the remaining effort in each Release
</div>
<div id="chart">
 
<ul>
<?
$counter=0;
$left=0;
 
$DataBase = new Database();
 
$strQuery4="select * from sprint where FK_Version_ID='$versionId'";
$DataBase->query($strQuery4);
$Rows = $DataBase->fetch_all();
foreach($Rows as $Row){
$Total=0;
$sprintId=$Row['PK_ID'];
$sname=$Row['sprint_name'];
  
$strQuery5="SELECT
stories.remain_Es,
stories.Es_Type,
stories.1st_time_date,
stories.PK_ID
FROM
stories ,
sprint_story
WHERE
stories.PK_ID = sprint_story.FK_Story_ID AND
sprint_story.FK_Sprint_ID = '$sprintId'";
$DataBase2->query($strQuery5);
$Rows2 = $DataBase2->fetch_all();

foreach($Rows2 as $Row2){
 $count=0;
  
$remain= $Row2['remain_Es'];
 
$type= $Row2['Es_Type'];
 
 
if($type == 'Mins')
{
 
$count +=$remain;	
 
}
if($type == 'Hrs')
{
 
 
$remain=$remain*60;
$count += $remain;
 
}
if($type == 'days')
{
 
$remain=$remain*24*60;
$count +=$remain;
 
 
}
 
if($type == 'months')
{
$remain=$remain*60*24*30;
$count +=$remain;
 
}
 
 
 
 $Total +=$count;
 
 
}

 
 
 
 

 
 
$Total2=0;
 

$DataBase2 = new Database();
$strQuery5="SELECT
stories.remain_Es,
stories.Es_Type,
stories.1st_time_date
FROM
stories ,
sprint_story
WHERE
stories.PK_ID = sprint_story.FK_Story_ID AND
sprint_story.FK_Sprint_ID = '$sprintId'";
$DataBase2->query($strQuery5);
$Rows2 = $DataBase2->fetch_all();

foreach($Rows2 as $Row2){
 $count=0;
$remain= $Row2['remain_Es'];
 
$type= $Row2['Es_Type'];
 
$date= $Row2['1st_time_date'];	
 
 
date_default_timezone_set('Asia/Singapore');
 
$date1 = new DateTime();
 
$date2 = new DateTime($date);
$diff = $date1->diff($date2);
 
if($type == 'Mins')
{
 
 
$value=$diff->i- $remain;
 
if($diff->h != 0 || $diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
{
 
$count +=0;
 
}
else if($value > 0)
{
 
$count +=0;
}
else
{
$value=abs($value);
 
 
$count +=$value;
 
}
}
if($type == 'Hrs')
{
 
 
 
 
$value=$diff->h- $remain;
 
if($diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
{
 
$count +=0;
}
else if($value > 0)
{
 
$count +=0;
}
else if($value==-1)
{	
 
$type="Mins";
$value=60-$diff->i;
 
 
$count +=$value;
}
else
{	
 
$value=abs($value);
 
 
$value=$value*60;
$count +=$value;
}
}
if($type == 'days')
{
 
$value=$diff->d- $remain;
 
if($diff->m != 0 || $diff->y != 0 )
{
 
$count +=0;
}	
else if($value > 0)
{
 
$count +=0;
}
else if($value==-1)
{
 
 
$type="Hrs";
 
$value=24-$diff->h;
 
if ($value==1)
{
 
$type="Mins";
$value=60-$diff->i;
 
$count +=$value;
}
else
{
 
$value=$value*60;
$count +=$value;
}
}
else
{	
 
 
$value=abs($value);
 
$value=$value*24*60;
$count +=$value;
}
}
if($type == 'months')
{
$value=$diff->m- $remain;
if($diff->y != 0 )
{
 
$count +=0;
}
else if($value > 0)
{
 
$count +=0;
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
 
$count +=$value;
}
else
{
 
$value=$value*60;
$count +=$value;
}
}
else
{
 
$value=$value*60*24;
$count +=$value;
}
}
else
{	
 
$value=abs($value);
 
 
$value=$value*60*24*30;
$count +=$value;
}
}
  
 
 $Total2 += $count;
}

 
 
 
 
 //echo $Total;
 

$var=(16/3);
$perch =round (($Total2 / $Total) * 100);
$perch=intval($perch);
 
echo(' <li><div class="bar" style="width:'.$perch.'%;"></div><div class="percentage">'.$perch.' % </div><div style="padding-right:3px;text-align:right" class="barTitle">'.$sname.'</div></li>');
 
}
 
echo('</ul>');
 
 
?>
 
</div>
</div>
</center>
</tr>
 
</table>
 
</td>
 
</tr>
 
<tr>
 
</tr>
</table>
 