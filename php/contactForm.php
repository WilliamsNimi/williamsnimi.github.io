<?php
	include 'db.php';
	
	$email = $_POST['email'];
	$name = $_POST['name'];
	$message = $_POST['message'];
	$mobileNum = $_POST['mobileNum'];
	$emailMessage ="";
	
	if($email != "" && $name != "" && $message != "" && $mobileNum != "")
	{
		$email = stripslashes($email);
		$name = stripslashes($name);
		$message = stripslashes($message);
		$mobileNum = stripslashes($mobileNum);
		
		$email = mysqli_real_escape_string($connection, $email);
		$name = mysqli_real_escape_string($connection, $name);
		$message = mysqli_real_escape_string($connection, $message);
		$mobileNum = mysqli_real_escape_string($connection, $mobileNum);
		
		if(filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$emailMessage = $email." ". $name. " ". $mobileNum. " ". $message;
			$emailMessage = wordwrap($emailMessage,100);
			mail("williamson.nimi@gmail.com", "Rentaplace Client", $emailMessage);
			echo "Email sent successfully";
		}
		else 
			echo "Email is invalid";
	}
	else
		echo "error! empty fields";
	
	
?>