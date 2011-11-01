#!/bin/sh

cd chapter7

# Step 2
cp -R extras/scripts/* .
cp extras/config.php .
cp ../02_server_enhancement/build.php .
cp ../02_server_enhancement/tartans.php .

# Step 3
# Yes, some of this is repetitive; it's puposeful
# Need to be explicit so I don't forget what I'm doing
cp ../03_cache_manifest/*.php .
mv tartan-template.php tartans

# Step 4
# Repetitive; ditto.
cp ../04_app_cache/*.php .
cp ../04_app_cache/js/*.js ./js

# Step 5
# Indeed
cp ../05_geolocation/findevent.php .
cp ../05_geolocation/js/geolocation.4.js js/geolocation.js
cp ../05_geolocation/js/geo.js js
cp ../05_geolocation/geolocation_error.html dialogs
cp ../05_geolocation/event* inc