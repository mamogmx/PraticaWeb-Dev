<?php
define('DSN','pgsql:dbname=gw_development;host=127.0.0.1;port=5432');
define('DB_VALIDATE_USER','postgres');
define('DB_VALIDATE_PWD','postgres');
if($_SESSION["USER"]) define('DB_USER',$_SESSION["USER"]);
if($_SESSION["PWD"]) define('DB_PWD',$_SESSION["PWD"]);

define('LIB',APPS_DIR."lib".DIRECTORY_SEPARATOR);
define('LOCAL_LIB',DATA_DIR."lib".DIRECTORY_SEPARATOR);
?>

