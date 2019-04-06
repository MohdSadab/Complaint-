<?php
session_start();
if(isset($_SESSION['log']))
echo"<script> You have enter wrong id or password </script>";
unset($_SESSION['log']);
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
body{
background-image:url("chfinal.jpg");
background-repeat:no-repeat;
background-position:3px 8px;
}

#form{
width:300px;
padding:30px;
position:fixed;
margin:auto;
top:290px;
right:0px;
left:0px;
bottom:0px;

}
#officer{
padding:8px;
width:350px;
border-radius:4px;


}
#officer:focus
{
width:450px;
background-color:#9ACD32;//#98FB98;

}
#password{
top:340px;
padding:8px;
width:350px;
border-radius:4px;

}
#password:focus
{
width:450px;
background-color:#9ACD32;//#98FB98;
}
#button{
padding:8px;
top:390px;
width:350px;   
}
</style>
</head>
<body>
<form action="http://localhost/officer.php" method="post" id="form">

<tr>
<td>

<input type="text" name="name" placeholder="Enter Name" id="officer" required/>
</br>
</td>
</tr>
<tr>
<td>
</br>
<input type="password" id="password" placeholder="Enter Password" name="pass" required />
</br>
</tr>
</td>
<tr>
<td>
</br>
<input type="submit" value="Login" id="button" placeholder="Enter Password" />
</td>
</tr>
</form>
</div>

</body>
</html>