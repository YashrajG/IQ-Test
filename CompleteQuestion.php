<?php
	//Session initialisation
	session_start();
	
	//Connection establishment
	$conn = mysqli_connect("localhost","root","","QUIZ");
	
	if(!$conn)	die("Connection failed : ".mysqli_connect_error());
	
	//completeQuestion is question number of current page
	if($_SESSION["completeQuestion"] >= 0)
	{
		$_SESSION["completeQuestion"]++;
		//TODO add marks
	}	
	//else	$_SESSION["completeQuestion"] = 1;
	
	//Compute marks
	if(isset($_SESSION["answerType"]))
	{
		if($_SESSION["answerType"]==0)
		{	
			if($_GET["openAnswer"]==$_SESSION["answer"])
				$_SESSION["completeMarks"] += 1;
		}
		else
		{
			if($_GET["closedAnswer"]==$_SESSION["answer"])
				$_SESSION["completeMarks"] += 1;
		}
	}
	
	//Query to retrieve question
	$questionQuery = "Select * FROM CQUESTIONS WHERE QNO = ".$_SESSION["completeQuestion"];
	$question = mysqli_query($conn,$questionQuery);
	
	
	mysqli_close($conn);
	?>
<HTML>
	<HEAD>
		<style>
			body{
				background-image: url("background.jpg");
			}
			
			.button {
			  display: inline-block;
			  border-radius: 10%;
			  background-color: #FFFFFF;
			  border: 5px solid #000000;
			  color: #000000;
			  text-align: center;
			  font-size: 28px;
			  padding: 20px;
			  width: 150px;
			  height: 75px;
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
				height: 450px;
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
		<DIV ID="BOX">
	<?php
	if(mysqli_num_rows($question) != 1)
	{
		//echo mysqli_num_rows($question)." rows for question ".$_SESSION["completeQuestion"];
		
		//PRINT MARKS
		echo "<SPAN STYLE='color: #ffFFFF; font-size: 50px; font-family: 'Signika', sans-serif; padding-bottom: 10px;'>
				Your have scored ".$_SESSION["completeMarks"]." out of 20
			</SPAN>";
		echo "<P>
				<SPAN STYLE='font-family: \'Inder\', sans-serif; font-size:30px; line-height:28px; margin-bottom:15px; color: #FFFFFF;'>";	
		switch($_SESSION["completeMarks"])
		{
			case 20:
			case 19:
				echo "<P>
						That indicates an IQ score of 125 or more. That equals a university education level.
						In principle you do not have to be concerned that you will get a very low score on a comprehensive IQ test.
					</P>";
				break;
			case 18:
			case 17:
				echo "<P>
						That indicates an IQ score of 125 or more. That equals a university education level.
						In principle you do not have to be concerned that you will get a very low score on a comprehensive IQ test.
					</P>";
				break;
			case 16:
			case 15:
				echo "<P>
						That indicates an IQ score between 105 and 120. This equals a higher vocational education or university level.
						With exercise and focus, you might be able to score higher on a real IQ test.
					</P>";
				break;
			case 14:
			case 13:
				echo "<P>
						That indicates an IQ score between 105 and 120. This equals a higher vocational education or university level.
						With exercise and focus, you might be able to score higher on a real IQ test.
					</P>";
				break;
			case 12:
			case 11:
				echo "<P>
						That indicates an IQ score between 105 and 120. This equals a higher vocational education or university level.
						With exercise and focus, you might be able to score higher on a real IQ test.
					</P>";
				break;
			case 10:
			case 9:
				echo "<P>
					That indicates an IQ score of about 100. This equals an intermediate vocational education level. You might be able to score higher.
					Perhaps you were not as focused or you just had lunch. Or had you never taken an IQ test before and were you just trying it out?
					Practice might help you score higher on a next IQ test, check for more tests!
					</P>";
				break;
			case 8:
			case 7:
				echo "<P>
					That indicates an IQ score of about 100. This equals an intermediate vocational education level. You might be able to score higher.
					Perhaps you were not as focused or you just had lunch. Or had you never taken an IQ test before and were you just trying it out?
					Practice might help you score higher on a next IQ test, check for more tests!
					</P>";
				break;
			case 6:
			case 5:
				echo "<P>
					That indicates an IQ score of about 100. This equals an intermediate vocational education level. You might be able to score higher.
					Perhaps you were not as focused or you just had lunch. Or had you never taken an IQ test before and were you just trying it out?
					Practice might help you score higher on a next IQ test, check for more tests!
					</P>";
				break;
			case 4:
			case 3:
				echo "<P>
						That indicates an IQ score of 80 to 100. This indicates lower vocational educational level.<BR>
						You should be able to score higher next time.<BR>
						Perhaps you were not as focused or you just had lunch. Or had you never taken an IQ test before and were you just trying it out?
					</P>";
				break;
			case 2:
			case 1:
				echo "<P>
						You have sub-normal intelligence. Hence we cannot calculate your IQ.
					</P>";
				break;
			case 0:
				echo "<P>
						We want to console you, but you probably don't have the intelligence to comprehend that.
					</P>";
				break;
		}
		
		//Connection establishment
		$conn = mysqli_connect("localhost","root","","QUIZ");
	
		if(!$conn)	die("Connection failed : ".mysqli_connect_error());
		
		if(isset($_SESSION["username"]))
		{
			$recordQuery = "SELECT LastMarks FROM users WHERE username='".$_SESSION["username"]."'";
			
			$lastScore = mysqli_query($conn,$recordQuery);
			$row = mysqli_fetch_assoc($lastScore);
			
			$lastMarks = $row["LastMarks"];
			
			$updateQuery = "UPDATE `users` SET `LastMarks` = '".$_SESSION["completeMarks"]."' WHERE `users`.`username` = '".$_SESSION["username"]."';";
			if(!mysqli_query($conn,$updateQuery))
			{
				echo("Database error : ".mysqli_error($conn));
			}
			
			if($lastMarks != NULL)
			{
				echo "<P STYLE='color: #ffFFFF; font-size: 20px; font-family: 'Signika', sans-serif; padding-bottom: 10px;'>
						Previously you had scored ".$_SESSION["completeMarks"]." out of 20
					</P>";
					
				if($lastMarks <= $_SESSION["completeMarks"])
				{
					echo "<P STYLE='color: #ffFFFF; font-size: 20px; font-family: 'Signika', sans-serif; padding-bottom: 10px;'>
						Bravo! <BR>
						There has been an improvement in your score.<BR>
						Keep up the hard work.
					</P>";
				}
				else
				{
					echo "<P STYLE='color: #ffFFFF; font-size: 20px; font-family: 'Signika', sans-serif; padding-bottom: 10px;'>
						Don't lose hope <BR>
						With enough hard work and dedication, your results will surely improve<BR>
					</P>";
				}
			}
		}
		mysqli_close($conn);
		
		echo "</SPAN>
			</P>";
	}
	else
	{
		$row = mysqli_fetch_assoc($question);
		$description = $row["DESCRIPTION"];
		
		echo "<FORM ACTION='http://localhost/QUIZ/CompleteQuestion.php' METHOD='GET'>";
		
		//Print question 
		echo "<SPAN STYLE='color: #ffFFFF; font-size: 25px; font-family: 'Signika', sans-serif; padding-bottom: 10px;'>
				Q. ".$_SESSION["completeQuestion"].">>	".$description."<BR>
			</SPAN>";
		
		//echo 
		
		echo "<P>
				<SPAN STYLE='font-family: Inder, sans-serif;font-size: 20px; line-height: 28px; margin-bottom: 15px; color: #FFFFFF;'>";
		$answer = $row["ANSWER"];
		$a = $row["A"];
		/*if answer = 0 then open ended question. else answer = 1, 2, 3, 4, for A, B, C, D.*/
		if($answer == 0)
		{
			//Print text box
			echo "<INPUT TYPE='TEXT' NAME='openAnswer' REQUIRED>";
			
			$_SESSION["answerType"] = 0;
			$_SESSION["answer"] = $a;
		}
		else
		{
			$_SESSION["answerType"] = 1;
			$b = $row["B"];
			$c = $row["C"];
			$d = $row["D"];
			
			//Print radios
			echo "<INPUT TYPE='RADIO' NAME='closedAnswer' VALUE='1' REQUIRED>".$a."<BR>";
			echo "<INPUT TYPE='RADIO' NAME='closedAnswer' VALUE='2' REQUIRED>".$b."<BR>";
			echo "<INPUT TYPE='RADIO' NAME='closedAnswer' VALUE='3' REQUIRED>".$c."<BR>";
			echo "<INPUT TYPE='RADIO' NAME='closedAnswer' VALUE='4' REQUIRED>".$d."<BR>";
			
			if($answer == 1)
			{
				$_SESSION["answer"] = 1;
			}
			else if($answer == 2)
			{
				$_SESSION["answer"] = 2;
			}
			else if($answer == 3)
			{
				$_SESSION["answer"] = 3;
			}
			else
			{
				$_SESSION["answer"] = 4;
			}
			
		}
		
		echo "</SPAN>
			</P>";
		
		//TODO submit button called as "next"
		echo "<INPUT TYPE='SUBMIT' CLASS='button' VALUE='NEXT' STYLE='border:none;	padding: 9px 23px; position:absolute; bottom:15%; right:15%; cursor: pointer;	margin: 16px 25px 15px 0px;/*top right bottom left*/'>
				</FORM>";
				
		//echo "So far ".$_SESSION["completeMarks"];
	}
?>
		</DIV>
	</BODY>
</HTML>