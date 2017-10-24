<HTML>
	<HEAD>
		<TITLE>CREATE ACCOUNT</TITLE>
		<STYLE>
			body
			{
				text-align:center;
			}
		</STYLE>
		<script src="validate.js" ></script>
	</HEAD>
	<BODY >
		<DIV ID="body">
			<P><FONT SIZE="6">SIGN UP</FONT></P>
			<P>
				<FORM METHOD="POST" ACTION="" onsubmit="return validate('signup')" NAME="signup">
					<p>
						FIRST NAME*: <INPUT TYPE="TEXT" VALUE="" NAME="fname"><span id="FNameError" REQUIRED></span><br><BR>
						LAST NAME: <INPUT TYPE="TEXT" VALUE="" NAME="sname"><span id="SNameError"></span><br>
					</p>
					<p>
						GENDER:  
						<INPUT TYPE="RADIO" VALUE="" NAME="gender">MALE</INPUT><BR>
						<INPUT TYPE="RADIO" ID="femaleRadio" VALUE="" NAME="gender" style="margin-left:97px">FEMALE</INPUT>
					</p>
					
					<p>
					DATE OF BIRTH*:
					<SELECT>
						<OPTION>--</OPTION>
						<OPTION>1</OPTION>
						<OPTION>2</OPTION>
						<OPTION>3</OPTION>
						<OPTION>4</OPTION>
						<OPTION>5</OPTION>
						<OPTION>6</OPTION>
						<OPTION>7</OPTION>
						<OPTION>8</OPTION>
						<OPTION>9</OPTION>
						<OPTION>10</OPTION>
						<OPTION>11</OPTION>
						<OPTION>12</OPTION>
						<OPTION>13</OPTION>
						<OPTION>14</OPTION>
						<OPTION>15</OPTION>
						<OPTION>16</OPTION>
						<OPTION>17</OPTION>
						<OPTION>18</OPTION>
						<OPTION>19</OPTION>
						<OPTION>20</OPTION>
						<OPTION>21</OPTION>
						<OPTION>22</OPTION>
						<OPTION>23</OPTION>
						<OPTION>24</OPTION>
						<OPTION>25</OPTION>
						<OPTION>26</OPTION>
						<OPTION>27</OPTION>
						<OPTION>28</OPTION>
						<OPTION>29</OPTION>
						<OPTION>30</OPTION>
						<OPTION>31</OPTION>
					</SELECT>
					<SELECT>
						<OPTION>--</OPTION>
						<OPTION>JANUARY</OPTION>
						<OPTION>FEBRUARY</OPTION>
						<OPTION>MARCH</OPTION>
						<OPTION>APRIL</OPTION>
						<OPTION>MAY</OPTION>
						<OPTION>JUNE</OPTION>
						<OPTION>JULY</OPTION>
						<OPTION>AUGUST</OPTION>
						<OPTION>SEPTEMBER</OPTION>
						<OPTION>OCTOBER</OPTION>
						<OPTION>NOVEMBER</OPTION>
						<OPTION>DECEMBER</OPTION>
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
					PASSWORD*: <INPUT TYPE="PASSWORD" PLACEHOLDER="6-18 characters" NAME="password">
					<span id="passError"></span><br>
				</p>
				<p><FONT SIZE="1">
					ARE YOU AN EXISTING USER? <A HREF="http://localhost/QUIZ/login.php">CLICK HERE</A></FONT>
				</p>
				<p >
					<input type="RESET" value="RESET">
					<INPUT TYPE="SUBMIT" VALUE="CREATE ACCOUNT" ID="CREATE" >

				</p>
			</FORM>
		</P>
	</DIV>
	</BODY>
</HTML>
