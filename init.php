<?php

function loadLibs(){
    $libs=Array("utils.class.php","app.class.php","user.class.php");
    foreach($libs as $lib){
        if (file_exists(LOCAL_LIB.$lib)){
            require_once LOCAL_LIB.$lib;
        }
        elseif(file_exists(LIB.$lib)) {
            require_once LIB.$lib;
        }
        else die("impossibile caricare la libreria $lib");
    }
};

error_reporting(E_ERROR);

if (!session_id()) session_start();

define('APPS_DIR',dirname(__FILE__).DIRECTORY_SEPARATOR);
$dataDir=  (getenv('PWDataDir'))?(getenv('PWDataDir')):(APPS_DIR."data".DIRECTORY_SEPARATOR);
define('DATA_DIR',$dataDir);

include_once DATA_DIR.'config.php';
loadLibs();

?>