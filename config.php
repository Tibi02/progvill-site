<?php
// database settings
$db_host = getenv('MYSQL_HOST');
$db_port = getenv('MYSQL_PORT');
$db_user = getenv('MYSQL_USER');
$db_pass = getenv('MYSQL_PASSWORD');
$db_name = getenv('MYSQL_DB');
$db_prefix = getenv('MYSQL_DB_PREFIX');
define("DB_PREFIX", "progvill_");
define("COOKIE_PREFIX", "progvill01_");
?>