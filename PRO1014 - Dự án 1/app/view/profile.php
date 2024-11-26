<link rel="stylesheet" href="./public/css/profile.css?v=<?php echo time(); ?>" />
<?php
$user = $data['user'];
?>
<main>
    <h1>Quản lý tài khoản</h1>
    <div class="profile">
        <h2>Thông tin cá nhân</h2>
        <div class="profile-detail">
            <div class="avatar">
                <label for="">Ảnh đại diện</label>
                <a href="index.php?view=logout"><button class="logout">Đăng xuất</button></a><br>
                <img src="./img/avatar.jpg" alt="">
                <input class="file" type="file">
            </div>
            <form method="post" action="index.php?view=editprofile">
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
                <input type="text" name="sdt" value="<?= $user['sdt'] ?>">
                <button type="submit" name="sub">Lưu thay đổi</button>
            </form>
        </div>
    </div>
    <div class="profile">
        <h2>Mật khẩu</h2>
        <form method="post" action="index.php?view=checkpass">
            <div class="profile-detail">
                <input type="hidden" name="email" value="<?= $user['email'] ?>">
                <label for="">Mật khẩu cũ</label> <br>
                <input type="password" id="oldpass" name="oldpass" required value="<?= $user['mat_khau'] ?>"> <br>
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

        </div>
    </div>
</main>