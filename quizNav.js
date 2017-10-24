function loadCHome()
{
	//location.reload();
	document.getElementById("content").src = "completeIQHomePage.html";
	closeNav();
}

function loadCQuiz()
{
	//location.reload();
	document.getElementById("content").src = "http://localhost/QUIZ/CompleteQuestion.php?closedAnswer=5";
	closeNav();
}


function loadDHome()
{
	//location.reload();
	document.getElementById("content").src = "dailyHomePage.html";
	closeNav();
}

function loadDQuiz()
{
	//location.reload();
	document.getElementById("content").src = "http://localhost/QUIZ/CompleteQuestion.php?closedAnswer=5";
	closeNav();
}

function loadContacts()
{
	//location.reload();
	document.getElementById("content").src = "contact.html";
	closeNav();
}



function openNav() 
{
	document.getElementById("mySidenav").style.width = "250px";
	document.getElementById("title").style.marginLeft = "250px";
	document.getElementById("content").style.marginLeft = "250px";
	//document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	//document.body.style.opacity = 0.75;
	document.getElementById("header").style.opacity = 0.75;
	document.getElementById("content").style.opacity = 0.75;
	document.getElementById("footer").style.opacity = 0.75;
}
	
function closeNav()
{
	document.getElementById("mySidenav").style.width = "0";
	document.getElementById("title").style.marginLeft= "0";
	document.getElementById("content").style.marginLeft= "0";
	//document.body.style.backgroundColor = "white";
	//document.body.style.opacity = 1;
	document.getElementById("header").style.opacity = 1;
	document.getElementById("content").style.opacity = 1;
	document.getElementById("footer").style.opacity = 1;
}