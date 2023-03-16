#!/bin/sh
echo "Exporting config..."
if [ -d ../config-tmp ]; then
  rm -rf ../config-tmp
fi
lando drush config:export --destination=../config-tmp
if [ $? -ne 0 ]; then
  echo "Error: Failed to export config."
  rm -rf ../config-tmp
  exit 1
fi
rm -r config
mv -f config-tmp config
echo "Done."
echo "Now you can...
        1. git add config 
        2. git commit -m 'Exported config.'
        3. git push origin master"
