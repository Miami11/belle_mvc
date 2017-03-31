<?php

use Medoo\Medoo;

// Initialize
function getDB()
{
    $locallist = array(
        '127.0.0.1',
        '::1'
    );

    if (!in_array($_SERVER['REMOTE_ADDR'], $locallist)) {
        //setting production db connect
    } else {
        return new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'belle',
            'server' => 'localhost',
            'username' => 'root',
            'password' => 'root',
            'socket' => '/Applications/MAMP/tmp/mysql/mysql.sock',
            'charset' => 'utf8'
        ]);
    }

}
