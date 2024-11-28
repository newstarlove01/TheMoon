<link rel="stylesheet" href="./public/css/cart.css?v=<?php echo time(); ?>" />
<main>
    <h1>Giỏ hàng</h1>
    <table>
        <thead>
            <tr>
                <th style="width: 50%; text-align: left;">Sản phẩm</th>
                <th style="width: 15%;">Giá</th>
                <th style="width: 20%;">Số lượng</th>
                <th style="width: 15%;">Tổng</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($_SESSION['cart'])) { ?>
                <?php foreach ($_SESSION['cart'] as $productId => $sizes) { ?>
                    <?php foreach ($sizes as $size => $item) { ?>
                        <tr>
                            <th style="display: flex; align-items: center; gap:20px; text-align: left">
                                <img width="20%" src="img/<?= $item['img'][0]['anh_chinh'] ?>" alt="">
                                <div style="display: flex; flex-direction: column;">
                                    <p><?= $item['ten'] ?></p>
                                    <p><?= $item['sizename'][0]['ten'] ?></p>
                                </div>
                            </th>
                            <th>
                                <p class="p"><?= number_format($item['gia']) ?>đ</p>
                            </th>
                            <th>
                                <div class="soluong">
                                    <div class="quantity">
                                        <a href="index.php?view=decrease&id=<?= $item['id'] ?>&sizeid=<?= $item['size'] ?>"><button type="button" class="minus" aria-label="Decrease">&minus;</button></a>
                                        <input name="quantity" type="number" class="input-box" value="<?= $item['quantity'] ?>" min="1" max="50">
                                        <a href="index.php?view=increase&id=<?= $item['id'] ?>&sizeid=<?= $item['size'] ?>"><button type="button" class="plus" aria-label="Increase">&plus;</button></a>
                                    </div>
                                    <a href="index.php?view=remove&id=<?= $item['id'] ?>&sizeid=<?= $item['size'] ?>">Xóa đi</a>
                                </div>
                            </th>
                            <th>
                                <p class="p"><?= number_format($item['total_price']) ?>đ</p>
                            </th>
                        </tr>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            <tr class="option">
                <th><a href="index.php?view=removeall">Xoá giỏ hàng</a></th>
                <th style="text-align: left;"><a href="index.php">Tiếp tục mua hàng</a></th>
                <th></th>
                <th></th>
            </tr>
        </tbody>
        <tfoot>
            <th style="text-align: left;">Tổng cộng</th>
            <th></th>
            <th></th>
            <th style="text-align: right;"><?= number_format($_SESSION['total_cart']) ?>đ</th>
        </tfoot>
    </table>
    <div class="thanhtoan">
        <p>Đã bao gồm thuế. Phí vận chuyển được tính khi thanh toán.</p>
        <a href="index.php?view=pay"><button>Thanh Toán</button></a>
    </div>
</main>
<script src="./public/js/cart.js?v=<?php echo time(); ?>"></script>