<?php
	session_start();
	$_SESSION["completeQuestion"] = 0;
	$_SESSION["completeMarks"] = 0;
	$_SESSION["dailyQuestion"] = 0;
	$_SESSION["dailyMarks"] = 0;
	//$_SESSION["username"] = NULL;
	//location.reload();
	if(isset($_GET["renew"]))
	{
		// remove all session variables
		session_unset(); 
	}
?>
<!DOCTYPE HTML>
<HTML>
	<HEAD>
		<TITLE>IQ TEST </TITLE>
		<STYLE TYPE="TEXT/CSS">
			.theme{
				background-color:#2554C7;
				color:white;
				position:fixed;
				left:0px;
				width:100%;
				}
			input,button{
				border:none;
				padding: 9px 23px; /* Add some padding */
				cursor: pointer;
				margin: 16px 25px 15px 0px;/*top right bottom left*/
				}
			a,.nav
			{
				color: white;
				cursor: pointer;
			}
				
			body {   
				transition: background-color .5s;
				background-color : black;
				}
			.sidenav {
				height: 100%;
				width: 0;
				position: fixed;
				z-index: 1;
				top: 0;
				left: 0;
				background-color: #111;
				overflow-x: hidden;
				transition: 0.5s;
				padding-top: 60px;
				}
			.sidenav a, .nav {
				padding: 8px 8px 8px 32px;
				text-decoration: none;
				font-size: 25px;
				color: #818181;
				display: block;
				transition: 0.3s;
				}
			.sidenav a:hover, .nav:hover {
				color: #f1f1f1;
				}
			.sidenav .closebtn {
				position: absolute;
				top: 0;
				right: 25px;
				font-size: 36px;
				margin-left: 50px;
				}
			#title,#content{
				transition: margin-left .5s;
				
			}
			
			@media screen and (max-height: 450px) {
				.sidenav {padding-top: 15px;}
				.sidenav a,.nav {font-size: 18px;}
				}
		</STYLE>
		<SCRIPT>
			function login()
			{
				document.getElementById("content").src = "http://localhost/QUIZ/loginV2.php";
			}
			function signUp()
			{
				document.getElementById("content").src = "http://localhost/QUIZ/signupV2.php";
			}
			function logout()
			{
				var logOutAgreed = confirm("Are you sure you want to log out?");
				if(logOutAgreed)
				{
					window.location.href='http://localhost/QUIZ/iqtest.php?renew=true';
				}
			}
		</SCRIPT>
		<SCRIPT SRC="quizNav.js"></SCRIPT>
	</HEAD>
	<BODY>
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<span class="nav" onclick="loadDHome()">Daily test</span>
			<span class="nav" onclick="loadCHome()">Complete IQ Test</span>
			<span class="nav" onclick="loadContacts()">Contact</span>
		</div>
		
		
			<DIV CLASS="theme" ID="header" STYLE="top:0px;height:10%;">
				<A HREF="http://localhost/QUIZ/iqtest.php">
				<SPAN ID="title" style="position:relative;float:left;font-size:55px;padding-left:1%; font-family: Arial, Helvetica, 'Comic Sans MS', sans-seif;" ONCLICK="http://localhost/QUIZ/iqtest.php">IQ TEST</SPAN>
				</A>
				<DIV STYLE="float:right">
				<?php
					if(!isset($_SESSION["firstname"]))//check if user session active or something
					{
						//echo "<FORM ACTION='http://localhost/login.php'><INPUT TYPE='SUBMIT' VALUE='Log In'><FORM/>";
						//echo "<FORM ACTION='http://localhost/signup.php'><INPUT TYPE='SUBMIT' VALUE='Sign Up'><FORM/>";
						echo "<BUTTON ONCLICK='login()'>Log In</BUTTON>";
						echo "<BUTTON ONCLICK='signUp()'>Sign Up</BUTTON>";
					}
					else
					{
						echo "<SPAN STYLE='padding: 9px 23px; /* Add some padding */
											cursor: pointer;
											margin: 16px 25px 15px 0px;/*top right bottom left*/;
											font-size: 48px;' ONCLICK='logout()'>
								Hello, ".$_SESSION["firstname"]."
								</SPAN>";
					}
				?>
				</DIV>
			</DIV>
			
			<IFRAME ID="content" HEIGHT="85%" WIDTH="100%" style="border:solid 2px; position:fixed; top:10%; left:0px; right:0px; margin-left:0px;" src="homepage.html"></IFRAME>
			<DIV CLASS="theme" ID="footer" STYLE="bottom:0px;height:5%; font-family: Arial, Helvetica, 'Comic Sans MS', sans-seif;">
				<SPAN STYLE="float:right;">@COPYRIGHTS RESERVED</SPAN>
				<span style="font-size:30px;cursor:pointer;margin-left:14px;" onclick="openNav()">&#9776; open</span>
				
			</DIV>
			
	</BODY>
</HTML>