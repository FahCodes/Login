function tampilpass(){
	var obj = document.getElementById("password");
	if (obj.type === "password"){
		obj.type = "text";
	}else{
		obj.type = "password";
	}
}
//Efek Kotak Dialog Text
var close = document.getElementsByClassName("closebtn");
var i;
for(i = 0; i < close.length; i++){
	close[i].onclick = function(){
		var div = this.parentElement;
		div.style.opacity="0";
		setTimeout(function(){div.style.display = "none";}, 600);
	}
}
//Fungsi Validasi Form Login
function validate(){
	document.getElementById("boxalert").style.display = "block";
	document.getElementById("boxalert").style.opacity = 1;

	var error ="";
	var name = document.getElementById("username");
	if (name.value == "")
	{
		error = "You Have To Write Your Username.";
		document.getElementById("pesan").innerHTML = error;
		return false;
	}
	var password = document.getElementById("password");
	if(password.value == "" || password.value.length < 8)
	{
		error = "Password Must Be More Than 0r Equal To 8 Digits.";
		document.getElementById("pesan").innerHTML = error;
		return false;
	}else{
		return true;
	}
}