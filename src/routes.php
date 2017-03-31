<?php
// Routes
require_once '../lib/mysql.php';
require_once '../lib/helper.php';

//develop Tools only for localhost domain allow
$app->get('/test/{action}', function ($request, $response, $args) {

    if($_SERVER['REMOTE_ADDR'] != "127.0.0.1" && $_SERVER['REMOTE_ADDR'] != "::1"){
        return;
    }

    switch ($args['action']) {
        case "killer":
            session_destroy();
            echo "session_destroy";
            break;
    }
});

//首頁
$app->get('/', function ($request, $response, $args) {
    return controller('home',$this)->run();
});
