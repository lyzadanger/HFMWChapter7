<!DOCTYPE html> 
<html manifest="manifest.appcache.php"> 
	<head> 
	<meta charset="UTF-8" />
	<title>The Tartanator</title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0rc1/jquery.mobile-1.0rc1.min.css" />
  <link rel="stylesheet" href="css/styles.css" />

  <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
  <script type="text/javascript">
    // Need to bind to mobileinit before jQ mobile library is loaded
    $(document).bind('mobileinit',function(){
      $.mobile.selectmenu.prototype.options.nativeMenu = false;
    });
  </script>
  <script src="http://code.jquery.com/mobile/1.0rc1/jquery.mobile-1.0rc1.min.js"></script>

  <script src="js/cache-manager.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript" charset="utf-8">
    // If we're online, and the server has fresher data than we do in our app cache,
    // serve it up!
    $(function () {
      new CacheManager('#tartans_page').ensureFreshContent('ul[data-role="listview"]', 'inc/list.php');
    });
  </script>


</head> 
<body> 

<div data-role="page" id="tartans_page">

	<div data-role="header" data-position="fixed">
		<h1>Tartans</h1>
		<a href="build.php" data-role="button" data-icon="plus" class="ui-btn-right" data-theme="b">Create</a>
	</div><!-- /header -->

	<div data-role="content">	
    <ul data-role="listview" data-filter="true">
      <?php include('inc/list.php'); ?>
    </ul>
	</div><!-- /content -->
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar"> 
			<ul> 
				<li><a href="index.php" data-icon="info">About</a></li> 
				<li><a href="findevent.php" data-icon="star">Events</a></li> 
				<li><a href="tartans.php" data-icon="grid" class="ui-btn-active">Tartans</a></li> 
			</ul> 
		</div><!-- /navbar --> 
	</div><!-- /footer -->
</div><!-- /page -->

</body>
</html>