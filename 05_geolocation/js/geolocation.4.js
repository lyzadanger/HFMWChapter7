(function () {
  var $page, $searchForm, $submitButton, $stateFilter;
  $('[data-role="page"]').live('pagecreate', initGeo);
  function initGeo() {
    $searchForm = $('#search_form');
    $submitButton = $('#search_submit');
    $stateFilter = $('#state_filter');
    if (geo_position_js.init()) {
      initGeoOptions();
    }
  }
  function initGeoOptions() {
    var $latField, $longField, $flipSwitch;
    $flipSwitch = $('<select name="usegeo" id="usegeo" data-role="slider"><option value="off">Off</off><option value="on">On</option></select>').change(toggleLocation);
    $flipSwitch.prependTo($searchForm).wrap('<div data-role="fieldcontain"></div>');
    $flipSwitch.before('<label for="usegeo">Use my Location:</label>');
    $latField = $('<input type="hidden" />').attr({ name : 'latitude', id : 'latitude'})
    $longField = $('<input type="hidden" />').attr({ name: 'longitude', id : 'longitude' })
    $latField.appendTo($searchForm);
    $longField.appendTo($searchForm);          
  }
  function toggleLocation(event) {
    var geoActivated = ($(event.target).val() == 'on') ? true : false;
    if (geoActivated) {
      $submitButton.button('disable');
      $stateFilter.selectmenu('disable');
      $.mobile.showPageLoadingMsg();
      geo_position_js.getCurrentPosition(onGeoSuccess, onGeoError);
    } else {
      $stateFilter.selectmenu('enable');
    }
  }
  function onGeoSuccess(position) {
    var coordinates = position.coords;
    $('#latitude').val(coordinates.latitude);
    $('#longitude').val(coordinates.longitude);
    $.mobile.hidePageLoadingMsg();
    $submitButton.button('enable');
  }
  function onGeoError(error) {
    $('#usegeo').val('off').trigger('change');
    if (error.code != error.PERMISSION_DENIED) {
      $.mobile.changePage( "dialogs/geolocation_error.html", {
         transition: "pop",
         reverse: false,
         role: 'dialog'
      });
    }
  }
})();