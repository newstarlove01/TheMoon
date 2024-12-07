<link rel="stylesheet" href="./public/css/profile.css?v=<?php echo time(); ?>" />
<?php
$user = $data['user'];
$order = $data['order'];

?>
<main>
    <h1>Quản lý tài khoản</h1>
    <div class="profile">
        <h2>Thông tin cá nhân</h2>
        <div class="profile-detail">
            <form method="post" action="index.php?view=editprofile" enctype="multipart/form-data">
                <div class="avatar">
                    <label for="">Ảnh đại diện</label>
                    <a href="index.php?view=logout"><button type="button" class="logout">Đăng xuất</button></a><br>
                    <img name="img_old" src="./img/<?= $user['avatar'] ?>" alt="">
                    <input class="file" type="file" name="image" id="image">
                    <input type="hidden" name="image_old" value="<?= $user['avatar'] ?>">
                </div>

                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <input type="hidden" name="password" value="<?= $user['mat_khau'] ?>">
                <div class="name">
                    <div>
                        <label for="">Họ</label> <br>
                        <input type="text" name="firstname" value="<?= $user['ho'] ?>">
                    </div>
                    <div>
                        <label for="">Tên</label> <br>
                        <input type="text" name="lastname" value="<?= $user['ten'] ?>">
                    </div>
                </div>
                <label for="">Email</label> <br>
                <input type="text" name="email" value="<?= $user['email'] ?>"> <br>
                <label for="">Số điện thoại</label> <br>
                <input type="tel" name="sdt" value="<?= $user['sdt'] ?>" pattern="[0-9]{10}">
                <label for="">Địa chỉ</label> <br>
                <input type="text" name="address" value="<?= $user['dia_chi'] ?>">
                <button type="submit" name="sub">Lưu thay đổi</button>
            </form>
        </div>
    </div>
    <div class="profile">
        <h2>Mật khẩu</h2>
        <form method="post" action="index.php?view=changepassprofile">
            <div class="profile-detail">
                <input type="hidden" name="email" value="<?= $user['email'] ?>">
                <label for="">Mật khẩu cũ</label> <br>
                <input type="password" id="oldpass" name="oldpass" required> <br>
                <label for="">Mật khẩu mới</label> <br>
                <input type="password" id="newpass" name="newpass" required> <br>
                <label for="">Nhập lại mật khẩu mới</label> <br>
                <input type="password" id="renewpass" name="renewpass" required>
                <button type="submit" name="sub">Lưu thay đổi</button>
            </div>
        </form>

    </div>
    <div class="profile">
        <h2>Đơn hàng đã mua</h2>
        <div class="profile-detail">
            <?php foreach ($order as $orderKey => $orderItem) { ?>
                <div class="order">
                    <div class="title">
                        <div>
                            <p>Ngày mua: <?= $orderItem['ngay_nhap'] ?></p>
                            <p>Địa chỉ: <?= $orderItem['dia_chi'] ?></p>
                            <p>Phương thức thanh toán: <?= $orderItem['phuong_thuc_tt'] ?></p>
                            <p>Tổng tiền: <?= number_format($orderItem['tong_tien']) ?> VND</p>
                        </div>
                        <form action="index.php?view=deactiveOrder" method="post">
                            <p>Trạng thái:</p>
                            <input type="hidden" name="orderid" value="<?= $orderItem['id'] ?>">
                            <?php
                            if ($orderItem['trang_thai'] == 'Đã huỷ') {
                                echo '<p>Đã huỷ</p>';
                            } elseif ($orderItem['trang_thai'] == 'Chờ xác nhận') {
                                echo '<p>Chờ xác nhận</p>';
                                echo '<button type="submit">Huỷ</button>';
                            } else {
                                echo '<p>Đã xác nhận</p>';
                            }
                            ?>
                        </form>
                    </div>
                    <div class="order-details">
                        <?php foreach ($orderItem['detail'] as $detailKey => $detail) { ?>
                            <div class="order-detail">
                                <div class="image">
                                    <div class="image-contaner">
                                        <img src="./img/<?= $detail['img'][0]['anh_chinh'] ?>" alt="<?= $detail['product']['ten'] ?>">
                                    </div>
                                    <span><?= $detail['so_luong'] ?></span>
                                </div>
                                <div>
                                    <p>Tên sản phẩm: <?= $detail['product']['ten'] ?></p>
                                    <p><?= $detail['size'] ?></p>
                                </div>
                                <p><?= number_format($detail['gia_sp']) ?> VND</p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>