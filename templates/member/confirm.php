<?php
include '../common/common.php';
include '../view/header.php';

?>
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
                        <tr>
                            <td>
                                <div class="buyitem"><img src="../assets/images/product/b1.jpeg" alt=""></div>
                                <div class="buytxt">愛魅玫瑰活機淡香氛</div>
                            </td>
                            <td>NT$ 1,000

                            </td>
                            <td>1</td>
                            <td>NT$ 1,000</td>
                            <td><i class="fa fa-trash-o" aria-hidden="true"></i></td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
</div>
<div class="mempage">
    <div class="container">
        <div class="col-xs-12 col-sm-12">
            <div class="text-lg">
                <div class="textmid textcenter">

                    <h2>收件人資訊</h2>
                    <div class="room"></div>
                    <form id="myForm" action="index.php">
                        <table class="addmem">
                            <tr>
                                <th class="titleColor">姓名 <span class="xstext"><br>(最少不能低於6)</span></th>
                                <td><input type="text" name="memId" id="memId" maxlength="10" size="12"></td>
                            </tr>

                            <tr>
                                <th class="titleColor">電話 <span class="xstext"><br>(密碼請含數字、英文)</span></th>
                                <td><input type="password" name="memPsw" id="memPsw" maxlength="10" size="12"></td>
                            </tr>
                            <tr>
                                <th class="titleColor">地址</th>
                                <td><input type="text" name="memName" id="memName" maxlength="20" size="12"></td>
                            </tr>
                            <tr>
                                <th class="titleColor">匯款後五碼</th>
                                <td><input type="text" name="memName" id="memName" maxlength="5" size="12"></td>
                            </tr>
                            <tr>
                                <th class="titleColor">時間</th>
                                <td><input type="radio" name="sex" value="0">上午9am~12am
                                    <input type="radio" name="sex" value="1">下午12am~6pm
                                    <input type="radio" name="sex" value="2">傍晚6pm~9pm

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <a class="mainBtn" href="confirm.php">確認</a>

                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php include '../view/footer.php'; ?>
