<link rel="stylesheet" href="./public/css/detail.css?v=<?php echo time(); ?>" />
<?php
$product = $data['spct'];
$cate = $data['dm'];
$review = $data['review'];
$mo_ta = preg_replace('/([.!?])\s/', '$1<br><br>', $product['mo_ta']);
?>
<main>
  <div id="title">
    <!-- prettier-ignore -->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
      <form method="post" action="index.php?view=addcart">
        <input name="id" type="hidden" value="<?= $product['id'] ?>">
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
          ?>
            <input type="radio" class="btn-check" name="size" id="btnradio<?= $i + 1 ?>" autocomplete="off" value="<?= $listsize[$i]['id'] ?>">
            <label class="btn size-items-effect" for="btnradio<?= $i + 1 ?>"><?= $listsize[$i]['ten'] ?></label>
          <?php }; ?>
        </div>
        <!-- prettier-ignore -->
        <div style="display: grid; grid-template-columns: 1fr 2fr; margin-top: 20px; gap: 20px;">
          <div class="quantity">
            <button type="button" class="minus" aria-label="Decrease">&minus;</button>
            <input name="quantity" type="number" class="input-box" value="1" min="1" max="50">
            <button type="button" class="plus" aria-label="Increase">&plus;</button>
          </div>
          <button name="cart" type="submit" class="cart-add">THÊM VÀO GIỎ HÀNG</button>
        </div>
        <button type="button" class="buy-now">MUA NGAY</button>
      </form>
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
    <form action="index.php?view=addreview" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
      <input type="hidden" name="productid" value="<?= $product['id'] ?>">
      <div class="rate">
        <input type="radio" id="star5" name="rate" value="5" />
        <label for="star5" title="text">5 stars</label>
        <input type="radio" id="star4" name="rate" value="4" />
        <label for="star4" title="text">4 stars</label>
        <input type="radio" id="star3" name="rate" value="3" />
        <label for="star3" title="text">3 stars</label>
        <input type="radio" id="star2" name="rate" value="2" />
        <label for="star2" title="text">2 stars</label>
        <input type="radio" id="star1" name="rate" value="1" />
        <label for="star1" title="text">1 star</label>
      </div>
      <textarea name="content" placeholder="Viết nhận xét của bạn"></textarea>
      <input type="file" name="file">
      <button type="submit" name="sub">Đánh giá</button>
    </form>

    <h4> Đánh giá của khách hàng (<?php echo count($review) ?>)</h4>
    <?php
    for ($i = 0; $i < count($review); $i++) {
    ?>
      <div class="khach-hang">
        <div class="avatar">
          <div class="image-container"> <img src="./img/<?php echo $review[$i]['user']['avatar'] ?>"></div>
          <h5>
            <?php echo $review[$i]['user']['ho'] . " " . $review[$i]['user']['ten']; ?> <br />
            <strong style="color: #fab320">
              <?php
              $rate = '';
              for ($a = 0; $a < $review[$i]['diem_danh_gia']; $a++) {
                $rate .= '<i class="fa-solid fa-star"></i>';
              }
              for ($a = 0; $a < (5 - $review[$i]['diem_danh_gia']); $a++) {
                $rate .= '<i class="fa-solid fa-star blank"></i>';
              }
              echo $rate;
              ?>
            </strong>
          </h5>
        </div>
        <p>
          <?php echo $review[$i]['noi_dung'] ?>
        </p>
        <div class="file">
          <img src="./img/<?php echo $review[$i]['file']; ?>" />
        </div>
      </div>
    <?php }; ?>
    <div id="page">
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <!-- Trang trước -->
          <?php
          $idcate = $_GET['idcate'];
          $id = $_GET['id'];
          $currentPage = $data['currentPage'];
          ?>
          <li class="page-item <?php echo ($currentPage == 1) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?view=detail&idcate=<?php echo $idcate; ?>&id=<?php echo $id; ?>&page=<?php echo 1; ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <!-- Các trang -->
          <?php
          $totalPages = $data['totalPages'];
          for ($i = 1; $i <= $totalPages; $i++) :
          ?>
            <li class="page-item ">
              <a class="page-link <?php echo ($currentPage == $i) ? 'active-check' : ''; ?>" href="?view=detail&idcate=<?php echo $idcate; ?>&id=<?php echo $id; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
          <?php endfor; ?>
          <!-- Trang sau -->
          <li class="page-item <?php echo ($currentPage == $totalPages || $totalPages == 0) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?view=detail&idcate=<?php echo $idcate; ?>&id=<?php echo $id; ?>&page=<?php echo $totalPages; ?>" aria-label="Next">
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
          <button>Chọn size</button>
        </a>
      <?php }; ?>
    </div>
  </div>
</main>
<script>
  function validateForm() {
    // Lấy giá trị số sao được chọn
    const rate = document.querySelector('input[name="rate"]:checked');

    // Lấy nội dung nhận xét
    const content = document.querySelector('textarea[name="content"]').value.trim();

    // Lấy tệp tải lên
    const file = document.querySelector('input[name="file"]').files[0];

    // Kiểm tra xem số sao đã được chọn chưa
    if (!rate) {
      alert("Vui lòng chọn số sao!");
      return false; // Ngăn gửi form
    }

    // Kiểm tra nội dung nhận xét
    if (!content) {
      alert("Vui lòng nhập nhận xét!");
      return false;
    }

    // Kiểm tra tệp đã được tải lên chưa
    if (!file) {
      alert("Vui lòng tải lên một tệp!");
      return false;
    }

    // Kiểm tra định dạng file
    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!allowedTypes.includes(file.type)) {
      alert("Chỉ cho phép tải lên các file hình ảnh (JPEG, PNG, GIF)!");
      return false;
    }

    return true; // Tất cả đều hợp lệ, cho phép gửi form
  }

  // Gán sự kiện onsubmit cho form
  document.addEventListener('DOMContentLoaded', function() {
    const reviewForm = document.querySelector('form[action="index.php?view=addreview"]');
    if (reviewForm) {
      reviewForm.onsubmit = validateForm;
    }
  });
</script>