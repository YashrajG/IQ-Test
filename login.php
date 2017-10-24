<?php
	session_start();
	//$_SESSION["username"] = "yashraj";
?>
<HTML>
	<HEAD>
		<TITLE>SIGN IN PAGE</TITLE>
		<script src="validate.js" ></script>
		<SCRIPT></SCRIPT>
	</HEAD>
	<BODY >
		
		<DIV ID="body" style="text-align:center;">
	
			<P><FONT SIZE="6">SIGN IN</FONT></P>
			<P>
				<FORM NAME="login" METHOD="POST" ACTION="" onsubmit="return validate('login')">
					<p>
						USERNAME:<INPUT TYPE="TEXT" VALUE="" NAME="usname"><br><br>
						PASSWORD:<INPUT TYPE="PASSWORD" VALUE="" NAME="password"><br>
					</p>
					<p><FONT SIZE="1">
						ARE YOU AN NEW USER? <A HREF="http://localhost/QUIZ/signup.php">CLICK HERE</A></FONT>
					</p>

					<p ALIGN="center">
						<input type="RESET" value="RESET">
						<INPUT TYPE="SUBMIT" VALUE="SIGN IN" ID="SIGNIN" >
					</p>
				</FORM>
			</P>
		</DIV>
	</BODY>
</HTML>

