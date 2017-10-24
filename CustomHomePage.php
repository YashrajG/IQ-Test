<?php
	session_start();
	
	$_SESSION["completeQuestion"] = 0;
	$_SESSION["completeMarks"] = 0;
	$_SESSION["dailyQuestion"] = 0;
	$_SESSION["dailyMarks"] = 0;
	
	//Connection establishment
	$conn = mysqli_connect("localhost","root","","QUIZ");
	
	if(!$conn)	die("Connection failed : ".mysqli_connect_error());
	?>
<HTML>
	<HEAD>
		<TITLE>Welcome <?php echo $_SESSION["username"]; ?></TITLE>
		<style>
			body{
				background-image: url("background.jpg");
			}
			
			.button {
			  display: inline-block;
			  border-radius: 50%;
			  background-color: #FFFFFF;
			  border: 1px solid #000000;
			  color: #000000;
			  text-align: center;
			  font-size: 28px;
			  padding: 20px;
			  width: 200px;
			  height: 100px;
			  transition: all 0.5s;
			  cursor: pointer;
			  margin: 5px;
			  
			}
	
			.button span {
			  cursor: pointer;
			  display: inline-block;
			  position: relative;
			  transition: 0.5s;
			}

			.button span:after {
			  content: '\00bb';
			  position: absolute;
			  opacity: 0;
			  top: 0;
			  right: -20px;
			  transition: 0.4s;
			}

			.button:hover span {
			  padding-right: 25px;
			}

			.button:hover span:after {
			  opacity: 1;
			  right: 0;
			}
			#BOX{
				padding: 20px;
				background-color:#4dbbff;
				color: #FFFFFF;
				width: 1000px;
				height: 350px;
				border-radius: 25px;
				margin: auto;
				margin-top: 40px;
				filter: alpha(opacity=60);
				font-family: Arial, Helvetica, "Comic Sans MS", sans-seif;
			}
			#HEADING{
				font-size: 50px;
				text-align: center;
			}
		</style>
	</HEAD>
	<BODY>
		<DIV ID=BOX>

	<?php
	$loggedIn = false;
	if($_GET["source"] == "login")
	{
		//$_SESSION["username"] = $_POST["usname"];
		$loginQuery = "SELECT * FROM users WHERE username='".$_POST["usname"]."'";
		$userlist = mysqli_query($conn,$loginQuery);
		if(mysqli_num_rows($userlist) == 0)
		{
			//$notUser = true;
			echo "<P>Looks like we do not have anybody registered with the username '".$_SESSION["usname"]."'</P>
					<P>Don't think you are a user yet? Please go ahead and sign up with us.</P>
					<P>Typed in the wrong username? Relax, click the login button to try again.</P>";
		}
		else
		{
			$loginQuery = "SELECT * FROM users WHERE username='".$_POST["usname"]."' AND password='".$_POST["password"]."'";
			$userlist = mysqli_query($conn,$loginQuery);
			if(mysqli_num_rows($userlist) == 0)
			{
				//$wrongPass = true;
				echo "<P>You seem to have entered a wrong password</P>
					<P>Don't think you are a user yet? Please go ahead and sign up with us.</P>
					<P>Want to have another go at it? Relax, click the login button to try again.</P>";
			}
			else
			{
				$loggedIn = true;
				$row = mysqli_fetch_assoc($userlist);
				$_SESSION["firstname"] = $row["Firstname"];
				$_SESSION["username"] = $_POST["usname"];
			}
		}
	}
	else
	{
		$loginQuery = "SELECT * FROM users WHERE username='".$_POST["usname"]."'";
		$userlist = mysqli_query($conn,$loginQuery);
		if(mysqli_num_rows($userlist) == 0)
		{
			$loggedIn = true;
			
			$_SESSION["firstname"] = $_POST["fname"];
			$_SESSION["username"] = $_POST["usname"];
			
			$signupQuery = "INSERT INTO `users` (`Firstname`, `Lastname`, `gender`, `dob`, `phone`, `email`, `username`, `password`, `LastMarks`)
				VALUES ('".$_POST["fname"]."','".$_POST["sname"]."', '".$_POST["gender"]."', '".$_POST["year"]."-".$_POST["month"]."-".$_POST["day"]."',
					'".$_POST["phone"]."', '".$_POST["email"]."', '".$_POST["usname"]."', '".$_POST["password"]."', NULL);";
			
			if(!mysqli_query($conn,$signupQuery))
			{
				echo("Database error : ".mysqli_error($conn));
			}
		}
		else
		{
			//$badUsername = true;
			echo "<P>Looks like we already have somebody registered with the username '".$_POST["usname"]."'</P>
					<P>Have another one in mind? Cool, click the sign up button to try again.</P>
					<P>Think it is you? Click the login button to reconnect with us.</P>";
		}
	}

	mysqli_close($conn);
	
	if($loggedIn)
	{
		echo "
			<P>Hello ".$_SESSION['firstname'].". It is always good to have you !<BR></P>

			We kindly invite you to take part in our IQ Test. It's completely online and it will take no more than 10 minutes to find your IQ!<BR>
		
			<BR>
			How does it work?
			<BR>
			It's simple! Answer 20 questions and basing on your answers our intelligent algorithm will calculate your IQ. 
			<BR><BR>
			You can also try the Daily Challenge
			<BR>
			It has 10 questions and brain teasers designed to improve your analitical power. 
			<BR>
			
			<H2 style='text-align:center;'>
				<button class='button' style='vertical-align:middle' ONCLICK=\"window.location.href='dailyHomePage.html\"'>
					<span>Daily Challenge </span>
				</button>
				<button class='button' style='vertical-align:middle' ONCLICK=\"window.location.href='completeIQHomePage.html'\">
					<span>IQ Test </span>
				</button>
			</H2>
			
		";
	}
	else
	{
		//print sign up and login buttons
		echo "<H2 style='text-align:center;'>
				<button class='button' style='vertical-align:middle' ONCLICK=\"window.location.href='http://localhost/QUIZ/signupV2.php'\">
					<span>Sign Up </span>
				</button>
				<button class='button' style='vertical-align:middle' ONCLICK=\"window.location.href='http://localhost/QUIZ/loginV2.php'\">
					<span>Login </span>
				</button>
			</H2>"; 
	}
	?>	
		</DIV>
	</BODY>
</HTML>
