

<?php
//session_start();
$name=isset($_POST['name'])?$_POST['name']:"NOT NULL ";
$password=isset($_POST['pass'])?$_POST['pass']:" NOT NULL";

$con=mysqli_connect('localhost','root','') or die(mysqli_error());
//echo $name."  ".$password."<br>";
mysqli_select_db($con,'profile');
	//echo "data base is select";
$db="select* from profile";
$result=mysqli_query($con,$db);
$num=mysqli_num_rows($result);

if(mysqli_num_rows($result)>0)
{$check=0;
for($i=0;$i<$num;$i++)
{
	$val=mysqli_fetch_array($result);
	
	//echo $val['Password']." ";
	if($val['Email']==$name && $val['pass']==md5($password))
	{
		$check=1;
		$_SESSION['name']=$name;
        $_SESSION['pass']=$password;
		//echo"yes"; 
		header('Location:http://localhost/Viewcomplain.php');
	}
}	
	if($check==0)
	{
		header('Location:http://localhost/signin.php');
		$_SESSION['log']=1;
	}

}
?>