<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author mamo
 */
class user {
    
    static function isLoggedUser(){
        if ($_SESSION["USER"] && $_SESSION["GROUPS"]) return TRUE;
        return FALSE;
    }
    static function validate($user,$pwd){
        $sql="SELECT * FROM admin.users WHERE name = ? AND pwd = ? AND enabled = 1;";
        $conn = utils::getDb(Array("user"=>DB_VALIDATE_USER,"pwd"=>DB_VALIDATE_PWD));
        if (!$conn) return Array("error"=>"No connection");
        $stmt = $conn->prepare($sql);
        if(!$stmt->execute(Array($user,md5($pwd)))){
            $res["error"] = $stmt->errorInfo();
            $res["SQL"] = $sql;
            return $res;
        }
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($res){
            $data["pwd"]=md5($pwd);
            $data["user"]=$user;
            $data["groups"]=utils::getArray($res["groups"]);
            app::setUserInfo($data);
        }
        return $res;
        
    }
}
