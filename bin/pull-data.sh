#!/bin/sh
echo "Pulling data from Heroku..."
heroku run 'drush sql:dump' > data/tmp_dmp.sql
if [ $? -ne 0 ]; then
  echo "Error: Failed to dump database."
  rm -f data/tmp_dmp.sql
  exit 1
fi
mv -f data/tmp_dmp.sql data/dump.sql
echo "Importing data into local database..."
lando drush sql:cli < data/dump.sql
echo "Done."
