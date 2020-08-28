<!DOCTYPE html> 
<html lang="en"> 
<head> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Geolocation - City</title> 
</head> 
<body>
    <button onclick="getCoordintes()">cari alamat</button> 
    <div id="addressa">alamat</div>

	<script>
    // Step 1: Get user coordinates 
    function getCoordintes() { 
	var options = { 
		enableHighAccuracy: true, 
		timeout: 5000, 
		maximumAge: 0 
	}; 

	function success(pos) { 
		var crd = pos.coords; 
		var lat = crd.latitude.toString(); 
		var lng = crd.longitude.toString(); 
		var coordinates = [lat, lng]; 
		console.log(`Latitude: ${lat}, Longitude: ${lng}`); 
		getCity(coordinates); 
		return; 

	} 

	function error(err) { 
		console.warn(`ERROR(${err.code}): ${err.message}`); 
	} 

	navigator.geolocation.getCurrentPosition(success, error, options); 
    } 

    // Step 2: Get city name 
    function getCity(coordinates) { 
	var xhr = new XMLHttpRequest(); 
	var lat = coordinates[0]; 
	var lng = coordinates[1]; 

	// Paste your LocationIQ token below. 
	xhr.open('GET',"https://us1.locationiq.com/v1/reverse.php?key=7ab8b85ab3e21e&lat=" + lat + "&lon=" + lng + "&format=json", true); 
	xhr.send(); 
	xhr.onreadystatechange = processRequest; 
	xhr.addEventListener("readystatechange", processRequest, false); 

	function processRequest(e) { 
		if (xhr.readyState == 4 && xhr.status == 200) { 
			var response = JSON.parse(xhr.responseText); 
			var city = response.display_name; 
			console.log(city); 
            document.getElementById("addressa").innerHTML=city;
			return; 
		} 
	} 
    } 


</script>
    
	</body> 
</html> 

