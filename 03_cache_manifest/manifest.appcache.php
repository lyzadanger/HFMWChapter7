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

index.php
tartans.php
css/styles.css

<?php
require_once('config.php');

// Cache the HTML files
$html_dir = TARTAN_HTML_DIR;
if (is_dir($html_dir)) {
  if ($dh = opendir($html_dir)) {
    while (($file = readdir($dh)) !== false) {
      if (filetype($html_dir . $file) === 'file' && strpos($file, '.html') !== FALSE) {
        print PUBLIC_TARTAN_DIR . $file . "\r\n";
      }
    }
    closedir($dh);
  }
}

// Cache the images
$img_dir = TARTAN_IMAGE_DIR;
if (is_dir($img_dir)) {
  if ($dh = opendir($img_dir)) {
    while (($file = readdir($dh)) !== false) {
      if (filetype($img_dir . $file) === 'file' && strpos($file, '-200.png') !== FALSE) {
        print PUBLIC_TARTAN_DIR . 'images/' . $file . "\r\n";
      }
    }
    closedir($dh);
  }
}

?>