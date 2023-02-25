function initialize() {
		var a = [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#212121"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#212121"
      }
    ]
  },
  {
    "featureType": "administrative",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.locality",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#bdbdbd"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#181818"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1b1b1b"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#2c2c2c"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8a8a8a"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#373737"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#3c3c3c"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#4e4e4e"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#000000"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#3d3d3d"
      }
    ]
  }
];
		var b = new google.maps.StyledMapType(a, {
				name: "Styled Map"
		});
		jQuery(".map-contact").each(function(index, el){
			var latitude = jQuery(el).data("latitude");
			var longitude = jQuery(el).data("longitude");

			var c = new google.maps.LatLng(latitude, longitude);
			var d = {
					scrollwheel: !1,
					zoom: 16,
					center: c,
					mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			map = new google.maps.Map(el, d);
			map.mapTypes.set("map_style", b);
			map.setMapTypeId("map_style");
			var e = "/website2018/wp-content/themes/produtora/img/map-pin.png",
					f = new google.maps.Marker({
							position: new google.maps.LatLng(parseFloat(latitude), parseFloat(longitude)),
							title: "2K Filmes",
							draggable: !1,
							map: map,
							icon: e,
							animation: google.maps.Animation.DROP,
							animation: google.maps.Animation.BOUNCE
					});
			markers.push(f);
			var g = '<div id="content"><div id="siteNotice"></div><div id="bodyContent"><h3>2K Filmes</h3>';
			contentPopup[0] = g, attachSecretMessage(f, 0)





		});
}

function attachSecretMessage(a, b) {
		var c = new google.maps.InfoWindow({
				content: contentPopup[b],
				size: new google.maps.Size(50, 50)
		});
		google.maps.event.addListener(a, "click", function() {
				c.open(map, a)
		})
}

function centerMapa(a) {
		var b = a.split(", ");
		latLngCenterSearch = new google.maps.LatLng(b[0], b[1]), map.setCenter(latLngCenterSearch)
}
var statesNames = new Array,
		ufStates = new Array,
		citiesNames = new Array,
		map;
markers = new Array, contentPopup = new Array


