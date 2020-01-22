function fullname_change()
	{
	    var fname= document.getElementById("firstname").value;
		console.log(fname);
		var lname= document.getElementById("lastname").value;
		document.getElementById("fullname").value=fname + " " + lname;
    }