<!--Bug: 訂單送出 信用卡卻沒有跳轉到信用卡頁面！！！-->
<!doctype html>
<html lang="en">
<head>
    <title>Cart checkout</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require_once("./public/css.php") ?>
    <style>

    </style>

</head>
<body>
<div class="container-fluid">
    <div class="row wrap d-flex">
        <?php require_once("./public/header.php") ?>
        <!--menu-->
        <aside class="col-lg-2 navbar-side shadow-sm">
            <?php require_once("./public/nav.php") ?>
        </aside>
        <!--/menu-->
        <article class="article col-lg-9 shadow-sm table-responsive content-group">
            <div class="table-wrap">
                <form action="./method/doInsertOrder.php" method="post" class="m-3">
                    <div class="row d-flex justify-content-center">
                        <!--會員編號隱藏-->
                        <input id="" type="hidden" name="member_id" class="form-control" value="" readonly>
                        <div class="col-md-10 mb-4">
                            <label class="mb-2" for="">會員姓名</label>
                            <input id="" type="text" name="member_id" class="form-control" value="" readonly>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="mb-2" for="receiver">收件人姓名</label>
                            <input id="receiver" type="text" name="receiver" class="form-control" value="" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="mb-2" for="receiver_phone">收件人電話</label>
                            <input id="receiver_phone" type="number" name="receiver_phone" class="form-control" value="" required>
                        </div>
                        <!--依送貨方式，對應顯現收件人地址or超商門市-->
                        <div class="col-md-4 mb-4">
                            <div class="mb-2">送貨方式</div>
                            <select class="form-select" aria-label="delivery select" name="delivery" id="delivery_select">
                                <option value="#delivery1">宅配到府</option>
                                <option value="#delivery2">超商取貨</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-4" id="delivery1">
                            <label class="mb-2" for="address">收件人地址</label>
                            <input id="address" type="text" name="address" class="form-control" value="" required>
                        </div>
                        <div class="col-md-6 mb-4" id="delivery2">
                            <div class="mb-2">超商門市</div>
                            <select class="form-select" aria-label="convenient_store select" name="convenient_store">
                                <option value="一零一門市">一零一門市</option>
                                <option value="中興門市">中興門市</option>
                                <option value="世貿門市">世貿門市</option>
                                <option value="湯圍門市">湯圍門市</option>
                                <option value="上美崙門市">上美崙門市</option>
                                <option value="東大門市">東大門市</option>
                            </select>
                        </div>
                        <div class="col-md-10 mb-4">
                            <div class="mb-2">付款方式</div>
                            <select class="form-select" aria-label="payment select" name="payment">
                                <option value="信用卡">信用卡</option>
                                <option value="貨到付款">貨到付款</option>
                            </select>
                        </div>
                        <div class="col-md-10 d-flex justify-content-center">
                            <button id="bt" class="btn btn-primary" type="submit">送出訂單</button>
                        </div>
                    </div>


                </form>
            </div>
        </article>
    </div>
</div>


<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script>
    // 依送貨方式，對應顯現收件人地址or超商門市
    $('div[id="delivery2"]').hide();

    $('#delivery_select').change(function(){
        let deliveryValue=$(this).val();
        $('div[id^="delivery"]').hide();
        $(deliveryValue).show();
    });

    // 排除商店送不出的bug後，要來確認調整此
    <?php if (isset($_POST["receiver"]) && isset($_POST["receiver_phone"]) && isset($_POST["address"])) : ?>
    window.onload=function(){
        var obt=document.getElementById("bt");
        obt.onclick=function(){
            alert("訂單已送出!");
        }
    }
    <?php else:?>
    <?php endif; ?>
</script>
</body>
</html>