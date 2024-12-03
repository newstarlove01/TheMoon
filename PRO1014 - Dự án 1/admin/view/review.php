<?php

?>
<div class="main-table">
  <h2>Quản lý đánh giá</h2>
  <table>
    <thead>
      <tr>
        <th style="width: 5%;">STT</th>
        <th style="width: 20%;">Sản phẩm</th>
        <th style="width: 10%;">Người đánh giá</th>
        <th style="width: 15%;">Nội dung</th>
        <th style="width: 15%;">Điểm đánh giá</th>
        <th style="width: 15%;">File</th>
        <th style="width: 5%;">Ngày đánh giá</th>
        <th style="width: 5%;">Trạng thái</th>
        <th style="width: 15%;">Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $listreview = $data['review'];
      for ($i = 0; $i < count($listreview); $i++) {
      ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= $listreview[$i]['product']['ten'] ?></td>
          <td><?= $listreview[$i]['user']['email'] ?></td>
          <td><?= $listreview[$i]['noi_dung'] ?></td>
          <td>
            <strong style="color: #fab320">
              <?php
              $rate = '';
              for ($a = 0; $a < $listreview[$i]['diem_danh_gia']; $a++) {
                $rate .= '<i class="fa-solid fa-star"></i>';
              }
              for ($a = 0; $a < (5 - $listreview[$i]['diem_danh_gia']); $a++) {
                $rate .= '<i class="fa-solid fa-star blank"></i>';
              }
              echo $rate;
              ?>
            </strong>
          </td>
          <td><img width="100%" src="../img/<?= $listreview[$i]['file'] ?>" alt=""></td>
          <td><?= $listreview[$i]['ngay_nhap'] ?></td>
          <td style="text-align: center;">
            <input type="checkbox" <?= ($listreview[$i]['trang_thai'] ? "checked" : "") ?>>
            <span class="custom-checkbox"></span>
          </td>
          <td class="button">
            <?php
            $button = '';
            if ($listreview[$i]['trang_thai'] == 1) {
              echo '<a href="index.php?view=hidereview&id=' . $listreview[$i]['id'] . '"><button>Ẩn</button></a>';
            } else {
              echo '<a href="index.php?view=showreview&id=' . $listreview[$i]['id'] . '"><button>Hiện</button></a>';
            }
            ?>
          </td>
        </tr>
      <?php }; ?>
    </tbody>
  </table>
  <div id="page">
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <?php
        $currentPage = $data['currentPage'];
        ?>
        <li class="page-item <?php echo ($currentPage == 1) ? 'disabled' : ''; ?>">
          <a class="page-link" href="?view=review&page=<?php echo 1; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <!-- Các trang -->
        <?php
        $totalPages = $data['totalPages'];
        for ($i = 1; $i <= $totalPages; $i++) :
        ?>
          <li class="page-item ">
            <a class="page-link <?php echo ($currentPage == $i) ? 'active-check' : ''; ?>" href="?view=review&page=<?php echo $i; ?>"><?php echo $i; ?></a>
          </li>
        <?php endfor; ?>
        <!-- Trang sau -->
        <li class="page-item <?php echo ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
          <a class="page-link" href="?view=review&page=<?php echo $totalPages; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>
</main>
</div>
</body>

</html>