document.getElementById('lastname').onkeyup = function()
{
	var fname= document.getElementById("firstname").value;
	var lname= document.getElementById("lastname").value;
	fullname.value =fname + " " + lname;
}