<?php

//load controller
function controller($name,$data) {
    require_once "../controllers/".$name.'Controller'.'.php';
    $classname = $name."Controller";
    return new $classname($data);
}