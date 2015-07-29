<?php
require_once "init.php";
require_once "login.php";
$form = (user::isLoggedUser())?(""):(",href:'enter.php'");
?>
<HTML>
<HEAD>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <?php
        utils::loadJS();
        utils::loadCss();
    ?> 
    <STYLE>
        div.region{
            border-collapse:collapse;
            border: 1px solid black;
        }
    </STYLE>
</HEAD>
<BODY>
    <div id="myApp" class="easyui-layout" style="margin: 1%;width:98%;height:96%;">
        <!--<div id="west" data-options="region:'west'" style="width:20%;height:80%;border-collapse:collapse;border: 1px solid black;"></div>-->
        <div class="region" id="north" data-options="region:'north'" style="width:100%;height:10%;">
            
        </div>
        <div class="region" id="south" data-options="region:'south'" style="width:100%;height:10%;"></div>
        <div class="region" id="center" data-options="region:'center'<?php echo $form;?>" style="width:100%;height:80%;">
            
        </div>
    </div>
</BODY>
</HTML>