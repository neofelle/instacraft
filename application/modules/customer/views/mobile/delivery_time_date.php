<script type="text/javascript" src="https://iitism.ac.in/assets/datetimepick/jquery.simple-dtpicker.js"></script>
<link type="text/css" href="https://iitism.ac.in/assets/datetimepick/jquery.simple-dtpicker.css" rel="stylesheet" />

<section class="container">
    <div class="delivery_container">
        <div class="map_container">
            <div class="map_box" id="map_delivery">
            </div>
            <div class="delivery_form">
                <input class="txt-field" type="text" name="address" id="delivery_address" placeholder="Current Address">
                <input class="txt-field" type="text" name="date_time" id="delivery_date_time" placeholder="Select Delivery Date & Time">
                <input class="txt-field" type="hidden" name="delivery_lat_lng" id="delivery_lat_lng">
            </div>
        </div>
        <div class="total_delivery">
            <ul class="opposite_detail">
                <li>
                    <span class="label">Total:</span>
                    <span class="value">$<?=$cartTotal?></span>
                </li>
            </ul>
            <button class="btn gradient change_pass redirect_to_caregiver"><span class="btn-txt">Make Payment</span></button>
        </div>
    </div>
</section>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxPoiZ1JSZYu_NqSqIGFcRRFEQnzo3yBA&libraries=places&callback=initMap">
</script>
<script>
    ilat = 45.513609;
    ilng = -122.681460;
//    function initMap() {
//        var uluru = {lat: 45.513609, lng: -122.681460};
//        var map = new google.maps.Map(document.getElementById('map_delivery'), {
//            zoom: 12,
//            center: uluru,
//            zoomControl: false,
//            mapTypeControl: false,
//            streetViewControl: false,
//            fullscreenControl: false
//        });
//
//        var contentString = '<div id="content">' +
//                '<div id="siteNotice">' +
//                '</div>' +
//                '<div id="bodyContent">' +
//                `<p> The more app downloads we have in the area, the sooner we can expand there. So share the app with friends and we may get there this month. We’re expanding to new towns every week. We love our InstaCraft Pioneers and we hope to expand to your area soon. We’re very sorry that we don’t currently deliver in your area. </p>` +
//                '</div>' +
//                '</div>';
//
//        var infowindow = new google.maps.InfoWindow({
//            content: contentString
//        });
//
//        var marker = new google.maps.Marker({
//            position: uluru,
//            map: map,
//            title: 'Uluru (Ayers Rock)'
//        });
//        marker.addListener('click', function () {
//            infowindow.open(map, marker);
//            $('.gm-style-iw').parent('div').addClass('map_model')
//        });
//
//    }
    
    $(function(){
        $('*[name=date_time]').appendDtpicker();
    });
    
    
    
    function initMap() {
    map = new google.maps.Map(document.getElementById('map_delivery'), {
        center: {lat: parseFloat(ilat), lng: parseFloat(ilng)},  // -21.772488, 131.564276
        zoom: 12,
        mapTypeControl: false,
        streetViewControl: false,
        fullscreenControl: false
    });
    var geocoder = new google.maps.Geocoder();
    var input = document.getElementById('delivery_address');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    
    var markerPos = new google.maps.LatLng(parseFloat(ilat), parseFloat(ilng));
    var marker = new google.maps.Marker({
        map: map,
        position: {lat: 45.513609, lng: -122.681460},
        draggable: true, //make it draggable
        anchorPoint: new google.maps.Point(0, -29)
    });

    infowindow.setContent('<div id="content">' +
        '<div id="siteNotice">' +
        '</div>' +
        '<div id="bodyContent">' +
        `<p> The more app downloads we have in the area, the sooner we can expand there. So share the app with friends and we may get there this month. We’re expanding to new towns every week. We love our InstaCraft Pioneers and we hope to expand to your area soon. We’re very sorry that we don’t currently deliver in your area. </p>` +
        '</div>' +
        '</div>');
    infowindow.open(map, marker);

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        
        if (!place.geometry) { window.alert("Autocomplete's returned place contains no geometry"); }
        if (!place.geometry) {
            $('#whaddress').html('<i style="font-weight:200 !important;"> Not set yet </i>');
            $('#address').val('');
        }
  
        if(place.geometry){
            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(8);
            }

            marker.setPosition(place.geometry.location);
            marker.setVisible(true);


            var address = '';
            if (place.address_components) {
                address = [
                  (place.address_components[0] && place.address_components[0].short_name || ''),
                  (place.address_components[1] && place.address_components[1].short_name || ''),
                  (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            //infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
            infowindow.setContent('<div id="content">' +
                '<div id="siteNotice">' +
                '</div>' +
                '<div id="bodyContent">' +
                `<p> The more app downloads we have in the area, the sooner we can expand there. So share the app with friends and we may get there this month. We’re expanding to new towns every week. We love our InstaCraft Pioneers and we hope to expand to your area soon. We’re very sorry that we don’t currently deliver in your area. </p>` +
                '</div>' +
                '</div>');
            infowindow.open(map, marker);

            var inLatLng = place.geometry.location.lat().toFixed(8) +','+ place.geometry.location.lng().toFixed(8);
            //-- Ftech Address
            //alert(inLatLng);
            geocoder.geocode({
                'latLng': place.geometry.location
                }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                  if (results[0]) {
                    //-- Fetch Address 
                    //alert(results[0].formatted_address);
                    $('#whaddress').html(results[0].formatted_address);
                    $('#address').val(results[0].formatted_address);
                    $('#latlng').val(inLatLng);
                    $('#delivery_lat_lng').val(inLatLng);
                    
                  }
                  else{
                      $('#whaddress').html('<i style="font-weight:200 !important;"> Not set yet </i>');
                      $('#address').val('');
                      $('#latlng').val('');
                      $('#delivery_lat_lng').val('');
                  }
                }
            });
        }
        $('.gm-style-iw').parent('div').addClass('map_model')
    });
    
    //Listen for drag events!
    google.maps.event.addListener(marker, 'dragend', function(event){
        //Get the location that the user clicked.
        var clickedLocation = event.latLng;
        marker.setPosition(clickedLocation);
        
        var inLatLng = clickedLocation.lat().toFixed(8) + ',' + clickedLocation.lng().toFixed(8);
        //-- Ftech Address
        geocoder.geocode({
            'latLng': event.latLng
            }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              if (results[0]) {
                //-- Fetch/Set Address 
                $('#whaddress').html(results[0].formatted_address);
                $('#address').val(results[0].formatted_address);
                $('#latlng'). val(inLatLng);
                $('#delivery_lat_lng'). val(inLatLng);
              }
              else{
                  $('#whaddress').html('<i style="font-weight:200 !important;"> Not set yet </i>');
                  $('#address').val('');
                  $('#latlng'). val('');
                  $('#delivery_lat_lng'). val('');
              }
            }
        });
    });
    
    //Listen for any clicks on the map.
    google.maps.event.addListener(map, 'click', function(event) { 
        //Get the location that the user clicked.
        var clickedLocation = event.latLng;
        marker.setPosition(clickedLocation);
        
        var inLatLng = clickedLocation.lat().toFixed(8) + ',' + clickedLocation.lng().toFixed(8);   
        //-- Fetch/Set Address 
        geocoder.geocode({
            'latLng': event.latLng
            }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              if (results[0]) {
                //-- Fetch Address 
                //alert(results[0].formatted_address);
                $('#whaddress').html(results[0].formatted_address);
                $('#address'). val(results[0].formatted_address);
                $('#latlng'). val(inLatLng);
                $('#delivery_lat_lng'). val(inLatLng);
              }
              else{
                  $('#whaddress').html('<i style="font-weight:200 !important;"> Not set yet </i>');
                  $('#address').val('');
                  $('#latlng'). val('');
                  $('#delivery_lat_lng'). val('');
              }
            }
        });
    });
}


