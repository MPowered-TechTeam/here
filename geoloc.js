window.onload = init

function init()
{
	var call = setInterval(getmylocation, 5000);
}
//clearInterval(getmylocation) --- if you want to stop it

function getmylocation() {
	if (navigator.geolocation){
		navigator.geolocation.getCurrentPosition(displayevents);
	}
	else {
		alert("Sorry, your browser is unable to provide a location at this time");
	}
}
function displayevents(position)
{
	var yourlat = position.coords.latitude;
	var yourlong = position.coords.longitude;
	var accur = position.coords.accuracy;

	//ajax call with these 3 parameters
		//sql will sort by distance
			//if distance less than specified radius return that event
		//ajax constructs a table

}

