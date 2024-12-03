<link rel="stylesheet" href="./public/css/register.css?v=<?php echo time(); ?>" />
<div class="dang-ki">
    <h1>Đăng Kí</h1>
    <form action="index.php?view=adduser" method="POST">
        <div class="dangki">
            <input type="text" id="firstname" name="firstname" required placeholder="Họ" value="<?php echo isset($_SESSION['old_data']['firstname']) ? $_SESSION['old_data']['firstname'] : ''; ?>">
        </div>
        <div class="dangki">
            <input type="text" id="lastname" name="lastname" required placeholder="Tên" value="<?php echo isset($_SESSION['old_data']['lastname']) ? $_SESSION['old_data']['lastname'] : ''; ?>">
        </div>
        <div class="dangki">
            <input type="email" id="email" name="email" required placeholder="Email" value="<?php echo isset($_SESSION['old_data']['email']) ? $_SESSION['old_data']['email'] : ''; ?>">
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