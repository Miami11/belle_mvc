<?php
// Routes

//首頁
$app->get('/', function ($request, $response, $args) {
    // Render index view
    $response = $this->view->render($response, 'view/header.twig');
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
        echo '查無此帳號...<br><a href="login.php">回上一頁</a>';
        return;
    }
    while ($row = mysqli_fetch_array($result)) {
        $products[] = $row;
    }

    $response = $this->view->render($response, 'view/header.twig');
    $response = $this->view->render($response, 'product.twig',['products'=>$products]);
    $response = $this->view->render($response, 'view/footer.twig');

    return $response;
});

//產品細節
$app->get('/product/{id}', function ($request, $response, $args) {
    require_once '../lib/mysql.php';

//消毒

    $db = connect_db();

    $args['id'] = mysqli_real_escape_string($db,$args['id']);

//取得商品資料
    $detail = array();
    $sql = "SELECT * FROM `products` WHERE `product_id` = '".$args['id']."' LIMIT 0,50";
    $result = $db->query($sql);

    while ($row = mysqli_fetch_array($result)) {
        $detail['name_ch'] = $row['name_ch'];
        $detail['name_en'] = $row['name_en'];
        $detail['price'] = $row['price'];
        $detail['image'] = $row['image'];
    }

    $response = $this->view->render($response, 'view/header.twig');
    $response = $this->view->render($response, 'buyme.twig',['detail'=>$detail]);
    $response = $this->view->render($response, 'view/footer.twig');
    return $response;

});

