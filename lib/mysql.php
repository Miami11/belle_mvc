<?php
//function connect_db() {
//    $server = 'localhost'; // this may be an ip address instead
//    $user = 'root';
//    $pass = 'fzwV9d4G';
//    $database = 'belle';
//    $connection = new mysqli($server, $user, $pass, $database);
//
//    return $connection;
//}

use Medoo\Medoo;

// Initialize
function getDB()
{
    return new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'belle',
        'server' => 'localhost',
        'username' => 'root',
        'password' => 'fzwV9d4G',
        'charset' => 'utf8'
    ]);
}
