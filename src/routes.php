<?php
// Routes

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

        case "fake":
            $_SESSION['User'] = "MiMi";
            echo "SESSION['User'] = \"MiMi\"";
            break;
    }
});


//首頁
$app->get('/', function ($request, $response, $args) {
    require_once '../lib/helper.php';
    $isLogged = isLogged();
    $user = getUserName();

    // Render index view
    $response = $this->view->render($response, 'view/header.twig', ['isLogged' => $isLogged,'user'=>$user]);
    $response = $this->view->render($response, 'index.twig');
    $response = $this->view->render($response, 'view/footer.twig');

    return $response;
});

//環境介紹
$app->get('/environment', function ($request, $response, $args) {
    // Render index view
    $response = $this->view->render($response, 'view/header.twig');
    $response = $this->view->render($response, 'environment.twig');
    $response = $this->view->render($response, 'view/footer.twig');

    return $response;
});

//產品頁面
$app->get('/product', function ($request, $response, $args) {
    require_once '../lib/mysql.php';
    $db = connect_db();

    //取得商品資料
    $products = array();
    $sql = "SELECT * FROM `products` LIMIT 0,50";
    $result = $db->query($sql);

    if ($result->num_rows <= 0) {
        echo '查無此帳號...<br><a href="login.twig">回上一頁</a>';
        return;
    }
    while ($row = mysqli_fetch_array($result)) {
        $products[] = $row;
    }

    $response = $this->view->render($response, 'view/header.twig');
    $response = $this->view->render($response, 'product.twig', ['products' => $products]);
    $response = $this->view->render($response, 'view/footer.twig');

    return $response;
});

//產品細節
$app->get('/product/{id}', function ($request, $response, $args) {
    require_once '../lib/mysql.php';

    //消毒
    $db = connect_db();
    $args['id'] = mysqli_real_escape_string($db, $args['id']);

    //取得商品資料
    $detail = array();
    $sql = "SELECT * FROM `products` WHERE `product_id` = '" . $args['id'] . "' LIMIT 0,50";
    $result = $db->query($sql);

    while ($row = mysqli_fetch_array($result)) {
        $detail['name_ch'] = $row['name_ch'];
        $detail['name_en'] = $row['name_en'];
        $detail['price'] = $row['price'];
        $detail['image'] = $row['image'];
    }

    $response = $this->view->render($response, 'view/header.twig');
    $response = $this->view->render($response, 'buyme.twig', ['detail' => $detail]);
    $response = $this->view->render($response, 'view/footer.twig');
    return $response;

});


//login(get)
$app->get('/member/login', function ($request, $response, $args) {
    // Render index view
    $response = $this->view->render($response, 'view/header.twig');
    $response = $this->view->render($response, 'member/login.twig');
    $response = $this->view->render($response, 'view/footer.twig');

    return $response;
});

//login(post)
$app->post('/member/login', function ($request, $response, $args) {
    require_once '../lib/mysql.php';
    $db = connect_db();
    $data = $request->getParsedBody();
    $error = "";

    $password = $data['password'];
    $account = $data['account'];
    $sql = "SELECT `account`,`password`,`name` FROM `member` WHERE `account` = '$account' LIMIT 0,1";

    $result = $db-> query($sql);

    if ($result->num_rows<=0){
        $error = '查無此帳號';
    }else{
        while ($row = mysqli_fetch_assoc($result)){

            if ($row['password'] == $password) {
                require_once '../lib/helper.php';
                //比對帳密正確
                setLoginByUserName($row['name']);
                return $response->withStatus(302)->withHeader('Location', '/');
            }else{
                $error = '密碼錯誤';
            }
        }
    }

    $response = $this->view->render($response, 'view/header.twig');
    $response = $this->view->render($response, 'member/login.twig',["error"=>$error]);
    $response = $this->view->render($response, 'view/footer.twig');

    return $response;

});


$app->get('/member/logout', function ($request, $response, $args) {
    require_once '../lib/helper.php';

    logout();
    return $response->withStatus(302)->withHeader('Location', '/');

});