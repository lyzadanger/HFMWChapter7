/* First variant of geolocation.js in chapter */
function getLocation() {
  // Verify the browser supports geolocation
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(onSuccess, onError);
  } else { // It doesn't
    onError(alert(("Browser doesn't support geolocation")));
  }
}

function onSuccess(position) {
  var coordinates = position.coords;
  alert(coordinates.latitude + ', ' + coordinates.longitude);
}

function onError(error) {
  alert(error.message);
}

getLocation();