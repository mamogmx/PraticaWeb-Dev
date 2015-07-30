<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of app
 *
 * @author mamo
 */
class app {
    static function setUserInfo($data){
        $_SESSION["USER"]=$data["user"];
        $_SESSION["GROUPS"]=$data["groups"];
        $_SESSION["PWD"]=$data["pwd"];
    }
    static function setAppInfo($data){
        if(in_array("app",array_keys($data))){
            $_SESSION["APP"][$data["app"]]=$data;
        }
    }
    static function getInfo(){
        
    }
    static function getUserInfo(){
        
    }
    static function getAppInfo($app=""){
        
    }
    static function createMenu(){
        $info = self::getInfo();
    }
    static function createStructure(){
        //return self::loadTemplate("structure");
    }
}
