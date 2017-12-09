<?php


	$servername = "mysql6.000webhost.com";
	$username = "a1024053_rony";
	$password = "r13701005";
	$dbname = "a1024053_bit";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$myusername = $_POST['user'];
	$mypassword = $_POST['pass'];
	
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);

	$query = "SELECT * FROM user WHERE uname = '$myusername' AND upass = '$mypassword'";
	
	$result = mysqli_query($conn, $query);

	$count = mysqli_num_rows($result);

	if ($count>0) {

		echo "Successfully Logged in";

		session_start();
		$_SESSION['userloggedin'] = 1;
		
		
		echo '<script type="text/javascript">alert("Login Succesful")</script>';
		header('Location: pages/admin.php');


		//echo "<script> window.open('pages/admin.php', '_blank') </script>";


	} else {

		echo "Login Failed<br>Try Again with Correct Username and Password";
		
    	//exit;
	}
	mysqli_close($conn);
?> 