
<div class="main-table">
    <h2>Quản lý đơn hàng</h2>
    <table>
        <thead>
            <tr>
                <th style="width: 5%;">STT</th>
                <th style="width: 10%;">Khách hàng</th>
                <th style="width: 5%;">Khuyến mãi</th>
                <th style="width: 5%;">Tổng tiền sản phẩm</th>
                <th style="width: 5%;">Tiền giảm giá</th>
                <th style="width: 5%;">Tổng tiền</th>
                <th style="width: 10%;">Địa chỉ</th>
                <th style="width: 10%;">Phương thức thanh toán</th>
                <th style="width: 10%;">Ngày tạo đơn hàng</th>
                <th style="width: 10%;">Ngày xác nhận</th>
                <th style="width: 20%;">Trạng thái</th>
            </tr>
        </thead>
        <tbody id="show">
            <?php
            $listorder = $data['order'];

            for ($i = 0; $i < count($listorder); $i++) {
            ?>
                <!-- Hàng chính -->
                <tr class="order-row" data-index="<?= $i ?>">
                    <td><?= $i + 1 ?></td>
                    <td><?= $listorder[$i]['user']['sdt'] ?></td>
                    <td><?= isset($listorder[$i]['discount']) ? $listorder[$i]['discount']['ten'] : "" ?></td>
                    <td><?= number_format($listorder[$i]['tong_tien_sp']) ?>đ</td>
                    <td><?= number_format($listorder[$i]['tien_giam_gia']) ?>đ</td>
                    <td><?= number_format($listorder[$i]['tong_tien']) ?>đ</td>
                    <td><?= $listorder[$i]['dia_chi'] ?></td>
                    <td><?= $listorder[$i]['phuong_thuc_tt'] ?></td>
                    <td><?= $listorder[$i]['ngay_nhap'] ?></td>
                    <td><?= $listorder[$i]['ngay_cap_nhat'] ?></td>
                    <td class="button">
                        <?php
                        if ($listorder[$i]['trang_thai'] == 'Đã huỷ') {
                            echo '<button disabled>Đã huỷ</button>';
                            echo '<a href="index.php?view=del_order&id=' . $listorder[$i]['id'] . '"><button>Xoá</button></a>';
                        } elseif ($listorder[$i]['trang_thai'] == 'Chờ xác nhận') {
                            echo '<a href="index.php?view=confirm_order&id=' . $listorder[$i]['id'] . '"><button>Chờ xác nhận</button></a>';
                        } else {
                            echo '<button disabled>Đã xác nhận</button>';
                        }
                        ?>
                    </td>
                </tr>

                <!-- Hàng chi tiết -->
                <tr class="details-row" id="details-<?= $i ?>" style="display: none;">
                    <td colspan="11">
                        <table style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Size</th>
                                    <th>Giá</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listorder[$i]['detail'] as $index => $item) { ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $item['product']['ten'] ?></td>
                                        <td><?= $item['so_luong'] ?></td>
                                        <td><?= $item['size'] ?></td>
                                        <td><?= number_format($item['gia_sp']) ?>đ</td>
                                        <td><?= number_format($item['tong_tien']) ?>đ</td>
                                    </tr>
                                <?php }; ?>
                            </tbody>
                        </table>
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
                    <a class="page-link" href="?view=ordergory&page=<?php echo 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <!-- Các trang -->
                <?php
                $totalPages = $data['totalPages'];
                for ($i = 1; $i <= $totalPages; $i++) :
                ?>
                    <li class="page-item ">
                        <a class="page-link <?php echo ($currentPage == $i) ? 'active-check' : ''; ?>" href="?view=ordergory&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <!-- Trang sau -->
                <li class="page-item <?php echo ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?view=ordergory&page=<?php echo $totalPages; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
</main>
</body>
<script>
    document.querySelectorAll('.order-row').forEach((row) => {
    row.addEventListener('click', function () {
        const index = this.getAttribute('data-index');
        const detailsRow = document.getElementById(`details-${index}`);
        if (detailsRow) {
            const isVisible = detailsRow.style.display === 'table-row';
            detailsRow.style.display = isVisible ? 'none' : 'table-row';
        }
    });
});
</script>
</html>