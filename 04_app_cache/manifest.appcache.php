<?php header('Content-type: text/cache-manifest'); ?>
CACHE MANIFEST

NETWORK:
*

CACHE:
http://code.jquery.com/mobile/1.0rc1/jquery.mobile-1.0rc1.min.css
http://code.jquery.com/jquery-1.6.4.min.js
http://code.jquery.com/mobile/1.0rc1/jquery.mobile-1.0rc1.min.js
http://code.jquery.com/mobile/1.0rc1/images/ajax-loader.png
http://code.jquery.com/mobile/1.0rc1/images/icons-18-white.png
http://code.jquery.com/mobile/1.0rc1/images/icons-18-black.png
http://code.jquery.com/mobile/1.0rc1/images/icons-36-white.png
http://code.jquery.com/mobile/1.0rc1/images/icons-36-black.png
js/cache-manager.js
css/styles.css
<?php
require_once('config.php');
$dir = TARTAN_IMAGE_DIR;
$tartans = array();
if (is_dir($dir)) {
  if ($dh = opendir($dir)) {
    while (($file = readdir($dh)) !== false) {
      if (filetype($dir . $file) === 'file' && strpos($file, '-160.png') !== FALSE) {
        print PUBLIC_TARTAN_DIR . 'images/' . $file . "\r\n";
      }
    }
    closedir($dh);
  }
}
?>