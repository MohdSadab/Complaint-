<?php
$id = isset($_POST['Aadhar']) ? $_POST['Aadhar'] : '';
$pass = isset($_POST['DOB']) ? $_POST['DOB'] : '';
//$pri = isset($_POST['price']) ? $_POST['price'] : '';
//echo $id;
$con=mysqli_connect('localhost','root');
if($con)
	echo "CONNECTION STABLISHED\n";
else
	echo "CONNECTION NOT STABLISHED\n";
 mysqli_select_db($con,'db1');
 //echo $id;
$q="insert into User(id,Password) values($id,'pass')";
$i=mysqli_query($con,$q);

if(!$i)
	echo "YES";
else
	echo "NO";
mysqli_close($con);



?>