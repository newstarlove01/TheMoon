<main>
  <?php
  $cate = $data['dm'];
  extract($cate);
  $mo_ta = preg_replace('/([.!?])\s/', '$1<br>', $mo_ta);
  echo '
  <div id="product-banner">
    <img src="./img/' . $hinh_anh . '" alt="" />
    <div class="product-banner-content">
      <h1>' . $ten . 's</h1>
      <p>' . $mo_ta . '</p>
    </div>
  </div>';
  ?>
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
              extract($item);
              echo '
              <label class="container">
                <p>' . $ten . '</p>
                <input type="checkbox" />
                <span class="checkmark"></span>
              </label>';
            };
            ?>
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
      </div>
    </div>
    <div id="product">
      <div id="product-list">
        <?php
        $listpro = $data['dssp'];
        foreach ($listpro as $item) {
          extract($item);
          echo '
          <a href="index.php?view=detail&id=' . $id . '" class="product-items">
            <img src="./img/' . $img[0]['anh_chinh'] . '" alt="" />
            <h2>' . $ten . 'a</h2>
            <p>' . $gia . 'đ</p>
            <button>Thêm vào giỏ hàng</button>
          </a>';
        };
        ?>
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
  </div>
</main>