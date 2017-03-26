<?php
function connect_db() {
    $server = 'localhost'; // this may be an ip address instead
    $user = 'root';
    $pass = 'fzwV9d4G';
    $database = 'belle';
    $connection = new mysqli($server, $user, $pass, $database);

    return $connection;
}