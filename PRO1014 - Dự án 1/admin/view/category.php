<?php
function subword($text, $maxWords, $suffix = '...')
{
  $words = explode(' ', $text);
  if (count($words) > $maxWords) {
    return implode(' ', array_slice($words, 0, $maxWords)) . $suffix;
  }
  return $text;
}
?>
<div class="main-table">
  <h2>Quản lý danh mục</h2>
  <button>Thêm danh mục</button>
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
          <td><?= subword($mo_ta,20) ?></td>
          <td><img width="100%" src="../img/<?= $hinh_anh ?>" alt=""></td>
          <td><?= $ngay_nhap ?></td>
          <td class="button">
            <button>Sửa</button>
            <button>Xoá</button>
          </td>
        </tr>
      <?php }; ?>
    </tbody>
  </table>
</div>

</main>
</div>
</body>

</html>