///+++ Add Marker for users 
function initMarker(){
    var aCenter=$('#alertCenter').val();
    var aRange=$('#alertRange').val();
    var aMapper=$('#alertMapper').val();
    if(aMapper == '2'){ aRange =  aRange * 1.609344;aRange = Math.round(aRange);  }
    datapart = {alertCenter: aCenter,alertRange : aRange};
    urlpart="getRadiusUsers"; 
    $.ajax({
        type: "POST",
        url: urlpart,
        data: datapart,
        dataType:'json',
        success: function (response) {
            contentstring.length = 0; regionlocation.length = 0;
            contentstring = []; regionlocation = [];
            if(response.status){
                urlpart="hitRadiusPush"; var alertTitle=$('#alertTitle').val(); var alertBody=$('#alertBody').val();
                results = response.result;
                alertUsersData = results;
                itsSize = results.length;
                
                $.each(results, function( key, value ) {
                    //certificate,country,distance,dscr,email,icon,name,plateform,pos,token
                    userdata = value;
                    datapart = {certificate:userdata['certificate'],plateform:userdata['plateform'],token:userdata['token'],dscr:userdata['dscr'],title:alertTitle, body:alertBody, };
                   
                    
                    contentstring.push(userdata['name']+"("+userdata['country']+")");
                    regionlocation.push([userdata['lat'],userdata['lng']]);
                    
                });
                //console.log(itsSize);
                drop();
            }
            else{
                toggleMarkers()
            }
        },
    });
    
}
function drop() {

    if(markers && markers.length !== 0){
        for(var i = 0; i < markers.length; ++i){
            markers[i].setMap(null);
        }
    }
    for (var i = 0; i < usersCount ; i++) {
        //  setTimeout(function() {
            appendMarker(parseFloat(regionlocation[i][0]), parseFloat(regionlocation[i][1]), contentstring[i]);
        //}, 150);
    }
}
function toggleMarkers(){
    for (i = 0; i<markers.length; i++){
            markers[i].setMap(null);
            //markers[i].setMap(map);
    }
}
function appendMarker(latitude, longitude, text) {
    var pos = {lat: latitude, lng: longitude};
    console.log(pos);    
    marker = new google.maps.Marker({
        position: pos,
        map: map,
        icon : 'https://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Ball-Azure-icon.png',
        title: text
    });
    markers.push(marker);
    
}

    
    
    
</script>