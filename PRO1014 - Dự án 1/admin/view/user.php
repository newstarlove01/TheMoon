<?php

?>
<div class="main-table">
  <h2>Quản lý người dùng</h2>
  <table>
    <thead>
      <tr>
        <th style="width: 5%;">STT</th>
        <th style="width: 5%;">Họ</th>
        <th style="width: 5%;">Tên</th>
        <th style="width: 10%;">Email</th>
        <th style="width: 5%;">Số điện thoại</th>
        <th style="width: 15%;">Địa chỉ</th>
        <th style="width: 15%;">Mật khẩu</th>
        <th style="width: 10%;">Ảnh đại diện</th>
        <th style="width: 5%;">Trạng thái</th>
        <th style="width: 5%;">Admin</th>
        <th style="width: 10%;">Ngày đăng ký</th>
        <th style="width: 10%;">Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $listuser = $data['user'];
      foreach ($listuser as $item) {
      ?>
        <tr>
          <td><?= $item['id'] ?></td>
          <td><?= $item['ho'] ?></td>
          <td><?= $item['ten'] ?></td>
          <td><?= $item['email'] ?></td>
          <td><?= $item['sdt'] ?></td>
          <td><?= $item['dia_chi'] ?></td>
          <td><?= $item['mat_khau'] ?></td>
          <td><img width="100%" src="../img/<?= $item['avatar'] ?>" alt=""></td>
          <td style="text-align: center;">
            <input type="checkbox" <?= ($item['trang_thai'] ? "checked" : "") ?>>
            <span class="custom-checkbox"></span>
          </td>
          <td style="text-align: center;">
            <input type="checkbox" <?= ($item['admin'] ? "checked" : "") ?>>
            <span class="custom-checkbox"></span>
          </td>
          <td><?= $item['ngay_nhap'] ?></td>
          <td class="button">
            <a href="index.php?view=edituser&id=<?= $item['id'] ?>"><button>Sửa</button></a>
            <a href="index.php?view=del_user&id=<?= $item['id'] ?>"><button>Xoá</button></a>

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