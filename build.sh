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
cd ..
zip -qr chapter7.zip chapter7