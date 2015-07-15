<?php
require_once "lib/utils.class.php"
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
    <div id="myLayout" class="easyui-layout" style="margin: 1%;width:98%;height:96%; ">
        <div data-options="region:'west'"></div>
        <div data-options="region:'north'" ></div>
        <div data-options="region:'south'"></div>
        <div data-options="region:'center',title:'Main Title'">
            
        </div>
    </div>
</BODY>
</HTML>