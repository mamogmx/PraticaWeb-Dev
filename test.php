<?php
require_once "init.php";
require_once "login.php";

?>
<HTML>
<HEAD>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <?php
        utils::loadJS();
        utils::loadCss();
    ?>
    
</HEAD>
<BODY>
 <?php
    $form = new Form(TAB."pe".DIRECTORY_SEPARATOR."avvioproc.json");
    echo "<pre>";print_r($form);echo "</pre>";
 ?>
</BODY>
</HTML>