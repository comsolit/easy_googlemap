window.onload = function(){
  $('#map').addressMap({
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
};