window.onload = function(){
  TYPO3.jQuery('#map').addressMap({
    addressElements: {
      street: 'input[name*="street"]',
      city: 'input[name*="city"]',
      zip: 'input[name*="postal_code"]',
      country: 'input[name*="country"]'
    },
    coordinateElements: {
      latitude: 'input[name*="latitude"]',
      longitude: 'input[name*="longitude"]'
    },
    markerDraggable: true,
    scrollwheel: false
  });
};