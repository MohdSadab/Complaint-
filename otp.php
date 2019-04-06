
<?php
	// Authorisation details.
	 //echo("OTP IS NOT SENT");
	 //session_start();
	//$user_id=isset($_POST['Aadhar'])?$_POST['Aadhar']:'NOT NULL' ;
	$con=mysqli_connect('localhost','root','') or die(mysqli_error());
	mysqli_select_db($con,'db1');
	echo $user_id;
	//$_SESSION['Aadhar']=$user_id;
	$query="Select* from User ";
	 $result=mysqli_query($con,$query);
	  $num=mysqli_num_rows($result);
	   $check=0;
	 for($i=0;$i<$num;$i++)
	 {
		 $val=mysqli_fetch_array($result);
	   
		if($user_id==$val['ID'])
			$check=$val['Phone'];
	 }
	  if($check>0)
	  {
		  
	$username = "anandselladurai@gmail.com";
	$hash = "149d456250daa8f3afdeea30c138dfc1e7e2a8b0f1530b35745fed7a75a5fb83";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "1";

	// Data for text message. This is the text message data.
	$sender = "Municipality Office"; // This is who the message appears to be from.
	$numbers = '+91'.$check;
	$_SESSION['Phone']='+91'.$numbers;
  //echo $numbers;	// A single number or a comma-seperated list of numbers
	$message = " Your One Time Password is ".rand(100000,999999)." please do not share this";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	 if($result==true)
	 {
		 
		 echo("OTP IS SENT");
		 header('Location:http://localhost/redirect.php');
		 
	 }
	 else
	 {
		 echo("OTP IS NOT SENT");
	 }
	curl_close($ch);
	  }
	  
?>
