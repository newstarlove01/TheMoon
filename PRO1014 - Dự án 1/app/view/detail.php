<link rel="stylesheet" href="./public/css/detail.css?v=<?php echo time(); ?>" />
<?php
$product = $data['spct'];
$cate = $data['dm'];
$mo_ta = preg_replace('/([.!?])\s/', '$1<br><br>', $product['mo_ta']);
?>
<main>
  <div id="title">
    <!-- prettier-ignore -->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?view=home">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php?view=product&idcate=<?= $product['id_dm'] ?>"><?= $cate['ten'] ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $product['ten'] ?></li>
      </ol>
    </nav>
  </div>
  <div id="product-detail">
    <div class="slide-album">
      <img class="slide-items" src="./img/<?= $product['img'][0]['anh_chinh'] ?>" />
      <img class="slide-items" src="./img/<?= $product['img'][0]['album1'] ?>" />
      <img class="slide-items" src="./img/<?= $product['img'][0]['album2'] ?>" />
      <img class="slide-items" src="./img/<?= $product['img'][0]['album3'] ?>" />
      <div class="thumbnail">
        <img
          class="album-item"
          src="./img/<?= $product['img'][0]['anh_chinh'] ?>"
          onclick="pauseAndShow(1)" />
        <img
          class="album-item"
          src="./img/<?= $product['img'][0]['album1'] ?>"
          onclick="pauseAndShow(2)" />
        <img
          class="album-item"
          src="./img/<?= $product['img'][0]['album2'] ?>"
          onclick="pauseAndShow(3)" />
        <img
          class="album-item"
          src="./img/<?= $product['img'][0]['album3'] ?>"
          onclick="pauseAndShow(4)" />
      </div>
    </div>
    <div class="product-detail">
      <h1><?= $product['ten'] ?></h1>
      <h2><?= number_format($product['gia']) ?> VNĐ</h2>
      <!-- prettier-ignore -->
      <div class="size-title">
        <p>Cỡ</p>
        <a style="color: white; text-decoration: none;" href="#">Hướng dẫn đo size</a>
      </div>
      <!-- prettier-ignore -->
      <div class="btn-group size-group" role="group" aria-label="Basic radio toggle button group">
        <?php
        $listsize = $data['size'];
        $count = count($listsize);
        for ($i = 0; $i < $count; $i++) {
          echo '
          <input type="radio" class="btn-check" name="btnradio" id="btnradio' . ($i + 1) . '" autocomplete="off">
          <label class="btn size-items-effect" for="btnradio' . ($i + 1) . '">' . $listsize[$i]['ten'] . '</label>';
        };
        ?>
      </div>
      <!-- prettier-ignore -->
      <div style="display: grid; grid-template-columns: 1fr 2fr; margin-top: 20px; gap: 20px;">
        <div class="quantity">
          <button class="minus" aria-label="Decrease">&minus;</button>
          <input type="number" class="input-box" value="1" min="1" max="10">
          <button class="plus" aria-label="Increase">&plus;</button>
        </div>
        <button class="cart-add">THÊM VÀO GIỎ HÀNG</button>
      </div>
      <button class="buy-now">MUA NGAY</button>
      <p class="info">
        Nếu sản phẩm anh/chị quan tâm hiển thị hết hàng trên website. <br />
        Vui lòng INBOX trực tiếp với The Moon để được hỗ trợ nhanh nhất.
        <br />
        Xin chân thành cảm ơn!
      </p>
    </div>
  </div>
  <div id="mo-ta">
    <h3>Mô tả</h3>
    <p>
      <?= $mo_ta ?>
    </p>
  </div>
  <div id="danh-gia">
    <h3>Đánh giá</h3>
    <h4>
      Đánh giá của khách hàng (144) <br />
      4.8/5
      <strong style="color: #fab320"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></strong>
    </h4>
    <div class="khach-hang">
      <div class="avatar">
        <img src="./img/avatar.jpg" alt="" />
        <h5>
          n**h <br />
          <strong style="color: #fab320"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></strong>
        </h5>
      </div>
      <p>
        Mặt hàng: Đen, size 1 <br /><br />
        omg phải gọi là tuyệt cả là vời, bth ít đánh giá sau khi mua hàng
        nma hnay phải vào đây để fb vì nhẫn quá đẹp đi
      </p>
      <div class="file">
        <img src="./img/FUSHIRINGHeliosSilver.webp" alt="" />
        <img src="./img/FUSHIRINGHeliosSilver.webp" alt="" />
      </div>
    </div>
    <div class="khach-hang">
      <div class="avatar">
        <img src="./img/avatar.jpg" alt="" />
        <h5>
          n**h <br />
          <strong style="color: #fab320"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></strong>
        </h5>
      </div>
      <p>
        Mặt hàng: Đen, size 1 <br /><br />
        omg phải gọi là tuyệt cả là vời, bth ít đánh giá sau khi mua hàng
        nma hnay phải vào đây để fb vì nhẫn quá đẹp đi
      </p>
      <div class="file">
        <img src="./img/FUSHIRINGHeliosSilver.webp" alt="" />
        <img src="./img/FUSHIRINGHeliosSilver.webp" alt="" />
      </div>
    </div>
    <div class="khach-hang">
      <div class="avatar">
        <img src="./img/avatar.jpg" alt="" />
        <h5>
          n**h <br />
          <strong style="color: #fab320"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></strong>
        </h5>
      </div>
      <p>
        Mặt hàng: Đen, size 1 <br /><br />
        omg phải gọi là tuyệt cả là vời, bth ít đánh giá sau khi mua hàng
        nma hnay phải vào đây để fb vì nhẫn quá đẹp đi
      </p>
      <div class="file">
        <img src="./img/FUSHIRINGHeliosSilver.webp" alt="" />
        <img src="./img/FUSHIRINGHeliosSilver.webp" alt="" />
      </div>
    </div>
    <div id="page">
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link active-check" href="#">1</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <hr />
  <div id="recommend">
    <h1>Có thể bạn sẽ thích</h1>
    <div class="recommend">
      <?php
      $listpro = $data['dssplq'];
      foreach ($listpro as $item) {
      ?>
        <a href="#" class="recommend-items">
          <img src="./img/<?= $item['img'][0]['anh_chinh'] ?>" alt="" />
          <h2><?= $item['ten'] ?></h2>
          <p><?= number_format($item['gia']) ?>đ</p>
          <button>Thêm vào giỏ hàng</button>
        </a>
      <?php }; ?>
    </div>
  </div>
</main>