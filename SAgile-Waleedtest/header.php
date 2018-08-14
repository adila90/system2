<? set_time_limit(60*60*60);
 session_start(); 
 include "Database.php";
 require_once('calendar/classes/tc_calendar.php');
  $DataBase = new Database();
  
  
 if (!isset($_SESSION['id'])) {
header('Location: index.html');
}
  
 //$User_Id= $_SESSION['User_Id'];
  //if($User_Id!=NULL || $User_Id=="" || !isset($User_Id)){
   // $User_Id=NULL;
  //}
?>

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  
 

<title>SAgile - Secure Software Development using Agile</title>
 
<head>
 

<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/form.css" media="screen">
 <script type="text/javascript" src="formsValidate.js"></script> 
<link rel="stylesheet" type="text/css" href="css/buttons.css" media="screen">
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
 
<link href="css/chart.css" rel="stylesheet" type="text/css" media="screen" />
<script language="javascript" src="calendar/calendar.js"></script>
 <link href="css/tree.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="tree.js"></script>
 
</head>

<body id="page1" bgcolor="#FFFFFF">
<table border=0 width="1024" align="center" class="clstbl2" valign="top">
     

    <tr height="100">
      <td valign="top" width="1024" align="center">
        <table border=0 width="1024" align="center">
          <tr>
           <td width="12" align="center" valign="top">&nbsp;</td>
           <td width="80" align="left" valign="top" bordercolor="#FFFFFF">
           <img src="images/scrum3.png" border="0" width="135" height="95" alt="SAgile">  </br>               
           </td>
           <td width="580" align="center" class="clstd" >&nbsp;
             <table border=0 width="786" align="center" >
               <tr>
                     <td width="30">&nbsp;</td>
                    <td width="500" align="center">&nbsp;&nbsp;  <span class="blueHead">Secure Agile (SAgile)</span> </td>
                     <td width="50">&nbsp;</td>

               </tr>
               <tr><td colspan="3">&nbsp;</td></tr>
               <tr>
                  <td width="30">&nbsp;</td>
                 <td width="500" class="clstd"></td>
                 <td width="50">&nbsp;</td>
               </tr>
                                           
                <tr>
                  <td width="30">&nbsp; </td>                  
                  <td width="500" class="clstd_red11" align="center"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This web application has been developed for secure project Managment Using agile (FDD) </td> 
                  <td width="50">&nbsp;</td>
               </tr>
             </table>
           </td>
           <td width="9" align="center" valign="top">&nbsp;</td>
           <td width="75" valign="top">
        
          </tr>
       </table>
    </td>
   </tr>
   <!--<tr><td align="center"><img src="images/sponser_list.jpg" width="100%"></td> </tr>-->
   <tr>
     <td align="center" colspan="3" class="clstd">&nbsp;&nbsp;&nbsp;&nbsp;
       <table border=0 width="1000" align="center">
        <tr class="clstd">
         <div class="container"><b class="rtop"><b class="r1"></b><b class="r2"></b><b class="r3"></b><b class="r4"></b></b></div>
          <td  width="8%"> </td>
          <td width="10%"> </td>
          <td width="13%"><a href="main.php">Manage Projects</a></td> 
          <td width="13%"><a href="main.php?page=backlog">Product Feature </a></td> 
           <td width="13%"><a href="main.php?page=Secbacklog">Security Feature </a></td>           
          <td width="10%"><a href="main.php?page=DefectLog"> Defect Features </a></td>
         
          <td width="10%"><a href="main.php?page=workflow"> WorkFlow Steps</a></td>
             <td width="10%"><a  style="float:right;" href="logout.php" > Logout</a></td>
          <td width="11%"> </td>
          <td width="10%"> </td>
         




       </tr>
     </table>
     
     
     
                <div class="container"><b class="rbottom"><b class="r4"></b><b class="r3"></b><b class="r2"></b><b class="r1"></b></b></div>
   </td>
 </tr>
 
 <!-- End od Header -->
 
 <tr>
   <td>
     <table border=0 width="1024" align="center" >
      <tr>
        <td  width="840" valign="top">