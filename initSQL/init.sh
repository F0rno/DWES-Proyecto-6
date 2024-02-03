#!/usr/bin/env bash

mariadb --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    SOURCE /docker-entrypoint-initdb.d/init.sql;
EOSQL