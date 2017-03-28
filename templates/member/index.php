<?php
include '../common/common.php';
include '../common/login_checker.php';
include '../view/header.php';

$info = json_decode($_SESSION['cart']);

$list = array();

foreach ($info->cart as $item) {

    $sql = "SELECT * FROM `products` WHERE `product_id` = '$item->product_id' LIMIT 0,50";
    $result = $con->query($sql);

    while ($row = mysqli_fetch_array($result)) {
        $list[] = [
            "product_id" => $row['product_id'],
            "name_ch" => $row['name_ch'],
            "price" => $row['price'],
            "image" => $row['image'],
            "count" => $item->count,

        ];
    }
}


?>
<!--====member====-->

<div class="mempage">
    <div class="container">
        <div class="col-xs-12 col-sm-12">
            <div class="text-lg">
                <div class="textmid textcenter">

                    <p>歡迎來到 <?= $_SESSION['name'] ?> 會員頁面</p>
                    <div class="room"></div>
                    <table class="buyframe">
                        <tr>
                            <th>商品名稱</th>
                            <th>單價</th>
                            <th>數量</th>
                            <th>小計</th>
                            <th>刪除</th>
                        </tr>

                        <?php foreach ($list as $item): ?>
                            <tr>
                                <td>
                                    <div class="buyitem"><img src="../assets/images/product/<?php echo $item['image'] ?>.jpeg" alt=""></div>
                                    <div class="buytxt"><?php echo $item['name_ch']; ?></div>
                                </td>
                                <td><?php echo $item['price']; ?>

                                </td>
                                <td><?php echo $item['count']; ?></td>
                                <td>NT$ <?php echo $item['count']*$item['price']; ?></td>
                                <td><i class="fa fa-trash-o" aria-hidden="true"></i></td>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                    <a class="mainBtn" href="confirm.php">確認</a>

                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
</div>


<!--====buy====-->

<?php include '../view/footer.php'; ?>
