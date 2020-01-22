
function fullname_change()
{
	var fname= document.getElementById("firstname").value;
	var lname= document.getElementById("lastname").value;
	fullname.value =fname + " " + lname;
}
var lastname_var=document.getElementById("lastname");
lastname_var.onkeyup =fullname_change();
