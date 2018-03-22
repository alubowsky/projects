/*global google, $*/
/* jshint -W104*/

(function () {
  "use strict";

  //set default location
  let location = { lat: 41.8781, lng: -87.6298 },

    //bounds var to set how big map is
    bounds,

    places = [],

    //grab hold of the list that the places will be placed in
    theList = $('#picDiv ul'),

    //the search box bounds
    searchBounds = new google.maps.LatLngBounds(
      new google.maps.LatLng(85, -180),           // top left corner of map
      new google.maps.LatLng(-85, 180)            // bottom right corner
    ),

    //search box val
    search = $('#search'),

    //if in search mode
    setSearch = false,

    //create map
    map = new google.maps.Map(
      document.getElementById('map'),
      {
        center: location,
        zoom: 2
      }
    ),

    //create info window
    infoWindow = new google.maps.InfoWindow({
      maxWidth: 250
    }),

    //array of the markers on the map
    markers = [],

    //service to do the searches
    service = new google.maps.places.PlacesService(map);


  //function to clear old markers
  function clearmap() {
    /*if(rectangle !== null){
        rectangle.setMap(null);
    }*/
    if (markers) {
      markers.forEach(function (marker) {
        marker.setMap(null);
      });
    }
    theList.empty();
  }

  //function to handle geolocation error
  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
      'Error: The Geolocation service failed. check to see if you gave permission to your browser or use the search box instead' :
      'Error: Your browser doesn\'t support geolocation. Use the search box instead');
    infoWindow.open(map);
  }

  //function search for synagogue nearby in 1000 radius
  function findSynagoguesNearby(nearby) {
    let request = {
      location: nearby,
      radius: '5000',
      keyword: 'congregation',
      type: ['synagogue']
    };
    service.nearbySearch(request, searchCallback);
    request = {
      location: nearby,
      keyword: 'shul',
      radius: '5000',
      type: ['synagogue']
    };
    service.nearbySearch(request, searchCallback);
  }

  //function search for synagogue search box in 1000 radius
  function findSynagoguesSearch(search) {
    setSearch = true;
    clearmap();
    let request = {
      query: search,
      type: ['synagogue']
    };
    service.textSearch(request, searchCallback);
  }

  //pagination for more results
  var getNextPage = null;
  var moreButton = $('#more');
  moreButton.click(function () {
    moreButton.attr('disabled', 'disabled');
    if (getNextPage) getNextPage();
  });

  //callback for the search - places marker at found locations
  function searchCallback(results, status, pagination) {
    bounds = new google.maps.LatLngBounds();
    if (status == google.maps.places.PlacesServiceStatus.OK) {
      for (var i = 0; i < results.length; i++) {
        let place = results[i],
          url = place.photos ? place.photos[0].getUrl({ 'maxWidth': 200, 'maxHeight': 200 }) : "default.png",
          address = setSearch ? place.formatted_address : place.vicinity;
        bounds.extend(place.geometry.location);
        map.fitBounds(bounds);
        console.log(place);
        $('<li><img src= "' + url + '"/><div id = "details">' +
          '<h5>' + place.name + '</h5>' +
          '<p>' + address + '</p></div></li>')
          .appendTo(theList)
          .click(() => {
            map.panTo(place.geometry.location);
            map.setZoom(15);
          });
        places.push(place);
        createMarker(place.geometry.location, place.name);
      }

      //pagination for more results
      moreButton.show();
      moreButton.attr('disabled', !pagination.hasNextPage);
      getNextPage = pagination.hasNextPage && function () {
        pagination.nextPage();
      };
    }
  }

  //creates a marker on the map
  function createMarker(place, name) {
    var marker = new google.maps.Marker({
      map: map,
      position: place,
      title: name
    });
    markers.push(marker);
  }

  //geolocation
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
      location = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      map.setCenter(location);
      findSynagoguesNearby(location);
      //$('#more').show();
    },
      function () {
        handleLocationError(true, infoWindow, map.getCenter());
      });
  } else {
    //if user doesn't allow
    handleLocationError(false, infoWindow, map.getCenter());
  }

  //using search box
  $('#go').click(function () {
    findSynagoguesSearch(search.val());
    //$('#more').show();
  });


}());