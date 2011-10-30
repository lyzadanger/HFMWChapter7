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