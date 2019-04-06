<?php
session_start();
$con=mysqli_connect('localhost','root','','profile') or die(mysqli_error());
//mysqli_select_db($con,'db1');
/*if(!isset($_SESSION['Email']))
{
	//echo "yes";
	//echo '<script> alert('please Login') </script>';
 header('Location:http://localhost/signin.php');
}
else*/{
//echo $_SESSION['Aadhar'];
$Fname=isset($_POST['Fname'])?$_POST['Fname']:"NULL ";
$Lname=isset($_POST['Lname'])?$_POST['Lname']:"";
$email=isset($_POST['comment'])?$_POST['comment']:" ";
//echo $temp_Complain."</br>";
//echo $_FILES['uploadFile']['tmp_name'];
//$images=isset($_FILES['uploadFile'])?$_FILES['uploadFile']:'';
$target = "files/".basename($_FILES['uploadFile']['name']);
$image = $_FILES['uploadFile']['name'];
//$image_text = mysqli_real_escape_string($db, $_POST['image_text']);
/*
$temp_name=isset($_POST['name'])?$_POST['name']:"";
$desc=isset($_POST['desc'])?$_POST['desc']:"";
$image = addslashes($_FILES['uploadFile']['tmp_name']);
$imagename = addslashes($_FILES['uploadFile']['name']);
$type=$_FILES['uploadFile']['type'];
$image=file_get_contents($image);
$image=base64_encode($image);
$que="Insert into userUpload(Email,Name,Description,dataFile) Values('".$_SESSION['Email']."','".$temp_name."','".$desc."','".$image."')";
	mysqli_query($con,$que) or die("Query Error");
 */
$target="images/".basename($_FILES['uploadFile']['name']);
//echo $images;

	//$images=addslashes(file_get_contents($_FILES['uploadFile'])); //addslashes is added for prevent injection;
	//echo $images;
	//$size=getimagesize($images['tmp_name']);
	      $date=new DateTime();
		  $dat=$date->format('d-m-Y');
	$db="INSERT INTO comments(comment_id,comment_status,comment_msg,name,Address,Files)
values('".$_SESSION['Aadhar']."',1,'".$temp_Complain."','".$temp_name."','".$dat."','".$address."','".$image."')";
    
	$query=mysqli_query($con,$db);
	if(!$query)
	{
		echo "<script>alert('QUERY_IS_NOT_RUN')</script>";
	}
	if(file_exists($target))
	{
		echo"<script> alert('File Already Exsits') </script>";
	}
	else
	{
	move_uploaded_file($_FILES['uploadFile']['tmp_name'],$target);
	}	
$_SESSION['submit']=1;
header("Location:http://localhost/complain.php");
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

#comment{
	border-radius:10px;
	background-color:#E5FFCC;
}
#comment:focus{
	background-color:#CCFF99;
}
#name{
	height:40px;
  padding:10px;
  margin:100px;
  position:absolute;
  top:-120px;
  left:-70px;
  right:0;
  bottom:0px;
  border-radius:5px;
  background-color:#E5FFCC;
}
#name[type="text"]:focus
{
	width:300px;
	background-color:#CCFF99;
}

#select{
	height:50px;
	padding:10px;
    margin:0px;
	border-radius:5px;
	background-color:#E5FFCC;
	//padding:10px;
}
#select:focus{
	background-color:#CCFF99;
	width:300px;
}
form
{
width:50%;
  height:300px;
  padding:30px;
  margin:auto;
  position:absolute;
  top:220px;
  //background-image:url("swachh.jpg");
  left:0;
  right:0;
  bottom:0;
}
/*
h3{
	list-style-type:none;
	margin:0px;
	padding:10px;
	position:fixed;
	overflow:hidden;
	height:50px;
	background-color:KHAKI;
	top:0px;
	text-align:center;
	color:GREEN;
	width:100%;
	border-radius:5px;
	z-index:999;
}*/
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
	background-color:BLUE;
	
	top:85px;
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
</style>
<script>
 function temp()
 {
	 
	alert("You Have Successfull logout");
	
 }
</script>
</head>
<body>
<h1 id="head">Swachh Bharat</h1>
<div class="header">

</div>
 <img id="image" src="swachh.jpg"/>
 
<ul>
<li><a href="file:///C:/Users/sadab/Desktop/validation%20user%20account.html" class="active">HOME</a></li>
<li><a href="http://localhost/status.php">STATUS</a> </li>
<li><a href="http://www.bbc.com/news">NEWS</a></li>
<li><a href="#about">ABOUT</a> </li>
<li><a href="#CONTACT">CONTATCT US</a> </li>
<li onclick="return temp()"> <a href="user_logout.php">LOGOUT </a></li>
</ul>
<div  style="padding:20px;margin-top:30px;background-color:#444;height:1500px;">
<h2  name="welcome" >WelCome To Complain System </h2>

</div>
<!--<h4 name="writecompain" bgcolor="WHITE">Write Your Comlaint Here</h4> -->
<form method="POST" action="http://localhost/uploadImage.php" enctype="multipart/form-data">

<input type="text" id="name" placeholder=" Enter Name" name="name" required/>
<!--<select class="city" height="20" name="address" required>
<option  value="1" > Select Address </option>
<option  value="1">Near Nadeem Tarin Hall Sir Syyed Nagar Aligarh</option>
<option  value="1">Dodhpur Near Ameen Nisha Market Aligarh</option>
<option  value="1">Ramghat Road Aligarh</option>
<option value="1">Near Great Value Mall Aligarh</option>
<option value="1">Zhakariya Market Aligarh</option>
</select>-->
<input type="text" id="select" placeholder=" Enter Address..." name="address" required/>
</br> </br></br>
<textarea  id="comment" rows="15" cols="100" name="comment"  required> Suggestions/write complaint here</textarea>
<button type="Submit"  class="submit" >SUBMIT COMPLAINT</button>
<input type="file" name="uploadFile" id="file"/>
</form>

<body/>
</html>
