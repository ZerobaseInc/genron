#!/bin/sh
echo "Restoring config..."
lando drush config:import --source=../config
echo "Done."
