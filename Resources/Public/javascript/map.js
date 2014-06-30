var MapStyle = [ { stylers: [ { saturation: -98 }, { gamma: 0.79 } ] } ];
        var startcenter = new google.maps.LatLng(47.52190,15.41676);
    var bounds = new google.maps.LatLngBounds();
    var data = [
        {
             'title' : 'BKM GmbH Arbon',
            'position' : new google.maps.LatLng(47.52190,9.41676),
            'clickable' : true,
            'icon' : "./fileadmin/website_files/images/map-pin.png",
            'link' : "https://www.google.ch/maps/place/BKM+Customs+%26+Consulting+GmbH/@47.5218661,9.4167426,16z/data=!4m2!3m1!1s0x479b1d2459d6f7f9:0x6401819ccdf6182b" [^]
        },{
            'title' : 'BKM GmbH Thayngen',
            'position' : new google.maps.LatLng(47.74051,8.71502),
            'clickable' : true,
            'icon' : "./fileadmin/website_files/images/map-pin.png",
            'link' : "https://www.google.ch/maps/place/Grenzstrasse+72/@47.7405081,8.715017,17z/data=!3m1!4b1!4m2!3m1!1s0x479a8085490319d1:0x9f67c9145305dc57" [^]
        }
    ];

    var optionen = {
        zoom: 10,
        center: startcenter,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: MapStyle
    };

    var map = new google.maps.Map(document.getElementById("karte"), optionen);
    var markers = [];

    for (var i=0;i<data.length;i++){
        markers[i] = new google.maps.Marker({
            position: data[i].position,
            map: map,
            clickable: data[i].clickable,
            url: data[i].link,
            icon: data[i].icon
        });

       infobox = new InfoBox({
             content: data[i].title,
             disableAutoPan: false,
             pixelOffset: new google.maps.Size(0, 0),
             infoBoxClearance: new google.maps.Size(1, 1),
            closeBoxMargin: "-10px -60px 10px 10px"
        }).open(map, markers[i]);

        new google.maps.event.addListener(markers[i], 'click', function() {
            window.open(this.url);
        });
        bounds.extend(data[i].position);
    }

    map.fitBounds(bounds);