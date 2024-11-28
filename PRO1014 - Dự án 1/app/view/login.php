<link rel="stylesheet" href="./public/css/register.css?v=<?php echo time(); ?>" />
<div class="dang-ki">
    <h1>Đăng Nhập</h1>
    <form action="index.php?view=checkuser" method="POST">
        <div class="dangki">
            <input type="email" id="email" name="email" required placeholder="Email">
        </div>
        <div class="dangki">
            <input type="password" id="password" name="password" required placeholder="Mật khẩu">
        </div>
        <p><a href="index.php?view=password">Quên mật khẩu</a></p>
        <button onclick="check()" type="submit" class="login" name="sub">ĐĂNG NHẬP</button>
        <p>Bạn đã có tài khoản? <a href="index.php?view=register">Đăng kí ngay</a></p>
        <p><a href="index.php">Quay lại cửa hàng </a></p>
    </form>
</div>