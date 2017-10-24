function validate(form)
{
	var isValid = true;
	if(form == "signup")
	{
		isValid &= testFirstname(document.forms[form]["fname"].value);
		isValid &= testLastname(document.forms[form]["sname"].value);
		//testDOB();
		isValid &= testPNo(document.forms[form]["phone"].value);
		isValid &= testEmail(document.forms[form]["email"].value);
	}
	//else alert("hello");
	isValid &= testUname(document.forms[form]["usname"].value);
	isValid &= testPassword(document.forms[form]["password"].value);
	
	if(!isValid)	location.reload();
	
	return isValid;
}

function testFirstname(name)
{
	//var spaceReg = /^[\s]*$/
	//if(!spaceReg.test(name))
	//if(name.trim() == " ")
	
	var firstnameReg = /^[a-zA-Z]+$/
	if(!firstnameReg.test(name))
	{ 
		alert("Invalid firstname");
		location.reload();
		return false;
	}
	else //alert(name); 
		return true;
}

function testLastname(name)
{
	var firstnameReg = /^[a-zA-Z]+[']?[a-zA-Z]+$/
	if(!firstnameReg.test(name))
	{
		alert("Invalid lastname");
		location.reload();
		return false;
	}
	else //alert(name); 
		return true;
}

function testPNo(number)
{
	var phoneReg = /^(\d{10})$/
	if(!phoneReg.test(number))
	{
		alert("Invalid number");
		location.reload();
		return false;
	}	
	else //alert(number);
		return true;
}

function testEmail(mail)
{
	var mailReg =  /^[0-9a-zA-Z\.\_]+@[0-9a-zA-Z]+[\.]{1}[0-9a-zA-Z]+[\.]?[0-9a-zA-Z]+$/
	if(!mailReg.test(mail))
	{
		alert("Invalid email id");
		location.reload();
		return false;
	}	
	else //alert(mail);
		return true;
}

function testUname(name)
{
	var usnameReg = /^[0-9a-zA-Z\.\_\@\#\|\$\!\/\*\-\+\\\=\&]+$/
	if(!usnameReg.test(name))
	{
		alert("Invalid username");
		location.reload();
		return false;
	}	
	else //alert(name);
		return true;
}

function testPassword(pass)
{
	var passReg = /^[0-9a-zA-Z\.\_\@\#\|\$\!\/\*\-\+\\\=\&]+$/
	if(!passReg.test(pass))
	{
		alert("Invalid password");
	}
	else if(pass.length<6)
	{
		alert("Password too short");
	}
	else if( pass.length>18)
	{
		alert("Password too long");
	}
	else //alert(pass);
		return true;
	
	location.reload();	
	return false;	
}