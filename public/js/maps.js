;(function(){
	class UserLocation{
		static get(callback){
			if(navigator.geolocation){
				navigator.geolocation.getCurrentPosition((location)=>{
					callback({
						lat: location.coords.latitude,
						lng: location.coords.longitude

					})

				})

			}else{
				alert("No logramos detectar el lugar donde te encuentras")
						
			}
		}
	}
	const my_place = {
		lat: 0.494268,
		lng: -76.503074
	}
	google.maps.event.addDomListener(window,"load",()=>{
		var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
		const map = new google.maps.Map(
			document.getElementById('map'),
			{
				center: my_place,
				zoom: 10				
			}
		)
		
//Marcador del Restaurante
		const marker = new google.maps.Marker({
			map: map,
			position: my_place,
			title: 'Delicias el Paisa',
			content: 'hola',
			visible: true
		})
		marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
		const contentString = '<h1 class="dancing-script black-text center subtitle">{{ $restaurante->name }}</h1>'+'<p class="text-center black-text medium">Restaurante</p>'+'<h3><i class="glyphicon black-text glyphicon-earphone"></i> 313 2551075</h3>';
		const infowindow = new google.maps.InfoWindow({
			content: contentString,
		})	


// Recibe la ubicación del usuario y calcula la desitancia
		UserLocation.get((coords)=>{
			// Calcular distancia del restaurante al usuario
			let origen = new google.maps.LatLng(coords.lat,coords.lng) // LatLng
			let destino = new google.maps.LatLng(my_place.lat,my_place.lng) // LatLng
			//Funciones para dibujar la ruta
			directionsDisplay.setMap(map);
			calculateAndDisplayRoute(directionsService, directionsDisplay);
			function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: origen,  // Ubicación actual del usuario.
          destination: my_place, 
          travelMode: google.maps.TravelMode.DRIVING
        }, function(response, status) {
          if (status == 'OK') {
            directionsDisplay.setDirections(response);

          } else {
            window.alert('No hemos encontrado una ruta adecuada ' + status);
          }
        });
      }


			// Usando distance matrix de google maps api
			let service = new google.maps.DistanceMatrixService()
			service.getDistanceMatrix({
				origins: [origen],
				destinations: [destino],
				travelMode: google.maps.TravelMode.DRIVING
			},(response,status)=>{
				if(status === google.maps.DistanceMatrixStatus.OK){
					const duration_element = response.rows[0].elements[0]
					const duracion_viaje = duration_element.duration.text
					document.querySelector("#message")
							.innerHTML = ` 
								Estás a ${duracion_viaje} de la mejor experiencia 
								para su paladar en <span class="dancing-script medium">
								{{ $restaurante->name }}</span>
							`
				}
			})	



		})

	})
})()