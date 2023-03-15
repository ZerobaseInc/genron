!/bin/sh
echo "Running post-deploy script."
echo "Importing database..."
export DB_HOST=$STACKHERO_MARIADB_HOST
export DB_PASS=$STACKHERO_MARIADB_ROOT_PASSWORD
drush sql:cli < data/dump.sql
echo "Database imported."
echo "Finishing post-deploy script."
