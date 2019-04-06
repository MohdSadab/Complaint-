<?php
session_start();


//mysqli_select_db($con,'db1');
if(!isset($_SESSION['Aadhar']))
{
	//echo "yes";
	//echo '<script> alert('please Login') </script>';
 header('Location:http://localhost/validationUserAccount.html');
}
$con=mysqli_connect('localhost','root','','db1') or die(mysqli_error());

$res="select* from comments  ORDER BY insertId DESC LIMIT 10";
 $query=mysqli_query($con,$res);

 if(!$query)
 {
	 echo "<script> alert('DATA BASE NOT FOUND') </script>";
 }
 $temp=0;
   $num=mysqli_num_rows($query);
 for($i=$num-1;$i>=0;$i--)
 {
	 $val=mysqli_fetch_array($query);
	 if($val['comment_id']==$_SESSION['Aadhar'])
	 {
		if($val['comment_status']=='0')	
		{
			$temp=1;
			echo "<script> alert('Complaint is viewed by the officer ') </script>";
			//echo "<script> alert('".$val['comment_msg']."') </script>";
	   }
	   break;
	 }
 }
 if($temp==0)	
		{
		
			echo "<script> alert('Complaint is not viewed yet by the officer') </script>";
			//echo "<script> alert('".$val['comment_msg']."') </script>";
	   }
	  

?>
<!DOCTYPE HTML>
<html>

<head>
<meta charset="utf-8">    <!-- Use For Security Purpose Avoid From Cross Scripting -->
<meta content=""initial-scale=1,minimum-scale=1,width=device-width" name="viewport"> 
<meta content="HTML,CSS" name="keywords">
<meta content="Online Complaint" name="Complaints">
<meta content="author" name="Mohd Sadab,Faizan Ameen">
<style type="text/css">


h2
{
	height:350px;
	width:400px;
    padding:30px;
 
  margin:auto;
  position:absolute;
  top:0;
  left:0;
  right:0;
  bottom:0;
}
h4{
	color:WHITE;
}
body{
	margin:0;
}
ul
{
	list-style-type:none;
	margin:0px;
	
	padding:0px;
	position:fixed;
	overflow:hidden;
	background-color:LIGHTBLUE;
	
	top:100px;
	width:100%;
	border-radius:4px;
	z-index:999;
}

li {
  float:left;	
}
li a{
	display:block;
	color:white;
	text-decoration:none;
	padding:14px 16px;
	text-align:center;
	
}

.active
{
	background-color:GREEN;
}

li a:hover:not(.active)
{
	background-color:#111;
}

h2{
	color:WHITE;
	//position:fixed;
}
button{
	margin:8px;
	top:0px;
	padding-bottom:1px;
	background-color:CLAY;
	border-radius:4px;
	height:30px;
}
button:hover{
	opacity:0.8;
}
#image{
	position:fixed;
	height:100px;
	top:0px;
	width:20%;
	border-radius:5px;
	z-index:999;
}

.header{
	
	position:fixed;
	height:150px;
	top:-30px;
	
	//text-align:center;
	color:white;
	background-color:#00cc66;
	width:100%;
	z-index:999;
}
body{
	background-color:#444;
}
#head{
	text-align:center;
	color:PURPLE;
	z-index:999;
	position:fixed;
}
#icon_image{
	position:fixed;
	height:100px;
	top:0px;
	width:8%;
	border-radius:5px;
	z-index:1000;
	right:5px;
}
</style>
</head>
<body>
<h1 id="head">Swachh Bharat</h1>
<div class="header">

</div>
 <img id="image" src="swachh.jpg"/>
 <img id="icon_image" src="swachicon.jpg"/>
<ul>
<li><a href="http://localhost/complain.php" >HOME</a></li>
<li><a class="active" href="http://localhost/status.php">STATUS</a> </li>
<li><a href="http://www.bbc.com/news">NEWS</a></li>
<li><a href="#about">ABOUT</a> </li>
<li><a href="http://localhost/contact.php">CONTATCT US</a> </li>
<li onclick="return temp()"> <a href="http://localhost/user_logout.php">LOGOUT </a></li>
</ul>


<body/>
</html>