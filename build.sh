#!/bin/sh

if [ -e chapter7 ]
then
  if [ -e chapter7/tartans ]
  then
    cp -R chapter7/tartans .
  fi
  rm -rf chapter7
  if [ -e tartans ]
  then
    mv tartans chapter7
  fi
fi

mkdir -p chapter7
cd chapter7
mkdir -p extras
mkdir -p js
mkdir -p tartans
mkdir -p tartans/images
mkdir -p tartans/data
cp -LR ../01_js_enhancement/* .
# This is verbose; sorry. I'm just trying to be explicit so I save my own sanity.
mkdir -p extras/scripts
cp ../Tartanator/config.php extras/scripts
cp ../Tartanator/generate.php extras/scripts
cp ../Tartanator/image.php extras/scripts
cp -R ../Tartanator/inc extras/scripts
cp -R ../Tartanator/dialogs .
cp -LR ../Tartanator/js extras
cp -LR ../Tartanator/css extras
cp ../03_cache_manifest/current_file_list.txt extras
cp ../02_server_enhancement/tartan-template.php tartans
cp ../04_app_cache/js/cache-manager.js extras/js
cp ../05_geolocation/js/geolocation.2.js extras/js/enhanced_geo_form.js
cp ../05_geolocation/js/geo.js extras/js
mkdir -p extras/events
cp ../05_geolocation/event* extras/events
cp ../05_geolocation/us_states.txt extras/events
chmod -R g+w tartans