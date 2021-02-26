
<?php
	session_start();
	
?>

<!doctype html>
<html lan="en">
	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<title>My Validation Project</title>
			<link rel="stylesheet" type="text/css" href="css/style.css"> 
	</head>
		<body class="page1">
			<main>
				<h1>Welcome to My Validation page</h1>
				
					
					<?php
						
				
						
						if(empty($_POST['click-submitButton'])) //check that the submit
						{
							//Checks the URL for the below GET variables
							if(!empty($_GET['f'])) $f = $_GET['f']; else $f="";
							if(!empty($_GET['e'])) $e = $_GET['e']; else $e="";
							if(!empty($_GET['ph'])) $ph = $_GET['ph']; else $ph="";
								
							//display the variable values from the user input)
							echo '<form id="userInput" method="post" action="">';
								echo '<input placeholder="First Name" value="'.$f.'" type="text" name="first">';
								echo '<input placeholder="Email Address" value="'.$e.'" type="text" name="email">';
								echo '<input placeholder="Phone Number" value="'.$ph.'" type="text" name="phone">';
								
								echo '<input type="reset" value="Reset">'; 
								echo '<input type="submit" name="click-submitButton">';
							echo '</form>'; 
							
							//display error message if one or more items are not filled using the switch depending on what is missing. 
							if(!empty($_GET['ec'])) $ec = $_GET['ec']; else $ec = 0;
													
							switch ($ec)
							{
								
								case 1: echo "<p>Your First Name is either missing or in the wrong format</p>"; break;
								case 2: echo "<p>Your Email address is either missing or in the wrong format</p>"; break;
								case 3: echo "<p>Both your First Name and Email Address are missing or in the wrong format</p>"; break;
								case 4: echo "<p>Your Phone Number is missing or in the wrong format</p>"; break;
								case 5: echo "<p>Your First Name and Email Address are missing or in the wrong format</p>"; break;
								case 6: echo "<p>Your First Name, Email address, and Phone Number are missing or in the wrong format</p>"; break;
								case 7: echo "<p>Remember to fill all the items then click the submit button</p>"; break;
								
								case 8: echo "<p>Your Phone number is missing or in the wrong format</p>"; break;
								case 9: echo "<p>Check the format on your First Name, Email Address, or Phone number</p>"; break;
								case 12: echo "<p>Your Email address, and Phone Number are missing or in the wrong format</p>"; break;
								case 13: echo "<p>Remember to fill all the items then click the submit button</p>"; break;
								case 0: echo "<p>Please enter your Login Credentials</p>"; break;
							}
							
						}
						else 
						{
							//intial error counter
							$ec = 0;
							
							//This checks what items are filled and what needs to be added before clicking the submit button.
							if (!empty($_POST['first'])) $f = $_POST['first']; else {$f=""; $ec +=1;}
							if (!empty($_POST['email'])) $e = $_POST['email']; else {$e=""; $ec +=2;}
							if (!empty($_POST['phone'])) $ph = $_POST['phone']; else {$ph=""; $ec +=4;}
							
							// This is using regualr expressions for all three items to validate user input.
							if(!preg_match("/^[a-zA-Z-' ]*$/", $_POST['first'])) $ec +=1;
							if(!preg_match("/^([a-zA-Z0-9\+_\-]+)*@([a-z]+\.)+[a-z]{2,6}$/", $_POST['email'])) $ec +=2;
							if(!preg_match("/[(]\d{3}[)-]\d{3}[.-]\d{4}/", $_POST['phone'])) $ec +=4; 
							
			
			
							//if they missed anything then redirect, otherwise print the data
							if($ec) header('location: ?f='.$f.'&e='.$e.'&ph='.$ph.'&ec='.$ec); 
							
							// if all items are entered correctly then direct them to process.php with results.
							if(!$ec) header ('location: process.php');
							$_SESSION['first'] = $_POST['first'];
							$_SESSION['email'] = $_POST['email'];
							$_SESSION['phone'] = $_POST['phone'];
							
							//else echo "$f", " $e", " $ph"; // this prints out the results in the same page.
							
						}
											
					?>
			</main>
			
				<img src="img/tronView2.gif" id="bg1" alt="">
		</body>
</html>





