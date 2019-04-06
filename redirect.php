<html>
<head>
<meta charset="utf-8">    <!-- Use For Security Purpose Avoid From Cross Scripting -->
<meta content=""initial-scale=1,minimum-scale=1,width=device-width" name="viewport"> 
<meta content="HTML,CSS" name="keywords">
<meta content="Online Complaint" name="Complaints">
<meta content="author" name="Mohd Sadab,Faizan Ameen">


<style>
body{
background-color:48d1cc;
}
#otp{
 
 width:400px;
 height:250px;
 padding:30px;
 margin:auto;
 position:absolute;
 top:0px;
 bottom:0px;
 left:0px;
 right:0px;
 background-color:rgb(150,206,250);
 border-radius:20px;
 
}
#text{
top:10px;
padding:10px;
border-radius:9px;
background-color:LIGHTGREEN;
}
#text:focus{
width:300px;
}
#submit{
width:200px;
padding:10px;
border-radius:8px;
}
#valid{
color:PURPLE;
text-align:CENTER;
}
</style>
</head>
<body>
<form id="otp"  method="post" action="http://localhost/complain.php">
<h4 id="valid">Please check your email id for otp</h4>
<input type="text" id="text" placeholder=" Enter One Time Password" required/><br><br>
<input type="submit" id="submit" /><br><br>
</form>

</body>
</html>
