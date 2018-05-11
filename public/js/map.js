function initMap() {
	var uluru = {lat: 46.468845, lng: 30.72331};

	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 15,
		center: uluru,
		disableDefaultUI: true
	});

	var marker = new google.maps.Marker({
		position: uluru,
		map: map
	});
}
