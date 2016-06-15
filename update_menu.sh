#!/bin/sh

# Filtro WEB
test=`grep 'Filtro WEB' /usr/local/www/head.inc`
if [ ! "$test" ]; then
  sed -i '' '/services_snmp.php/{p;s/.*/\$services_menu\[\] \= array\(gettext\(\"Filtro WEB\"\), \"\/filtro\/index.php\"\)\;/;}' /usr/local/www/head.inc
fi

# Filter Report
test=`grep 'Filter Report' /usr/local/www/head.inc`
if [ ! "$test" ]; then
  sed -i '' '/status_graph.php?if=wan/{p;s/.*/\$status_menu\[\] \= array\(gettext\(\"Filter Report\"\), \"\/sarg\/\"\)\;/;}' /usr/local/www/head.inc
fi
