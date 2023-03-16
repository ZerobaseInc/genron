#!/bin/sh
echo "Restoring config..."
lando drush config:import --source=../config
echo "Rebuilding cache..."
lando drush cache:rebuild
echo "Done."
