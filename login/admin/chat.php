<?php
	include "../config.php";
	// getting user information 
	if(isset($_POST['submit'])){
		// mysqli_real_escape_string set for security region
		$user = mysqli_real_escape_string($con, $_POST['user']);
		$message = mysqli_real_escape_string($con, $_POST['message']);

		// set timezone for india
		date_default_timezone_get();
		$time = date('h:i:s', time()); 

		//validity input
		if(!isset($user) || $user == '' || !isset($message) || $message == ''){
			$error = '<script>alert("Please fill username and message")</script>';
			header("location : index.php");
			die();
		}
		else{
			$query = "INSERT INTO chat(user,message,time) VALUES('$user','$message','$time')";
			if(!mysqli_query($con, $query)){
				die("Submit Failed ".mysqli_error($con));
			}
			else{
				header("location : index.php");
				die();
			}
		}

	}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
    </head>
    <body>
	<!-- header File  -->
	<div class="container" style="margin-top: 50px;">
		<header>
			<h1>
					Chat
			</h1>
		</header>
	</div>
	<!-- ==== Displaying User Msg ==== -->
	<?php
		// Creat Select Query
		$query = "SELECT * FROM chat ORDER by id DESC";
		$chat = mysqli_query($con, $query);
	?>
	<div id="shouts" class="container p-4">
		<ul class="list-group list-group-flush">
			<?php while($row = mysqli_fetch_assoc($chat)) : ?>
				<li class="list-group-item">
					<span><?php echo $row['time'] ?> - </span><strong><?php echo $row['user'] ?></strong> : <?php echo $row['message'] ?>
				</li>
			<?php endwhile; ?>
		</ul>
	</div>
	<!-- Input Form in PHP -->

	<?php if(isset($_GET['error'])) : ?>
		<div class="error"><?php echo $_GET['error'] ?></div>
	<?php endif; ?>

	<form method="post" action="chat.php">
		<div class="input-group container">
		    <span class="input-group-text">First and last name</span>
		    <input type="text" aria-label="First name" class="form-control" type="text" name="user" placeholder="Enter Your Name" />
		    <input type="text" aria-label="Last name" class="form-control" type="text" name="message" placeholder="Enter Your Message" />
		    <input class="btn btn-primary" type="submit" name="submit" value="SHOUTOUT">
		</div>
	</form>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>