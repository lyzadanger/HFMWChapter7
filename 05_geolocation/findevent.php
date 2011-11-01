<!DOCTYPE html> 
<html> 
	<head> 
	<meta charset="UTF-8" />
	<title>Find an Event</title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0rc1/jquery.mobile-1.0rc1.min.css" />
  <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
  
  <script type="text/javascript">
    // Need to bind to mobileinit before jQ mobile library is loaded
    $(document).bind('mobileinit',function(){
      $.mobile.selectmenu.prototype.options.nativeMenu = false;
    });
  </script>
  <script src="http://code.jquery.com/mobile/1.0rc1/jquery.mobile-1.0rc1.min.js"></script>  
  <link rel="stylesheet" href="css/styles.css" />
</head> 
<body> 

<div data-role="page">
	<div data-role="header" data-position="fixed">
		<h1>Find Events</h1>
	</div><!-- /header -->

	<div data-role="content">
  <script src="http://code.google.com/apis/gears/gears_init.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/geo.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="js/geolocation.js"></script>
    <h3>Search for Events</h3>
    <form method="get" action="<?php print $_SERVER['PHP_SELF']; ?>" id="search_form">
      <div data-role="fieldcontain">
        <label for="state_filter">Filter by State:</label>
        <select id="state_filter">
          <option value="">Choose State</option>
          <option value="AL">Alabama</option> 
          <option value="AK">Alaska</option> 
          <option value="AZ">Arizona</option> 
          <option value="AR">Arkansas</option> 
          <option value="CA">California</option> 
          <option value="CO">Colorado</option> 
          <option value="CT">Connecticut</option> 
          <option value="DE">Delaware</option> 
          <option value="DC">District Of Columbia</option> 
          <option value="FL">Florida</option> 
          <option value="GA">Georgia</option> 
          <option value="HI">Hawaii</option> 
          <option value="ID">Idaho</option> 
          <option value="IL">Illinois</option> 
          <option value="IN">Indiana</option> 
          <option value="IA">Iowa</option> 
          <option value="KS">Kansas</option> 
          <option value="KY">Kentucky</option> 
          <option value="LA">Louisiana</option> 
          <option value="ME">Maine</option> 
          <option value="MD">Maryland</option> 
          <option value="MA">Massachusetts</option> 
          <option value="MI">Michigan</option> 
          <option value="MN">Minnesota</option> 
          <option value="MS">Mississippi</option> 
          <option value="MO">Missouri</option> 
          <option value="MT">Montana</option> 
          <option value="NE">Nebraska</option> 
          <option value="NV">Nevada</option> 
          <option value="NH">New Hampshire</option> 
          <option value="NJ">New Jersey</option> 
          <option value="NM">New Mexico</option> 
          <option value="NY">New York</option> 
          <option value="NC">North Carolina</option> 
          <option value="ND">North Dakota</option> 
          <option value="OH">Ohio</option> 
          <option value="OK">Oklahoma</option> 
          <option value="OR">Oregon</option> 
          <option value="PA">Pennsylvania</option> 
          <option value="RI">Rhode Island</option> 
          <option value="SC">South Carolina</option> 
          <option value="SD">South Dakota</option> 
          <option value="TN">Tennessee</option> 
          <option value="TX">Texas</option> 
          <option value="UT">Utah</option> 
          <option value="VT">Vermont</option> 
          <option value="VA">Virginia</option> 
          <option value="WA">Washington</option> 
          <option value="WV">West Virginia</option> 
          <option value="WI">Wisconsin</option> 
          <option value="WY">Wyoming</option>
        </select>
      </div>

      <div data-role="fieldcontain">
        <input type="submit" value="Find Events" id="search_submit" />
      </div>
    </form>

  
	</div><!-- /content -->

	<div data-role="footer" data-position="fixed">
		<div data-role="navbar"> 
			<ul> 
				<li><a href="index.php" data-icon="info">About</a></li> 
				<li><a href="findevent.php" data-icon="star" class="ui-btn-active">Events</a></li> 
				<li><a href="tartans.php" data-icon="grid">Tartans</a></li> 
			</ul> 
		</div><!-- /navbar --> 
	</div><!-- /footer -->
</div><!-- /page -->

</body>
</html>