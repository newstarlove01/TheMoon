<?php
$user = $data['user'];
if (isset($_SESSION['total_cart'])) {
    $total = $_SESSION['total_cart'];
} else {
    $total = 0;
}
if (isset($_SESSION['discount'])) {
    $discount = $_SESSION['discount']['sotien'];
    $discount_name = $_SESSION['discount']['ten'];
} else {
    $discount = 0;
    $discount_name = '';
}
if (is_array($_SESSION['total_pay']) && !empty($_SESSION['total_pay'])) {
    $total_pay = $_SESSION['total_pay'];
} else {
    $total_pay = $total;
}
?>

<link rel="stylesheet" href="./public/css/payment.css?v=<?php echo time(); ?>" />
<main>
    <form action="index.php?view=addpayment" method="post">
        <div class="form">
            <input type="hidden" name="userid" value="<?= $user['id'] ?>">
            <label for="">Liên hệ</label> <br>
            <input type="text" placeholder="Email hoặc số điện thoại" value="<?= $user['email'] ?>"> <br>
            <label for="">Giao hàng</label> <br>
            <select name="city" id="city" required>
                <option value="">Thành phố:</option>
                <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                <option value="Hà Nội">Hà Nội</option>
            </select> <br>
            <div class="name">
                <input type="text" placeholder="Họ" value="<?= $user['ho'] ?>" required>
                <input type="text" placeholder="Tên" value="<?= $user['ten'] ?>" required>
            </div>
            <input type="text" placeholder="Số điện thoại" value="<?= $user['sdt'] ?>" required> <br>
            <input type="text" name="address" placeholder="Địa chỉ" value="<?= $user['dia_chi'] ?>" required> <br>
            <label for="">Phương thức vận chuyển</label> <br>
            <select name="ship" id="ship">
                <option value="Tiêu chuẩn" selected>Tiêu chuẩn</option>
                <option value="Nhanh">Nhanh</option>
            </select> <br>
            <label for="">Thanh toán</label> <br>
            <div class="payment">
                <input type="radio" class="btn-check" name="payment" id="option1" autocomplete="off" value="Zalopay">
                <label class="btn btn-secondary" for="option1">Thanh toán online qua cổng ZaloPay</label>
                <input type="radio" class="btn-check" name="payment" id="option2" autocomplete="off" value="COD">
                <label class="btn btn-secondary" for="option2">Thanh toán khi nhận hàng (COD)</label>
                <input type="radio" class="btn-check" name="payment" id="option3" autocomplete="off" value="Bank">
                <label class="btn btn-secondary" for="option3">Thanh toán bằng tài khoản ngân hàng</label>
            </div>
            <button type="submit" name="sub">Hoàn tất đơn hàng</button>
        </div>
    </form>
    <div>
        <div class="cart">
            <?php if (isset($_SESSION['cart'])) { ?>
                <?php foreach ($_SESSION['cart'] as $productId => $sizes) { ?>
                    <?php foreach ($sizes as $size => $item) { ?>
                        <div class="cart-item">
                            <div class="image">
                                <div class="image-container"> <img src="./img/<?php echo $item['img'][0]['anh_chinh'] ?>"></div>
                                <span><?= $item['quantity'] ?></span>
                            </div>
                            <div class="product">
                                <h5><?= $item['ten'] ?></h5>
                                <p><?= $item['sizename'][0]['ten'] ?></p>
                            </div>
                            <p style="text-align: right;"><?= number_format($item['total_price']) ?>đ</p>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            <!-- <div class="cart-item">
                <div class="image">
                    <img src="./img/ChainBlackHeliosStainlessSteel.webp" alt="">
                    <span>1</span>
                </div>
                <div class="product">
                    <h5>Nhẫn Bạc S925 Black Sun Helios Silver Original</h5>
                    <p>Size 7</p>
                </div>
                <p>845.000đ</p>
            </div> -->
        </div>
        <form action="index.php?view=discount" method="post">
            <div class="discount">
                <input type="text" name="discount" placeholder="Nhập mã giảm giá" value="<?= $discount_name ?>">
                <button type="submit" name="sub">Áp dụng</button>
            </div>
        </form>
        <div class="total">
            <div class="total-item">
                <p>Tổng sản phẩm</p>
                <p><?= number_format($total) ?>đ</p>
            </div>
            <div class="total-item">
                <p>Vận chuyển</p>
                <p>Miễn phí</p>
            </div>
            <div class="total-item">
                <p>Giảm giá</p>
                <p>-<?= number_format($discount) ?>đ</p>
            </div>
            <div class="total-item">
                <h6>Tổng cộng</h6>
                <h6><?= number_format($total_pay) ?>đ</h6>
            </div>
        </div>
    </div>
</main>