<link rel="stylesheet" href="./public/css/register.css?v=<?php echo time(); ?>" />
<div class="dang-ki">
    <h1>Đăng Kí</h1>
    <form action="index.php?view=adduser" method="POST">
        <div class="dangki">
            <input type="text" id="firstname" name="firstname" required placeholder="Họ">
        </div>
        <div class="dangki">
            <input type="text" id="lastname" name="lastname" required placeholder="Tên">
        </div>
        <div class="dangki">
            <input type="email" id="email" name="email" required placeholder="Email">
        </div>
        <div class="dangki">
            <input type="password" id="password" name="password" required placeholder="Mật khẩu">
        </div>
        <div class="dangki">
            <input type="password" id="repassword" name="repassword" required placeholder="Nhập lại mật khẩu">
        </div>
        <button onclick="check()" type="submit" class="login" name="sub">ĐĂNG KÍ</button>
        <p>Bạn đã có tài khoản? <a href="index.php?view=login">Đăng nhập ngay</a></p>
        <p><a href="index.php">Quay lại cửa hàng </a></p>
    </form>
</div>