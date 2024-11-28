<link rel="stylesheet" href="./public/css/register.css?v=<?php echo time(); ?>" />
<div class="dang-ki">
    <h1>Quên Mật Khẩu</h1>
    <form action="index.php?view=checkmail" method="POST">
        <div class="dangki">
            <input type="email" id="email" name="email" required placeholder="Email">
        </div>
        <button type="submit" class="login" name="sub">TIẾP THEO</button>
        <p>Bạn đã có tài khoản? <a href="index.php?view=login">Đăng nhập ngay</a></p>
        <p><a href="index.php">Quay lại cửa hàng </a></p>
    </form>
</div>