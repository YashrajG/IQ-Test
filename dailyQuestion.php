<?php
	//Session initialisation
	session_start();
	
	//Connection establishment
	$conn = mysqli_connect("localhost","root","","QUIZ");
	
	if(!$conn)	die("Connection failed : ".mysqli_connect_error());
	
	//completeQuestion is question number of current page
	if($_SESSION["dailyQuestion"] >= 0)
	{
		$_SESSION["dailyQuestion"]++;
		//TODO add marks
	}	
	//else	$_SESSION["completeQuestion"] = 1;
	
	//Compute marks
	if(isset($_SESSION["answerType"]))
	{
		if($_SESSION["answerType"]==0)
		{	
			if($_GET["openAnswer"]==$_SESSION["answer"])
				$_SESSION["dailyMarks"] += 1;
		}
		else if($_SESSION["answerType"]==1)
		{
			if($_GET["closedAnswer"]==$_SESSION["answer"])
				$_SESSION["dailyMarks"] += 1;
		}
	}	
	
	//Query to retrieve question
	$questionQuery = "Select * FROM DQUESTIONS WHERE QNO = ".$_SESSION["dailyQuestion"];
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
			  border-radius: 15%;
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
			echo "<SPAN STYLE='color: #FFFFFF; font-size: 48px; font-family: 'Signika', sans-serif; padding-bottom: 10px;'>
				Your have scored ".$_SESSION["dailyMarks"]." out of 10
			</SPAN>";
		echo "<P>
				<SPAN STYLE='font-family: \'Inder\', sans-serif; line-height: 28px; font-size:20px; margin-bottom: 15px; color: #FFFFFF;'>";	
		switch($_SESSION["dailyMarks"])
		{
			case 10:
				echo "<P>
						 That equals a university education level.
						In principle you do not have to be concerned that you will get a very low score on a comprehensive IQ test.
					</P>";
				break;
			case 9:
				echo "<P>
						 That equals a university education level.
						In principle you do not have to be concerned that you will get a very low score on a comprehensive IQ test.
					</P>";
				break;
			case 8:
				echo "<P>
						 This equals a higher vocational education or university level.
						With exercise and focus, you might be able to score higher on a real IQ test.
					</P>";
				break;
			case 7:
				echo "<P>
						 This equals a higher vocational education or university level.
						With exercise and focus, you might be able to score higher on a real IQ test.
					</P>";
				break;
			case 6:
				echo "<P>
						 This equals a higher vocational education or university level.
						With exercise and focus, you might be able to score higher on a real IQ test.
					</P>";
				break;
			case 5:
				echo "<P>
					 This equals an intermediate vocational education level. You might be able to score higher.
					Perhaps you were not as focused or you just had lunch. Or had you never taken an IQ test before and were you just trying it out?
					Practice might help you score higher on a next IQ test, check below for more tests!
					</P>";
				break;
			case 4:
				echo "<P>
					 This equals an intermediate vocational education level. You might be able to score higher.
					Perhaps you were not as focused or you just had lunch. Or had you never taken an IQ test before and were you just trying it out?
					Practice might help you score higher on a next IQ test, check below for more tests!
					</P>";
				break;
			case 3:
				echo "<P>
					 This equals an intermediate vocational education level. You might be able to score higher.
					Perhaps you were not as focused or you just had lunch. Or had you never taken an IQ test before and were you just trying it out?
					Practice might help you score higher on a next IQ test, check below for more tests!
					</P>";
				break;
			case 2:
				echo "<P>
					 This indicates lower vocational educational level.<BR>
						You should be able to score higher next time.<BR>
						Perhaps you were not as focused or you just had lunch. Or had you never taken an IQ test before and were you just trying it out?
					</P>";
				break;
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
		
		echo "</SPAN>
			</P>";
		}
		else
		{
			$row = mysqli_fetch_assoc($question);
			$description = $row["DESCRIPTION"];
		
			echo "<FORM ACTION='http://localhost/QUIZ/dailyQuestion.php' METHOD='GET'>";
			
			//TODO print question 
			//echo $_SESSION["dailyQuestion"].$description."<BR>";
			echo "<SPAN STYLE='color: #ffFFFF; font-size: 25px; font-family: 'Signika', sans-serif; padding-bottom: 10px;'>
				Q. ".$_SESSION["dailyQuestion"].">> ".$description."<BR>
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
				echo "ANSWER :  <INPUT TYPE='TEXT' NAME='openAnswer' REQUIRED AUTOFOCUS><BR>";
				
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
		
			//TODO submit button called as "next"
			echo "<INPUT TYPE='SUBMIT' CLASS='button' VALUE='NEXT' STYLE='border:none;	padding: 9px 23px; position:absolute; bottom:15%; right:15%; cursor: pointer;	margin: 16px 25px 15px 0px;/*top right bottom left*/'>
				</FORM>";
				
			//echo "So far ".$_SESSION["dailyMarks"];
		}
	?>
		</DIV>
	</BODY>
</HTML>