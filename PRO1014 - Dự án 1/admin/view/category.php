<?php

?>
<div class="main-table">
  <h2>Quản lý danh mục</h2>
  <a href="index.php?view=addcate"><button>Thêm danh mục</button></a>
  <table>
    <thead>
      <tr>
        <th style="width: 10%;">STT</th>
        <th style="width: 10%;">Tên</th>
        <th style="width: 20%;">Mô tả</th>
        <th style="width: 20%;">Hình ảnh</th>
        <th style="width: 20%;">Ngày nhập</th>
        <th style="width: 20%;">Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $listcate = $data['cate'];
      foreach ($listcate as $item) {
        extract($item);
      ?>
        <tr>
          <td><?= $id ?></td>
          <td><?= $ten ?></td>
          <td><?= subword($mo_ta, 20) ?></td>
          <td><img width="100%" src="../img/<?= $hinh_anh ?>" alt=""></td>
          <td><?= $ngay_nhap ?></td>
          <td class="button">
            <a href="index.php?view=editcate&id=<?= $id ?>"><button>Sửa</button></a>
            <a href="index.php?view=del_cate&id=<?= $id ?>"><button>Xoá</button></a>
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
          <a class="page-link" href="?view=product&page=<?php echo 1; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <!-- Các trang -->
        <?php
        $totalPages = $data['totalPages'];
        for ($i = 1; $i <= $totalPages; $i++) :
        ?>
          <li class="page-item ">
            <a class="page-link <?php echo ($currentPage == $i) ? 'active-check' : ''; ?>" href="?view=product&page=<?php echo $i; ?>"><?php echo $i; ?></a>
          </li>
        <?php endfor; ?>
        <!-- Trang sau -->
        <li class="page-item <?php echo ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
          <a class="page-link" href="?view=product&page=<?php echo $totalPages; ?>" aria-label="Next">
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