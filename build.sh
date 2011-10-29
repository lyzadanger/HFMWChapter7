#!/bin/sh

mkdir -p chapter7
cd chapter7
mkdir -p extras
mkdir -p js
mkdir -p tartans
mkdir -p tartans/images
mkdir -p tartans/data
chmod -R g+w tartans
cp -LR ../01_js_enhancement/* .
# This is verbose; sorry. I'm just trying to be explicit so I save my own sanity.
mkdir extras/scripts
cp ../Tartanator/config.php extras
cp ../Tartanator/generate.php extras/scripts
cp ../Tartanator/image.php extras/scripts
cp -R ../Tartanator/inc extras/scripts
cp -LR ../Tartanator/js extras
cp -LR ../Tartanator/css extras
cp ../Tartanator/tartans/tartan-template.php tartans
cd ..
zip -qr chapter7.zip chapter7