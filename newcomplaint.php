<?php session_start();
if(!$_SESSION['name'])
  header("Location:http://localhost/officer_login.php");	 
 ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">    <!-- Use For Security Purpose Avoid From Cross Scripting -->
<meta content=""initial-scale=1,minimum-scale=1,width=device-width" name="viewport"> 
<meta content="HTML,CSS" name="keywords">
<meta content="Online Complaint" name="Complaints">
<meta content="author" name="Mohd Sadab,Faizan Ameen">
<style>
<!--
ul
{
	list-style-type:none;
	margin:0px;
	padding:0px;
	position:fixed;
	overflow:hidden;
	background-color:BLUE;
	
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
-->
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;

    overflow: hidden;
    border: 1px solid #e7e7e7;
    background-color: #f3f3f3;
}

li {
    float: left;
}

li a {
    display: block;
    color: #666;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #ddd;
}

li a.active {
    color: white;
    background-color: #4CAF50;
}

#image{
	position:fixed;
	height:100px;
	top:0px;
	width:20%;
	border-radius:5px;
	z-index:999;
}
/*
form{
	top:500px;
    width: 400px;
	height:300px;
    box-sizing: border-box;
    //border: 2px solid #ccc;
    border-radius: 4px;
	border-color:red;
    font-size: 16px;
    //background-color: green;
   // background-image: url('searchicon.png');
    //background-position: 10px 10px; 
   float:right;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
   -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
	z-index:1000;
}*/

form:focus {
    width: 100%;
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

#head{
	position:fixed;
	text-align:center;
	z-index:1000;
	color:rgb(122, 111, 137);
	left:39%;
	//top:-10px;
	text-indent:5px;
	letter-spacing:2px;
	text-shadow:2px 1px PURPLE;
	font-style:italic;
}

#complaint
{
	position:absolute;
	height:300px;
	//width:400px;
	top:300px;
	left:30%;
	//background-color:black;
	
}

#name{
	position:absolute;
	 height:100px;
	 width:400px;
	 top:300px;
	 left:30%;
	 background-color:lightblue;
}

#floating-box{
   // display: inline-block;
    border: 3px solid #73AD21; 
	width:400px;
    resize:both; // for resizing the box in both direction
    height: 100px;
    margin: 10px;
	padding:10px;
    overflow:scroll; //for making scroll bar
    border-radius:3px;		
	
}


</style>
</head>
<body>
<h1 id="head">SWACHH BHARAT</h1>


<div class="header">

</div> 
<ul>
 <img id="image" src="swachh.jpg"/>
 <img id="icon_image" src="swachicon.jpg"/>
 </ul>
 
<ul>
<li><a    href="http://localhost/Viewcomplain.php" >Home</a></li>
<li><a  class="active" href="http://localhost/newcomplaint.php">NewComplaint</a> </li>
<li><a href="http://localhost/allComplaints.php">AllCompalint</a></li>
<li><a href="#about">About</a> </li>
<li><a href="http://localhost/contacto.php">ContactUs</a> </li>
<li><a href="http://localhost/officerlogout.php"> Logout </a></li>

</ul>

<!--
<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">NewComplaint</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
  <li><a href="user_logout.php">Logout</li>
</ul>
-->

<form method="post" action="">
  <input type="text" name="search" id="searchbox" placeholder="Search..">
</form> 

<div id="complaint">
<?php
 
 $con=mysqli_connect('localhost','root') or die(mysqli_error());
 mysqli_select_db($con,'db1');
  if(!$con)
  echo "<script> alert('Hello') </script>";
 
 $res="select* from comments";
 $query=mysqli_query($con,$res);
  $temp=0;
 if(!$query)
 {
	 echo "<script> alert('DATA BASE NOT FOUND') </script>";
 }
   $num=mysqli_num_rows($query);
 for($i=0;$i<$num;$i++)
 {
	 $val=mysqli_fetch_array($query);
	 if($val['comment_status']==1)
	 {
		$x = $val["Files"];
		//echo $x;
		$temp=1;
		
		if($x)
		{echo "<div id='floating-box'>".$val['comment_date'].'<br>'.'<br>'.$val['name'].'<br>'.'<br>'.$val['Address'].'<br>'.'<br>'.$val['comment_msg'].'<br>'.
	     "<img src='images/".$val['Files']."' height='300' width='400'>"."<br>"."</div>";
	//	"<button id='Approved' class='button'>Approve</button>"
		}
	//	."<button id='DisApproved' class='button'>Disapprove</div>"."</button>"."<br>";
	 else
	  echo "<div id='floating-box'>".$val['comment_date'].'<br>'.'<br>'.$val['name'].'<br>'.'<br>'.$val['Address'].'<br>'.'<br>'.$val['comment_msg']."<br>"."</div>";
	//	"<button id='Approved' class='button'>Approve</button>"
		
		}
 }
 if(!$temp)
 {
	 echo "<script> alert('NO NEW COMPLAINT IS REGISTER') </script>";
 }
 $res= "UPDATE comments SET comment_status=0 where comment_status=1";
		 $query=mysqli_query($con,$res);
 if(!$query)
 {
	 echo "<script> alert('DATA BASE NOT FOUND') </script>";
 }

?> 
</div>
</body>
</html>