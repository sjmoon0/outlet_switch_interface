var plug_0 = document.getElementById("plug_0");
var plug_1 = document.getElementById("plug_1");
var plug_2 = document.getElementById("plug_2");
var plug_3 = document.getElementById("plug_3");
var plug_4 = document.getElementById("plug_4");
var plug_5 = document.getElementById("plug_5");
var plugs = [plug_0,plug_1,plug_2,plug_3,plug_4,plug_5];

function toggleswitch(plug){
	var data =0;
	var request = new XMLHttpRequest();
	request.open("GET","toggleswitch.php?plug="+plug,true);
	request.send();
	request.onreadystatechange = function(){
		if(request.readyState==4 && request.status == 200){
			data = request.responseText;
			if(!(data.localeCompare("0"))){
				plugs[plug].style.backgroundColor = "darkred";
				plugs[plug].children[1].innerText = "Off";
			}
			else if(!(data.localeCompare("1"))){
				plugs[plug].style.backgroundColor = "green";
				plugs[plug].children[1].innerText = "On";
			}
		}
	}
}

function updateswitch(plug){
	var data =0;
	var request = new XMLHttpRequest();
	request.open("GET","getswitchstate.php?plug="+plug,true);
	request.send();
	request.onreadystatechange = function(){
		if(request.readyState==4 && request.status == 200){
			data = request.responseText;
			if(!(data.localeCompare("0"))){
				plugs[plug].style.backgroundColor = "darkred";
				plugs[plug].children[1].innerText = "Off";
			}
			else if(!(data.localeCompare("1"))){
				plugs[plug].style.backgroundColor = "green";
				plugs[plug].children[1].innerText = "On";
			}
		}
	}
}

function updateallswitches(){
	for(var i=0;i<6;i++){
		updateswitch(i);
	}
}

setInterval(updateallswitches,1000);
