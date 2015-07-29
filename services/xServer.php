<?php
require_once "../init.php";
$result=Array();
$action=$_REQUEST["action"];
switch($action){
    case "login":
        $user = $_POST["user"];
        $pwd = $_POST["pwd"];
        $result = user::validate($user, $pwd);
        break;
    default:
        break;
}
header('Content-Type: application/json; charset=utf-8');
print json_encode($result);
return;
?>