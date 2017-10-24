<?php
	session_start();
	//$_SESSION["username"] = "yashraj";
?>
<HTML>
	<HEAD>
		<TITLE>SIGN IN PAGE</TITLE>
		<script src="validate.js" ></script>
		<SCRIPT></SCRIPT>
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
			#body{
				padding: 10px;
				background-color:#4dbbff;
				color: #FFFFFF;
				width: 500px;
				height: 300px;
				border-radius: 25px;
				margin: auto;
				margin-top: 40px;
				font-family: Arial, Helvetica, "Comic Sans MS", sans-seif;
			}
		</STYLE>	
	</HEAD>
	<BODY>
		<DIV ID="body" style="text-align:center;">
	
			<P><FONT SIZE="6">SIGN IN</FONT></P>
			<P>
				<FORM NAME="login" METHOD="POST" ACTION="http://localhost/QUIZ/CustomHomePage.php?source=login" onsubmit="return validate('login')">
					<p>
						USERNAME:<INPUT TYPE="TEXT" VALUE="" NAME="usname"><br><br>
						PASSWORD:<INPUT TYPE="PASSWORD" VALUE="" NAME="password"><br>
					</p>
					<p><FONT SIZE="1">
						ARE YOU AN NEW USER? <A HREF="http://localhost/QUIZ/signupV2.php">CLICK HERE</A></FONT>
					</p>

					<p ALIGN="center">
						<input type="RESET" class="button" value="RESET">
						<INPUT TYPE="SUBMIT" class="button" VALUE="SIGN IN" ID="SIGNIN" >
					</p>
				</FORM>
			</P>
		</DIV>
	</BODY>
</HTML>

