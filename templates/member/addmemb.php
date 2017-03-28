<?php
include '../common/common.php';
//include '../common/login_checker.php';


include '../view/header.php';

?>
    <!--====member====-->

    <div class="login-background">
        <div class="logincolor container">
            <div class="col-xs-12 col-sm-12">
                <div class="text-lg">
                    <div class="textmid textcenter">

                        <h2>申請加入會員</h2>
                        <div class="room"></div>
                        <form id="myForm" action="index.php">
                            <table class="addmem">
                                <tr>
                                    <th class="titleColor">帳號 <span class="xstext"><br>(最少不能低於6)</span></th>
                                    <td><input type="text" name="memId" id="memId" maxlength="10" size="12"></td>
                                </tr>

                                <tr>
                                    <th class="titleColor">密碼 <span class="xstext"><br>(密碼請含數字、英文)</span></th>
                                    <td><input type="password" name="memPsw" id="memPsw" maxlength="10" size="12"></td>
                                </tr>
                                <tr>
                                    <th class="titleColor">暱稱</th>
                                    <td><input type="text" name="memName" id="memName" maxlength="10" size="12"></td>
                                </tr>
                                <tr>
                                    <th class="titleColor">性別</th>
                                    <td><input type="radio" name="sex" value="1">男
                                        <input type="radio" name="sex" value="0">女
                                    </td>
                                </tr>
                                <tr>
                                    <th class="titleColor">消息來源</th>
                                    <td>
                                        <select name="news" id="news">
                                            <option value="">請選擇</option>
                                            <option value="n1">DM 傳單</option>
                                            <option value="n2">報章雜誌</option>
                                            <option value="n3">親友介紹</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                        <input type="submit" id="btn" value="確定加入">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
    </div>
    <script>
        function $id(id){
            return document.getElementById(id);
        }
        function check(e){
            var memId = $id("memId").value;
            if(memId.length < 6){
                alert('帳號請輸入6碼');
                $id("memId").focus();
                e.preventDefault();
                return;
            }
            var memPsw = $id("memPsw").value;
            if(memPsw.length < 6){
                alert('密碼請輸入6碼');
                $id("memPsw").select();
                e.preventDefault();
                return;
            }

            var numin = false, abcin = false, temp;
            for (var i=0; i<memPsw.length; i++){
                temp = memPsw.charAt(i).toUpperCase();
                if(temp>='0' && temp <= '9'){
                    numin = true;
                }else if ( temp>= "A" && temp <= "Z"){
                    abcin = true;
                }
            }
            if (numin == false || numin == false){
                alert("密碼需包含數字和英文");
                $id("memPsw").select();
                return;
            }
            var sexul = document.getElementsByName("sex");
            if(sexul[0].checked == false && sexul[1].checked == false){
                alert("請填性別");
                e.preventDefault();
                return;
            }
            var news = $id("news");
            if (news.selectedIndex == 0){
                alert("請填消息來源");
                $id("news").focus();
                e.preventDefault();

            }

        }
        window.onload = function init(){
            document.getElementById("myForm").addEventListener("submit",check,false);
        }
    </script>

<?php include '../view/footer.php'; ?>