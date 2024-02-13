<!DOCTYPE html>
<html>
<head>
    <title>Google Maps Geocoding</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhSDqFAuLoGHPw8UDYt2VGIvSjU6Ze10w"></script>
    <script>
        function geocodeAddress() {
            var address = document.getElementById('address').value;
            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({'address': address}, function(results, status) {
                if (status === 'OK') {
                    var location = results[0].geometry.location;
                    var link = 'https://www.google.com/maps/search/?api=1&query=' + location.lat() + ',' + location.lng();
                    document.getElementById('locationLink').innerHTML = '<a href="' + link + '" target="_blank">' + link + '</a>';
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>
</head>
<body>
    <form>
        <label for="address">Enter Address:</label>
        <input type="text" id="address" name="address">
        <button type="button" onclick="geocodeAddress()">Get Location Link</button>
    </form>
    <div id="locationLink"></div>
</body>
</html>
