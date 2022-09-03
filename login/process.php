<?php

	include 'config.php';
	
	header('X-Frame-Options: DENY');
	header('X-XSS-Protection: 1; mode=block');
	header('X-Content-Type-Options: nosniff');

	session_start();

	if ($_SERVER['REQUEST_METHOD']=='POST'){

		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		
		if(!isset($username) || $username == '' || !isset($password) || $password == ''){
			header('location: index.php', true);
		}
		else{
			$sql= "SELECT * FROM loginsystem WHERE username = '$username' AND password = '$password' ";
			$result = mysqli_query($con,$sql);

			$check = mysqli_fetch_array($result);

			if(isset($check)){
				$_SESSION['IS_LOGIN'] = 'yes';
				header('location: admin/dashboard.php', true);
				die();
			}else{
				header("location: index.php");
			}
		}

		// if(mysqli_num_rows($result)>0){
		// 	$_SESSION['IS_LOGIN'] = 'yes';
		// 	header('location: admin/dashboard.php', true);
		// 	die();
		// }
	}

?>


