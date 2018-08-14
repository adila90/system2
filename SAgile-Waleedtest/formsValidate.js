  
 function formValidation()  
    {  
var p=document.forms["form"]["name"].value;
 
var p2=document.forms["form"]["desc"].value;
 var SDate=document.forms["form"]["date5"].value;
   var FDate=document.forms["form"]["date7"].value;
 var dt1   = parseInt(SDate.substring(8,10));
var mon1  = parseInt(SDate.substring(5,7)); 
var yr1   = parseInt(SDate.substring(0,4)); 
var date1 = new Date(yr1, mon1-1, dt1);
 
 var dt2   = parseInt(FDate.substring(8,10));
var mon2  = parseInt(FDate.substring(5,7)); 
var yr2   = parseInt(FDate.substring(0,4)); 
var date2 = new Date(yr2, mon2-1, dt2);
 
if(date1 > date2) 
{
	alert("The start date can not be bigger than the finish date");
 
       return false;
}
else if (SDate =="0000-00-00" || FDate =="0000-00-00")
{
	alert("the start date and the end date must be specified ");
	 return false;
}

 
 
else if (p==null || p=="" || p2==null || p2=="")
  {
  alert("All Fields are comulsory");

 
  return false;
 
	

  }
 

    
	}
	 
 function formValidation2()  
    {  
 
var p=document.forms["loginFrm"]["name"].value;
 
var p2=document.forms["loginFrm"]["pass"].value;
 
 
if (p==null || p=="" || p2==null || p2=="")
  {
  alert("All Fields are comulsory");

 
  return false;
 
	

  }
	}
 

  function formValidation3()  
    {  
	 
var p5=document.forms["form2"]["name2"].value;
 
 
var p6=document.forms["form2"]["desc2"].value;
 
 var SDate=document.forms["form2"]["date5"].value;
   var FDate=document.forms["form2"]["date7"].value;
 var dt1   = parseInt(SDate.substring(8,10));
var mon1  = parseInt(SDate.substring(5,7)); 
var yr1   = parseInt(SDate.substring(0,4)); 
var date1 = new Date(yr1, mon1-1, dt1);
 
 var dt2   = parseInt(FDate.substring(8,10));
var mon2  = parseInt(FDate.substring(5,7)); 
var yr2   = parseInt(FDate.substring(0,4)); 
var date2 = new Date(yr2, mon2-1, dt2);
 
 if (p5==null || p6==null || p5=="" || p6=="")
{
	alert("All Fields are comulsory");
	 
     
  return false;
 } 
else if(date1 > date2) 
{
	alert("The start date can not be bigger than the finish date");
	 
       return false;
} 
else if (SDate =="0000-00-00" || FDate =="0000-00-00")
{
	alert("the start date and the end date must be specified ");
	 return false;
}



    
	}   
	
	
	 function formValidation4()  
    {  
	 
var p5=document.forms["AddStoryform"]["title"].value;
 
 
var p6=document.forms["AddStoryform"]["description"].value;
  var p7=document.forms["AddStoryform"]["original"].value;
  var type=document.forms["AddStoryform"]["select10"].value;
  
  
   var PDate=document.forms["AddStoryform"]["projDate"].value;
   
 var SDate=document.forms["AddStoryform"]["date5"].value;
 
   var FDate=document.forms["AddStoryform"]["date7"].value;
   
   
 var dt1   = parseInt(SDate.substring(8,10));
var mon1  = parseInt(SDate.substring(5,7)); 
var yr1   = parseInt(SDate.substring(0,4)); 
var date1 = new Date(yr1, mon1-1, dt1);//the start date
 
 var dt2   = parseInt(FDate.substring(8,10));
var mon2  = parseInt(FDate.substring(5,7)); 
var yr2   = parseInt(FDate.substring(0,4)); 
var date2 = new Date(yr2, mon2-1, dt2);//the finisth date

 var dt3   = parseInt(PDate.substring(8,10));
var mon3  = parseInt(PDate.substring(5,7)); 
var yr3   = parseInt(PDate.substring(0,4)); 
var date3 = new Date(yr3, mon3-1, dt3);// the project date
 
p7=parseInt(p7);

  if (p5==null || p6==null || p5=="" || p6=="" || p7==null || p7=="")
{
	alert("All Fields are comulsory");
	 
     
  return false;
 } 
else if(date1 > date2) 
{
	alert("The start date can not be bigger than the finish date");
	 
       return false;
} 
else if (SDate =="0000-00-00" || FDate =="0000-00-00")
{
	alert("the start date and the end date must be specified ");
	 return false;
}
else if(date2 > date3)
{
	alert("The story finish date should not exceed the project finish date");
	return false;
}  
 else if(type == "days")
{
	 var days=dt1+p7;
	 
	 var checkDate=new Date(yr1, mon1-1, days);
 
	 
	 if(checkDate > date2)
	 {
		 alert("your story original esitmate exceeded the story finish date date");
		 return false;
	 }
}   
else if(type == "months")
{
	 var months=mon1+p7;
 
	 
	 var checkDate=new Date(yr1, months-1, dt1);
 
	 
	 if(checkDate > date2)
	 {
		 alert("your story original esitmate exceeded the story finish date date");
		 return false;
	 }
}   
	}   
	
		 function formValidation5()  
    {  
	 
var p5=document.forms["EditStoryform"]["title"].value;
 
 
var p6=document.forms["EditStoryform"]["description"].value;
  var p7=document.forms["EditStoryform"]["original"].value;
   var PDate=document.forms["EditStoryform"]["projDate"].value;
   
 var SDate=document.forms["EditStoryform"]["date5"].value;
 
   var FDate=document.forms["EditStoryform"]["date7"].value;
     var type=document.forms["EditStoryform"]["select10"].value;
 
 var dt1   = parseInt(SDate.substring(8,10));
var mon1  = parseInt(SDate.substring(5,7)); 
var yr1   = parseInt(SDate.substring(0,4)); 
var date1 = new Date(yr1, mon1-1, dt1);
 
 var dt2   = parseInt(FDate.substring(8,10));
var mon2  = parseInt(FDate.substring(5,7)); 
var yr2   = parseInt(FDate.substring(0,4)); 
var date2 = new Date(yr2, mon2-1, dt2);

 var dt3   = parseInt(PDate.substring(8,10));
var mon3  = parseInt(PDate.substring(5,7)); 
var yr3   = parseInt(PDate.substring(0,4)); 
var date3 = new Date(yr3, mon3-1, dt3);
 p7=parseInt(p7);
 if (p5==null || p6==null || p5=="" || p6=="" || p7==null || p7=="")
{
	alert("All Fields are comulsory");
	 
     
  return false;
 } 
else if(date1 > date2) 
{
	alert("The start date can not be bigger than the finish date");
	 
       return false;
} 
else if (SDate =="0000-00-00" || FDate =="0000-00-00")
{
	alert("the start date and the end date must be specified ");
	 return false;
}
else if(date2 > date3)
{
	alert("The story finish date should not exceed the project finish date");
	return false;
}
 else if(type == "days")
{
	 
	 var days=dt1+p7;
	 
	 var checkDate=new Date(yr1, mon1-1, days);
 alert(checkDate);
	 
	 if(checkDate > date2)
	 {
		 alert("your story original esitmate exceeded the story finish date date");
		 return false;
	 }
}   
else if(type == "months")
{
	 var months=mon1+p7;
 
	 
	 var checkDate=new Date(yr1, months-1, dt1);
 
	 
	 if(checkDate > date2)
	 {
		 alert("your story original esitmate exceeded the story finish date date");
		 return false;
	 }
}
    
	} 
	function valueselect(sel)
	{
	 var desc = sel.options[sel.selectedIndex].value;
	 var name=  sel.options[sel.selectedIndex].text;
     var id=  sel.options[sel.selectedIndex].id;
	 
	 
	 
	 document.getElementById("name2").value=name;
	  document.getElementById("desc2").value=desc;
		  document.getElementById("hidden").value=id;
		
	}
	function valueselect2(sel)
	{
	 var desc = sel.options[sel.selectedIndex].value;
	 var name=  sel.options[sel.selectedIndex].text;
     var id=  sel.options[sel.selectedIndex].id;
	 
 
	 
	 document.getElementById("name3").value=name;
	  document.getElementById("desc3").value=desc;
		  document.getElementById("hidden2").value=id;
		
	}
	function valueselect3(sel)
	{
	  
		    var id=  sel.options[sel.selectedIndex].id;
			 
			location.href="main.php?page=backlog&proj="+id;
			 
	 

	}
	function TeamRefresh(sel)
	{
		 var Pid=document.getElementById("TR").value;
		   var Story=document.getElementById("story").value;
	   var projDate=document.getElementById("projDate").value;
		    var id=  sel.options[sel.selectedIndex].id;
			 
			location.href="main.php?page=addStory&proj="+Pid+"&Team="+id+"&story="+Story+"&projDate="+projDate;
			 
	 

	}
	
	function Refresh(sel)
	{
		 var Pid=document.getElementById("TR").value;
		   var Story=document.getElementById("story").value;
	   var projDate=document.getElementById("projDate").value;
		    var id=  sel.options[sel.selectedIndex].id;
			 
			location.href="main.php?page=addToTask_T&proj="+Pid+"&Team="+id+"&story="+Story+"&projDate="+projDate;
			 
	 

	}
	function EditTeamRefresh(sel)
	{
	 
		 var Pid=document.getElementById("ER").value;
		  
	        var Story=document.getElementById("St").value;
			 var projDate=document.getElementById("projDate2").value;
		    var id=  sel.options[sel.selectedIndex].id;
			 
			location.href="main.php?page=editStory&proj="+Pid+"&Team="+id+"&story="+Story+"&projDate="+projDate;
			 
	 

	}
	function copyTo(sel,Pid)
	{
	  
		    var id=  sel.options[sel.selectedIndex].id;
			 var desc = sel.options[sel.selectedIndex].value;
	         var name=  sel.options[sel.selectedIndex].text;
			   var name2=  sel.options[sel.selectedIndex].class;
			location.href="main.php?page=backlog&proj="+Pid+"&newProj="+id+"&story="+desc;
			 
			 
			//location.href="main.php?page=backlog&proj="+id;
		

	}
	function copyToSub(sel,subid)
	{
	  
		    var id=  sel.options[sel.selectedIndex].id;
			 var desc = sel.options[sel.selectedIndex].value;
	         var name=  sel.options[sel.selectedIndex].text;
			   var name2=  sel.options[sel.selectedIndex].class;
			location.href="main.php?page=Subbacklog&Sub="+subid+"&newSub="+id+"&story="+desc;
			 
			 
			//location.href="main.php?page=backlog&proj="+id;
		

	}
	function main()
	{
			location.href="main.php";
	}
	
	function manageVersion(id)
	{
			location.href="main.php?page=manageVersions&proj="+id;
	}
	function Team(id)
	{
			location.href="main.php?page=Team&Team="+id;
	}
	function Teams()
	{
			location.href="main.php?page=Teams";
	}
	function backlog(id)
	{
			location.href="main.php?page=backlog&proj="+id;
	}
	
	function Sbacklog(SubId,ProjId)
	{
			location.href="main.php?page=Subbacklog&proj="+ProjId+"&Sub="+SubId;
	}
	
	function manageSprint(Pid,Vid)
	{
			location.href="main.php?page=manageSprints&proj="+Pid+"&Ver="+Vid;
	}
	function assignRemain()
	{
		 
	  
	 var p=document.forms["AddStoryform"]["original"].value;
	 document.forms["AddStoryform"]["Res"].value=p;
	 
	  
	}
	function assignRType(sel,sel2)
	{
		var name=  sel.options[sel.selectedIndex].text;
		var index= sel.selectedIndex;
 
	sel2.selectedIndex=index;
	  
	  
	  
	}
	
    function Vchart(v)
	{
 
			location.href="main.php?page=Vchart&Ver="+v;
	}