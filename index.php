<html>
<head>

</head>


<body>

<?php

if(isset($_POST['submit']))
{
	if(!empty($_POST['number']) and !empty($_POST['nick']))
	{
		
		include 'src/whatsprot.class.php';
		include 'src/Registration.php'; 


		$username=$_POST['number'];   // Your number with country code, ie: 34123456789
		$nickname=$_POST['nick'];     // Your nickname, it will appear in push notifications
		$debug    = true;  // Shows debug log, this is set to false if not specified
		$log      = true;  // Enables log file, this is set to false if not specified

		// Create a instance of WhatsProt class.
		$w = new WhatsProt($username, $nickname, $debug, $log);

		// Create a instance of Registration class.
		$r = new Registration($username, $debug);

		$r->codeRequest('sms'); // could be 'voice' too
		//$r->codeRequest('voice');
		//$r->codeRegister('460160');

?>

		<h2>Enter the confirmation code</h2>

		<form method="POST" action="index.php">

			<label>Enter the confirmation Code</label>

			<input type="text" name="code">
			<input type="submit" name="confirm" value="Submit">

		</form>

<?php		

	}
	else{
		echo "Empty fields";
	}
}
else if(isset($_POST['confirm']))
{
	if (!empty($_POST['code'])) {
		# code...

		include 'src/Registration.php'; 

		$confirm=$_POST['code'];
		$debug    = true;  // Shows debug log, this is set to false if not specified
		$log      = true;  // Enables log file, this is set to false if not specified

		// Create a instance of WhatsProt class.

		// Create a instance of Registration class.
		$r = new Registration($username, $debug);

		//$r->codeRequest('sms'); // could be 'voice' too
		//$r->codeRequest('voice');
		$r->codeRegister($confirm);
		header('Location: confirm.php');
		}
		else{
			echo "Enter the confirmation code";
		}
		
}
else
{
?>


	<form method ="POST" action"index.php">
		<label>Enter your Mobile No.</label>
		<input type="text" value="91" name="number">
		<label>Enter Your NickName</label>
		<input type="text" name="nick">
		<input type="submit" name="submit">
	</form>
<?php
}
?>

</body>



</html>