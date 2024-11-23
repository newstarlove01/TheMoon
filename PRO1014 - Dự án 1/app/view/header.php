<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang chủ</title>

    <link rel="stylesheet" href="./public/css/style.css?v=<?php echo time(); ?>   " />
    <link rel="stylesheet" href="./public/css/index.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="./public/css/product.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="./public/css/detail.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="./public/css/cart.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/pay.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/bootstrap.css" />
    <link rel="stylesheet" href="./public/css/all.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Alumni+Sans:ital,wght@0,100..900;1,100..900&family=Darker+Grotesque:wght@300..900&family=Jura:wght@300..700&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
      rel="stylesheet"
    />
  </head>
  <body id="body">
    <header>
      <div class="logo-nav">
        <a href="index.php?view=home"><img id="logo" src="./img/logo-ngang.png" alt="" /> </a>
        <div class="icons-area">
          <form action="">
            <input
              onmouseleave="closeSearch()"
              id="search"
              type="text"
              placeholder="Tìm kiếm..."
            />
          </form>
          <a onmouseover="openSearch()" href="#" class="search"
            ><i class="fa-solid fa-magnifying-glass icon"></i
          ></a>
          <a href="#"><i class="fa-solid fa-user icon"></i></a>
          <a href="index.php?view=cart"><i class="fa-solid fa-cart-shopping icon"></i></a>
        </div>
      </div>
      <nav class="navbar navbar-expand-lg bg-body-tertiary thanh-nav">
        <div class="container-fluid">
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <!-- <span class="navbar-toggler-icon menu-icon"></span> -->
            <i class="fa-solid fa-bars navbar-toggler-icon menu-icon"></i>
          </button>
          <div class="collapse navbar-collapse categories" id="navbarNav">
            <ul class="navbar-nav">
            <?php
            $listcate = $data['dsdm'];
            foreach ($listcate as $item) {
                extract($item);
                echo '<li class="nav-item">
                <a class="nav-link" href="index.php?view=product&id='.$id.'">'.$ten.'</a>
              </li>';
            };
            ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>