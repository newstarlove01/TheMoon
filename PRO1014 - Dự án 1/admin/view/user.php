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
        <th style="width: 15%;">Ảnh đại diện</th>
        <th style="width: 5%;">Trạng thái</th>
        <th style="width: 5%;">Admin</th>
        <th style="width: 10%;">Ngày đăng ký</th>
        <th style="width: 20%;">Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $listuser = $data['user'];
      for ($i = 0; $i < count($listuser); $i++) {
      ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= $listuser[$i]['ho'] ?></td>
          <td><?= $listuser[$i]['ten'] ?></td>
          <td><?= $listuser[$i]['email'] ?></td>
          <td><?= $listuser[$i]['sdt'] ?></td>
          <td><?= $listuser[$i]['dia_chi'] ?></td>
          <td><img width="100%" src="../img/<?= $listuser[$i]['avatar'] ?>" alt=""></td>
          <td style="text-align: center;">
            <input type="checkbox" <?= ($listuser[$i]['trang_thai'] ? "checked" : "") ?>>
            <span class="custom-checkbox"></span>
          </td>
          <td style="text-align: center;">
            <input type="checkbox" <?= ($listuser[$i]['admin'] ? "checked" : "") ?>>
            <span class="custom-checkbox"></span>
          </td>
          <td><?= $listuser[$i]['ngay_nhap'] ?></td>
          <td class="button">
            <a href="index.php?view=edituser&id=<?= $listuser[$i]['id'] ?>"><button>Sửa</button></a>
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
          <a class="page-link" href="?view=user&page=<?php echo 1; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <!-- Các trang -->
        <?php
        $totalPages = $data['totalPages'];
        for ($i = 1; $i <= $totalPages; $i++) :
        ?>
          <li class="page-item ">
            <a class="page-link <?php echo ($currentPage == $i) ? 'active-check' : ''; ?>" href="?view=user&page=<?php echo $i; ?>"><?php echo $i; ?></a>
          </li>
        <?php endfor; ?>
        <!-- Trang sau -->
        <li class="page-item <?php echo ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
          <a class="page-link" href="?view=user&page=<?php echo $totalPages; ?>" aria-label="Next">
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