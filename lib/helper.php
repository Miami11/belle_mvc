<?php

function isLogged(){
    if (isset($_SESSION['User'])) {
        return true;
    }else{
        return false;
    }
}

function getUserName(){
    if (isset($_SESSION['User'])) {
        return $_SESSION['User'];
    }else{
        return "";
    }
}

function setLoginByUserName($name = ""){
    if($name == "") {
        return;
    }else{
        $_SESSION['User'] = $name;
    }
}

function logout(){
    session_destroy();

}
