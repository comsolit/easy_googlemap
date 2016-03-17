function updateConfig(){
	TYPO3.jQuery('#map').addressMap({
	    addressElements: {
	      street: 'input[name*="street"], input[data-formengine-input-name*="street"]',
	      city: 'input[name*="city"], input[data-formengine-input-name*="city"]',
	      zip: 'input[name*="postal_code"], input[data-formengine-input-name*="postal_code"]',
	      country: 'input[name*="country"], input[data-formengine-input-name*="country"]'
	    },
	    coordinateElements: {
	      latitude: 'input[name*="latitude"], input[data-formengine-input-name*="latitude"]',
	      longitude: 'input[name*="longitude"], input[data-formengine-input-name*="longitude"]'
	    },
	    anchorElements: {
	      anchorx: 'input[name*="anchorx"], input[data-formengine-input-name*="anchorx"]',
	      anchory: 'input[name*="anchory"], input[data-formengine-input-name*="anchory"]'
	    },
	    markerDraggable: true,
	    scrollwheel: false
	  });
}
(function($){

	TYPO3.jQuery.fn.addressMap = function(settings){
		return this.each(function() {
			var elemId = TYPO3.jQuery(this).attr('id');
			var addressElements = settings.addressElements;
			var coordinateElements = settings.coordinateElements;
			var anchorElements = settings.anchorElements;
			var COORDS_SWITZERLAND = {
				latitude: 46.818188,
				longitude: 8.227512
			};
			var markerDraggable = settings.markerDraggable || false;
			var scrollwheel = (settings.scrollwheel === undefined || settings.scrollwheel === true) ? true : false;

			var elements = {
				address: {
					street: TYPO3.jQuery(settings.addressElements.street),
					city: TYPO3.jQuery(settings.addressElements.city),
					zip: TYPO3.jQuery(settings.addressElements.zip),
					country: TYPO3.jQuery(settings.addressElements.country)
				},
				coordinates: {
					latitude: TYPO3.jQuery(settings.coordinateElements.latitude),
					longitude: TYPO3.jQuery(settings.coordinateElements.longitude)
				},
				anchors: {
					anchorx: TYPO3.jQuery(settings.anchorElements.anchorx),
					anchory: TYPO3.jQuery(settings.anchorElements.anchory)
				}
			};
			var map = null;
			var geocoder = new google.maps.Geocoder();
			var marker = null;
			var offsetMarker = null;
			initializePlugin();
			function initializePlugin() {
				initializeMap(COORDS_SWITZERLAND);
				var initialCoordinates = getCoordinatesFromElements();

				if(initialCoordinates == null) {
					getCurrentCoordinates(
						function(coordinates) {
							initializeMap(coordinates);
						},
						function(error) {
						  console.warn(error.code + ": " + error.message);
						}
					);
				} else {
					initializeMap(initialCoordinates);
					setMarker(initialCoordinates);
				}

				registerElementEventHandlers();
			}

			function initializeMap(coordinates) {
				mapOptions = {
					zoom: 16,
					scrollwheel: scrollwheel,
					mapTypeId:  google.maps.MapTypeId.ROADMAP,
					styles: [
						{
							stylers: [
								{gamma: 1},
								{saturation: 1},
							]
						}
					]
				};

				mapOptions.center = new google.maps.LatLng(coordinates.latitude, coordinates.longitude);

				map = new google.maps.Map(document.getElementById(elemId), mapOptions);

				google.maps.event.addListener(map, 'click', function(event) {
					var clickedCoordinates = {
						latitude: event.latLng.lat(),
						longitude: event.latLng.lng()
					};
					setMarker(clickedCoordinates);
					getAddressFromCoordinates(clickedCoordinates, function (address){
						setElementValues(address, clickedCoordinates);
					});
				});
			}

			function getCurrentCoordinates(successCallback, errorCallback) {
				if(navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(
						function(geoposition) {
							var coordinates = {
								latitude: geoposition.coords.latitude,
								longitude: geoposition.coords.longitude
							};
							successCallback(coordinates);
						},
						function(error) {
							errorCallback(error);
						}
					);
				}
				else {
					var errorMsg = 'navigator.geolocation not supported by browser';
					errorCallback(errorMsg);
				}
			}

			function getCoordinatesFromAddress(addressString, callback) {
				var coords = {};
				geocoder.geocode({address: addressString}, function(results, status) {
					if(status == google.maps.GeocoderStatus.OK) {
						coords.latitude = results[0].geometry.location.lat();
						coords.longitude = results[0].geometry.location.lng();

						coords.bounds = {
							northEast: results[0].geometry.viewport.getNorthEast(),
							southWest: results[0].geometry.viewport.getSouthWest()
						};

						callback(coords);
					} else {
						callback(null);
					}
				});
			}

			function getAddressFromCoordinates(coordinates, callback) {
				var coords = new google.maps.LatLng(coordinates.latitude, coordinates.longitude);
				geocoder.geocode({'latLng': coords}, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						var address = {};
						var addressComponents = results[0].address_components;
						var addressProperties = [];

						for(var property in addressComponents) {
							addressProperties.push(addressComponents[property]);
						}
						addressProperties.forEach(function(property) {
							if(!property.types){
								var type = '';
							}else {
								var type = property.types[0];
							}
							switch(type) {
							case 'street_number':
								address.streetNr = property['short_name'];
								break;
							case 'route':
								address.street = property['short_name'];
								break;
							case 'locality':
								address.city = property['long_name'];
								break;
							case 'country':
								address.country = property['long_name'];
								break;
							case 'postal_code':
								address.zip = property['short_name'];
								break;
							case '':
								break;
							}
						});

						callback(address);
					} else {
						alert("Geocoder failed due to: " + status);
					}
				});
			}

			function setElementValues(address, coordinates) {
				if(address != null) {
					elements.address.street.val(TYPO3.jQuery.grep([address.street, address.streetNr], Boolean).join(' '));
					elements.address.city.val(address.city);
					elements.address.zip.val(address.zip);
					elements.address.country.val(address.country);
				}
				if(coordinates != null) {
					elements.coordinates.latitude.val(coordinates.latitude);
					elements.coordinates.longitude.val(coordinates.longitude);
				}
			}

			function getAddressStringFromElements() {
				var address = {
					street: elements.address.street.val(),
					zip: elements.address.zip.val(),
					city: elements.address.city.val(),
					country: (elements.address.country).find('option:selected').text()
				};

				var zipCity = TYPO3.jQuery.grep([address.zip, address.city], Boolean).join(' ');
				var addressString = TYPO3.jQuery.grep([address.street, zipCity, address.country], Boolean).join(', ');

				return addressString;
			}

			function registerElementEventHandlers() {
				registerAddressElements();
				registerCoordinateElements();

				function registerAddressElements() {
					for(var elemKey in elements.address) {
						var elem = elements.address[elemKey];
						elem.on('change', function() {
							var addressString = getAddressStringFromElements();
							getCoordinatesFromAddress(addressString, function(coordinates) {
								if(coordinates) {
									map.fitBounds(new google.maps.LatLngBounds(coordinates.bounds.southWest, coordinates.bounds.northEast));
									setMarker(coordinates);
									setElementValues(null, coordinates);
								}
							});
						});
					}
					for(var coordinateKey in elements.coordinates) {
						var elem = elements.coordinates[coordinateKey];
						elem.on('change', function() {
							var coordinates = getCoordinatesFromElements();
							setMarker(coordinates);
						});
					}
				}

				function registerCoordinateElements() {
					for(var elemKey in elements.coordinates) {
						var elem = elements.coordinates[elemKey];
						elem.on('change', function() {
							var coordinates = getCoordinatesFromElements();
							if(coordinates == null) return;
							getAddressFromCoordinates(coordinates, function(address) {
								setElementValues(address, null);
								setMarker(coordinates);
							});
							map.panTo({lat: coordinates.latitude, lng: coordinates.longitude});
						});
					}
				}
			}

			function getCoordinatesFromElements() {
				var coordinates = {
					latitude: parseFloat(elements.coordinates.latitude.val()),
					longitude: parseFloat(elements.coordinates.longitude.val())
				};

				if(coordinates.latitude && coordinates.longitude) {
					return coordinates;
				}

				return null;
			}

			function setMarker(coordinates) {
				if(offsetMarker) offsetMarker.setMap(null);
				if(marker) marker.setMap(null);
				var imageName = TYPO3.jQuery(".tceforms-multiselect > option").attr("title");
				if(imageName !== undefined){
					var image = {
						url: "/uploads/tx_easygooglemap/" + imageName,
						anchor: new google.maps.Point(elements.anchors.anchorx.val(), elements.anchors.anchory.val())
					}
				} else {
					var image = null;
				}
				marker = new google.maps.Marker({
					map: map,
					position: new google.maps.LatLng(coordinates.latitude, coordinates.longitude),
					draggable: markerDraggable,
					icon: image
				});
				var offsetImage = {
					url: "/typo3conf/ext/easy_googlemap/Resources/Public/Icons/cross.png",
					anchor: new google.maps.Point(8, 8)
				}
				offsetMarker = new google.maps.Marker({
					map: map,
					position: new google.maps.LatLng(coordinates.latitude, coordinates.longitude),
					icon: offsetImage
				});

				google.maps.event.addListener(marker, 'dragend', function(event) {
					var dragEndCoordinates = {
						latitude: event.latLng.lat(),
						longitude: event.latLng.lng()
					};
					offsetMarker.setPosition({
						lat: event.latLng.lat(),
						lng: event.latLng.lng()
					});
					getAddressFromCoordinates(dragEndCoordinates, function (address){
						setElementValues(address, dragEndCoordinates);
					});
				});
			}
			function updateAnchors(){
				elements.anchors.anchorx.on('keyup', updateConfig);
				elements.anchors.anchory.on('keyup', updateConfig);
			}
			updateAnchors();
		});
	};

}(jQuery));