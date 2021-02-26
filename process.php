<?php
	session_start();
	
?>
<!doctype html>
<html lan="en">
	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<title>Validation Results</title>
			<link rel="stylesheet"  href="css/style.css"> 
	</head>
	<body class="page2">
		<main>
			<h1>User Input Validation Results</h1>
			
			<?php
			// define variables and set to empty values
			$nameErr = $emailErr = $phoneErr = "";
			$name = $email = $phone = "";

			if(!empty($_SESSION['first']) && !empty($_SESSION['email']) && !empty($_SESSION['phone']));
			{
			
			echo '<p><b><br>Thank you ' .$_SESSION['first'] .', your credentials are valid.' .'<br>Email: '.$_SESSION['email'].'<br>Phone: '.$_SESSION['phone'].'</b><br><br></p>';
			
			} //else header("location: index.php(-1)");  // how to return back if the data is invalid??????
			
			?>
			 
			<form action='index.php' method='post/'>
			<button onclick="goBack()">Go Back</button>
			<script> function goBack() {window.history.back(); }</script>
		</main>
			<img src="img/MinionsExcited.gif" id="bg2" alt="">
	</body>
</html>

