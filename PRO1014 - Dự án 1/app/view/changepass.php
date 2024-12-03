<link rel="stylesheet" href="./public/css/register.css?v=<?php echo time(); ?>" />
<div class="dang-ki">
    <h1>Quên mật khẩu</h1>
    <form action="index.php?view=checkpass" method="POST">
    <div class="dangki">
            <input type="number" id="resetcode" name="resetcode" required placeholder="Mã khôi phục">
        </div>
        <div class="dangki">
            <input type="password" id="newpass" name="newpass" required placeholder="Mật khẩu mới">
        </div>
        <div class="dangki">
            <input type="password" id="renewpass" name="renewpass" required placeholder="Nhập lại mật khẩu mới">
        </div>
        <button type="submit" class="login" name="sub">TIẾP THEO</button>
        <p>Bạn đã có tài khoản? <a href="index.php?view=login">Đăng nhập ngay</a></p>
        <p><a href="index.php">Quay lại cửa hàng </a></p>
    </form>
</div>