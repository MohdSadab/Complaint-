<?php
session_start();
$id = isset($_POST['Aadhar']) ? $_POST['Aadhar'] : 'NOT NULL';
//$pass = isset($_POST['DOB']) ?date('y-m-d',strtotime( $_POST['DOB'] )): 'NOT NULL';
$pass = isset($_POST['DOB']) ?( $_POST['DOB'] ): 'NOT NULL';

$con=mysqli_connect('localhost','root');
if(!$con)
	echo "CONNECTION NOT STABLISHED\n".mysql_error();

 mysqli_select_db($con,'db1');
  // echo $id;
//$q="insert into User(ID,DOB) values('$id','$pass')";
//$i=mysqli_query($con,$q);
//if(!$i)
//	echo $id;
//else
//	echo "NO"."<br>";

$row="Select* from user";
$result=mysqli_query($con,$row);
$num=mysqli_num_rows($result);

if(mysqli_num_rows($result)>0)
{
	//while($val=mysqli_fetch($result))
		$check=0;
		for($i=0;$i<$num;$i++)
	{
		$val=mysqli_fetch_array($result);
		//echo  "id : ".$val['ID']."  ".$val['DOB']."<br>";
		//echo $val['DOB']==$pass." ".$pass;
		//echo $pass;
		//&& $val['ID']==&pass
		if($val['ID']==$id  && $val['DOB']==$pass)
		{
			$check=1;
			//echo "VALID_USER"."<br>";
			$_SESSION['Aadhar']=$id;
            $_SESSION['pass']=$pass;
			header("Location:http://localhost/redirect.php");
		}
		
	}
	if($check==0)
		//echo"no";
	header("Location:http://localhost/invalid.php");	
}
mysqli_close($con);



?>