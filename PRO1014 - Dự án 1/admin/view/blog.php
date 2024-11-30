<?php

?>
<div class="main-table">
  <h2>Quản lý bài viết</h2>
  <a href="index.php?view=addblog"><button>Thêm bài viết</button></a>
  <table>
    <thead>
      <tr>
        <th style="width: 5%;">STT</th>
        <th style="width: 10%;">Tiêu đề</th>
        <th style="width: 20%;">Tóm tắt</th>
        <th style="width: 20%;">Nội dung</th>
        <th style="width: 20%;">Hình ảnh</th>
        <th style="width: 10%;">Ngày nhập</th>
        <th style="width: 15%;">Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $listblog = $data['blog'];
      for ($i = 0; $i < count($listblog); $i++) {
      ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= $listblog[$i]['tieu_de'] ?></td>
          <td><?= subword($listblog[$i]['tom_tat'], 20) ?></td>
          <td><?= subword($listblog[$i]['noi_dung'], 20) ?></td>
          <td><img width="100%" src="../img/<?= $listblog[$i]['hinh_anh'] ?>" alt=""></td>
          <td><?= $listblog[$i]['ngay_nhap'] ?></td>
          <td class="button">
            <a href="index.php?view=editblog&id=<?= $listblog[$i]['id'] ?>"><button>Sửa</button></a>
            <a href="index.php?view=del_blog&id=<?= $listblog[$i]['id'] ?>"><button>Xoá</button></a>
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
        <li class="page-listblog <?php echo ($currentPage == 1) ? 'disabled' : ''; ?>">
          <a class="page-link" href="?view=product&page=<?php echo 1; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <!-- Các trang -->
        <?php
        $totalPages = $data['totalPages'];
        for ($i = 1; $i <= $totalPages; $i++) :
        ?>
          <li class="page-listblog ">
            <a class="page-link <?php echo ($currentPage == $i) ? 'active-check' : ''; ?>" href="?view=product&page=<?php echo $i; ?>"><?php echo $i; ?></a>
          </li>
        <?php endfor; ?>
        <!-- Trang sau -->
        <li class="page-listblog <?php echo ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
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