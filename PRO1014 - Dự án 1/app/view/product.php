<link rel="stylesheet" href="./public/css/product.css?v=<?php echo time(); ?>" />
<main>
  <?php
  $cate = $data['dm'];
  $mo_ta = preg_replace('/([.!?])\s/', '$1<br>', $cate['mo_ta']);
  ?>
  <div id="product-banner">
    <img src="./img/<?= $cate['hinh_anh'] ?>" alt="" />
    <div class="product-banner-content">
      <h1><?= $cate['ten'] ?></h1>
      <p><?= $mo_ta ?></p>
    </div>
  </div>';

  <div id="main-container">
    <div id="filter">
      <div class="card">
        <div class="card-header">
          <button class="btn" data-bs-toggle="collapse" href="#collapseOne">
            <div>Giá</div>
            <div><i class="fa-solid fa-plus"></i></div>
          </button>
        </div>
        <div id="collapseOne" class="collapse" data-bs-parent="#accordion">
          <div class="card-body">
            <div class="price-input-container">
              <div class="price-input">
                <div class="price-field">
                  <input
                    type="number"
                    class="min-input"
                    min="0"
                    max="20000000"
                    value="0" />
                </div>
                <i class="fa-solid fa-minus"></i>
                <div class="price-field">
                  <input
                    type="number"
                    class="max-input"
                    min="0"
                    max="20000000"
                    value="20000000" />
                </div>
              </div>
              <div class="slider-container">
                <div class="price-slider"></div>
              </div>
              <!-- Slider -->
              <div class="range-input">
                <input
                  type="range"
                  class="min-range"
                  min="0"
                  max="20000000"
                  value="0"
                  step="1" />
                <input
                  type="range"
                  class="max-range"
                  min="0"
                  max="20000000"
                  value="20000000"
                  step="1" />
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <button
            style="border-top: 2px solid white"
            class="btn"
            data-bs-toggle="collapse"
            href="#collapseTwo">
            <div>Loại sản phẩm</div>
            <div><i class="fa-solid fa-plus"></i></div>
          </button>
        </div>
        <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
          <div class="card-body">
            <label class="container">
              <p>Nhẫn bạc</p>
              <input type="checkbox" />
              <span class="checkmark"></span>
            </label>
            <label class="container">
              <p>Nhẫn vàng</p>
              <input type="checkbox" />
              <span class="checkmark"></span>
            </label>
            <label class="container">
              <p>Nhẫn hợp kim</p>
              <input type="checkbox" />
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <button
            style="border-top: 2px solid white"
            class="btn"
            data-bs-toggle="collapse"
            href="#collapseThree">
            <div>Cỡ</div>
            <div><i class="fa-solid fa-plus"></i></div>
          </button>
        </div>
        <div
          id="collapseThree"
          class="collapse"
          data-bs-parent="#accordion">
          <div class="card-body">
            <?php
            $listsize = $data['size'];
            foreach ($listsize as $item) {
            ?>
              <label class="container">
                <p><?= $item['ten'] ?></p>
                <input type="checkbox" />
                <span class="checkmark"></span>
              </label>
            <?php  }; ?>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <button
            style="border-top: 2px solid white"
            class="btn"
            data-bs-toggle="collapse"
            href="#collapseFour">
            <div>Sale</div>
            <div><i class="fa-solid fa-plus"></i></div>
          </button>
        </div>
        <div
          id="collapseFour"
          class="collapse"
          data-bs-parent="#accordion">
          <div class="card-body">
            <label class="container">
              <p>Sale</p>
              <input type="checkbox" />
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
      </div>
      <div class="submit"><input type="submit" name="" id=""></div>
    </div>

    <div id="product">
      <div id="product-list">
        <?php
        $listpro = $data['dssp'];
        foreach ($listpro as $item) {
        ?>
          <a href="index.php?view=detail&idcate=<?= $item['id_dm'] ?>&id=<?= $item['id'] ?>" class="product-items">
            <img src="./img/<?= $item['img'][0]['anh_chinh'] ?>" alt="" />
            <h2><?= $item['ten'] ?></h2>
            <p><?= number_format($item['gia']) ?>đ</p>
            <button>Thêm vào giỏ hàng</button>
          </a>
        <?php     }; ?>
      </div>
      <div id="page">
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <!-- Trang trước -->
            <?php $idcate = $_GET['idcate'];
            $currentPage = $data['currentPage'];
            ?>
            <li class="page-item <?php echo ($currentPage == 1) ? 'disabled' : ''; ?>">
              <a class="page-link" href="?view=product&idcate=<?php echo $idcate; ?>&page=<?php echo $currentPage - 1; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <!-- Các trang -->
            <?php
            $totalPages = $data['totalPages'];
            for ($i = 1; $i <= $totalPages; $i++) :
            ?>
              <li class="page-item ">
                <a class="page-link <?php echo ($currentPage == $i) ? 'active-check' : ''; ?>" href="?view=product&idcate=<?php echo $idcate; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
              </li>
            <?php endfor; ?>
            <!-- Trang sau -->
            <li class="page-item <?php echo ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
              <a class="page-link" href="?view=product&idcate=<?php echo $idcate; ?>&page=<?php echo $currentPage + 1; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</main>