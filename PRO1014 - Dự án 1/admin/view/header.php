<?php
if (isset($_GET['view'])) {
  $view = $_GET['view'];
} else {
  $view = 0;
}

function isActive($currentView, $menuView)
{
  return $currentView === $menuView ? 'active-check' : '';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>

  <link rel="stylesheet" href="../public/css/admin.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" href="../public/css/bootstrap.css" />
  <link rel="stylesheet" href="../public/css/all.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Alumni+Sans:ital,wght@0,100..900;1,100..900&family=Darker+Grotesque:wght@300..900&family=Jura:wght@300..700&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet" />

  <script src="../public/js/all.js"></script>
  <script src="../public/js/bootstrap.bundle.js"></script>
</head>

<body>
  <div class="head">
    <header>
      <div class="sidebar">
        <div class="sidebar-wrapper">
          <div class="logo">
            <a href="" class="simple-text">
              <img src="../img/logo-ngang.png" alt="" />
            </a>
          </div>
          <ul class="nav">
            <li class="<?= isActive($view, 'category') ?>">
              <a href="index.php?view=category">
                <i class="fa-solid fa-list"></i>
                Danh mục
              </a>
            </li>
            <li class="<?= isActive($view, 'product') ?>">
              <a href="index.php?view=product">
                <i class="fa-solid fa-bars"></i>
                Sản phẩm
              </a>
            </li>
            <li class="<?= isActive($view, 'user') ?>">
              <a href="index.php?view=user">
                <i class="fa-solid fa-user"></i>
                Người dùng
              </a>
            </li>
            <li class="<?= isActive($view, 'discount') ?>">
              <a href="index.php?view=discount">
                <i class="fa-solid fa-tag"></i>
                Giảm giá
              </a>
            </li>
            <li class="<?= isActive($view, 'review') ?>">
              <a href="index.php?view=review">
                <i class="fa-solid fa-star"></i>
                Đánh giá
              </a>
            </li>
            <li class="<?= isActive($view, 'blog') ?>">
              <a href="index.php?view=blog">
                <i class="fa-solid fa-magnifying-glass"></i>
                Bài viết
              </a>
            </li>
            <li class="<?= isActive($view, 'order') ?>">
              <a href="index.php?view=order">
                <i class="fa-solid fa-truck"></i>
                Đơn hàng
              </a>
            </li>
            <li class="<?= isActive($view, 'analytics') ?>">
              <a href="index.php?view=analytics">
                <i class="fa-solid fa-bell"></i>
                Thống kê
              </a>
            </li>
          </ul>
        </div>
      </div>
    </header>
    <main>
      <nav>
        <h1>Trang quản trị của The Moon</h1>
        <div>
          <a href="index.php?view=logout">Đăng xuất</a>
          <img src="../img/<?=$_SESSION['user']['avatar'] ?>" alt="" />
        </div>
      </nav>