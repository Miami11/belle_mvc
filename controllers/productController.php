<?php

class productController
{
    private $request;
    private $response;
    private $args;
    private $data;

    function __construct($data){
        //initializing value
        $this->data = $data;
        $this->request = $data->request;
        $this->response = $data->response;
        $this->args = $this->args;
    }

    function run()
    {
        $db = getDB();
        $result = $db->select("products", "*");
        foreach ($result as $row)
        {
            $products[] = $row;
        }

//        $db = connect_db();

        //取得商品資料
//        $products = array();
//        $sql = "SELECT * FROM `products` LIMIT 0,50";
//        $result = $db->query($sql);

//        if ($result->num_rows <= 0) {
//            echo '查無此帳號...<br><a href="login.twig">回上一頁</a>';
//            return;
//        }
//        while ($row = mysqli_fetch_array($result)) {
//            $products[] = $row;
//        }

        $this->response = $this->data->view->render($this->response, 'view/header.twig');
        $this->response = $this->data->view->render($this->response, 'product.twig', ['products' => $products]);
        $this->response = $this->data->view->render($this->response, 'view/footer.twig');

        return $this->response;
    }
}