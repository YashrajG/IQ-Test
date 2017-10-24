<HTML>
	<HEAD>
		<TITLE>CREATE ACCOUNT</TITLE>
		<STYLE>
			body{
				background-image: url("background.jpg");
				text-align:center;
			}
			
			.button {
			  display: inline-block;
			  border-radius: 50%;
			  background-color: #FFFFFF;
			  border: 1px solid #000000;
			  color: #000000;
			  text-align: center;
			  font-size: 20px;
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
				height: 550px;
				border-radius: 25px;
				margin: auto;
				margin-top: 15px;
				font-family: Arial, Helvetica, "Comic Sans MS", sans-seif;
			}
		</STYLE>
		<script src="validate.js" ></script>
	</HEAD>
	<BODY >
		<DIV ID="body">
			<P><FONT SIZE="6">SIGN UP</FONT></P>
			<P>
				<FORM METHOD="POST" ACTION="http://localhost/QUIZ/CustomHomePage.php?source=signup" onsubmit="return validate('signup')" NAME="signup">
					<p>
						FIRST NAME*: <INPUT TYPE="TEXT" VALUE="" NAME="fname"><span id="FNameError" REQUIRED></span><br><BR>
						LAST NAME: <INPUT TYPE="TEXT" VALUE="" NAME="sname"><span id="SNameError"></span><br>
					</p>
					<p>
						GENDER:  
						<INPUT TYPE="RADIO" VALUE="m" NAME="gender">MALE</INPUT><BR>
						<INPUT TYPE="RADIO" ID="femaleRadio" VALUE="f" NAME="gender" style="margin-left:97px">FEMALE</INPUT>
					</p>
					
					<p>
						DATE OF BIRTH*:
						<SELECT NAME="day">
							<OPTION VALUE="01">--</OPTION>
							<OPTION VALUE="01">1</OPTION>
							<OPTION VALUE="02">2</OPTION>
							<OPTION VALUE="03">3</OPTION>
							<OPTION VALUE="04">4</OPTION>
							<OPTION VALUE="05">5</OPTION>
							<OPTION VALUE="06">6</OPTION>
							<OPTION VALUE="07">7</OPTION>
							<OPTION VALUE="08">8</OPTION>
							<OPTION VALUE="09">9</OPTION>
							<OPTION VALUE="10">10</OPTION>
							<OPTION VALUE="11">11</OPTION>
							<OPTION VALUE="12">12</OPTION>
							<OPTION VALUE="13">13</OPTION>
							<OPTION VALUE="14">14</OPTION>
							<OPTION VALUE="15">15</OPTION>
							<OPTION VALUE="16">16</OPTION>
							<OPTION VALUE="17">17</OPTION>
							<OPTION VALUE="18">18</OPTION>
							<OPTION VALUE="19">19</OPTION>
							<OPTION VALUE="20">20</OPTION>
							<OPTION VALUE="21">21</OPTION>
							<OPTION VALUE="22">22</OPTION>
							<OPTION VALUE="23">23</OPTION>
							<OPTION VALUE="24">24</OPTION>
							<OPTION VALUE="25">25</OPTION>
							<OPTION VALUE="26">26</OPTION>
							<OPTION VALUE="27">27</OPTION>
							<OPTION VALUE="28">28</OPTION>
							<OPTION VALUE="29">29</OPTION>
							<OPTION VALUE="30">30</OPTION>
							<OPTION VALUE="31">31</OPTION>
						</SELECT>
						<SELECT NAME="month">
							<OPTION VALUE="01">--</OPTION>
							<OPTION VALUE="01">JANUARY</OPTION>
							<OPTION VALUE="02">FEBRUARY</OPTION>
							<OPTION VALUE="03">MARCH</OPTION>
							<OPTION VALUE="04">APRIL</OPTION>
							<OPTION VALUE="05">MAY</OPTION>
							<OPTION VALUE="06">JUNE</OPTION>
							<OPTION VALUE="07">JULY</OPTION>
							<OPTION VALUE="08">AUGUST</OPTION>
							<OPTION VALUE="09">SEPTEMBER</OPTION>
							<OPTION VALUE="10">OCTOBER</OPTION>
							<OPTION VALUE="11">NOVEMBER</OPTION>
							<OPTION VALUE="12">DECEMBER</OPTION>
						</SELECT>
						<INPUT TYPE="TEXT" VALUE="2017" NAME="year" size="1"><br>
					</p>
					<p>
						PHONE NO: <input type="text" value="" name="phone"><span id="phoneError"></span><br>
					</p>
					<p>
						EMAIL ID: <INPUT TYPE="TEXT" PLACEHOLDER="abc@example.com" name="email"><span id="emailError"></span><BR><BR>
					</p>
					<p>
						USERNAME*: <INPUT TYPE="TEXT" VALUE="" NAME="usname"><span id="unameError"></span><br><BR>
						PASSWORD*: <INPUT TYPE="PASSWORD" PLACEHOLDER="Must contain 6-18 characters" NAME="password">
						<span id="passError"></span><br>
					</p>
					<p><FONT SIZE="1">
						ARE YOU AN EXISTING USER? <A HREF="http://localhost/QUIZ/loginV2.php">CLICK HERE</A></FONT>
					</p>
					<p >
						<input type="RESET" class="button" value="RESET">
						<INPUT TYPE="SUBMIT" class="button" VALUE="CREATE ACCOUNT" ID="CREATE" >
					</p>
				</FORM>
			</P>
		</DIV>
	</BODY>
</HTML>
