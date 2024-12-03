<?php

?>
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
        <tbody>
            <?php
            $listorder = $data['order'];
            for ($i = 0; $i < count($listorder); $i++) {
            ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $listorder[$i]['user']['sdt'] ?></td>
                    <td><?= $listorder[$i]['discount']['ten'] ?></td>
                    <td><?= number_format($listorder[$i]['tong_tien_sp']) ?>đ</td>
                    <td><?= number_format($listorder[$i]['tien_giam_gia']) ?>đ</td>
                    <td><?= number_format($listorder[$i]['tong_tien']) ?>đ</td>
                    <td><?= $listorder[$i]['dia_chi'] ?></td>
                    <td><?= $listorder[$i]['phuong_thuc_tt'] ?></td>
                    <td><?= $listorder[$i]['ngay_nhap'] ?></td>
                    <td><?= $listorder[$i]['ngay_cap_nhat'] ?></td>
                    <td class="button">
                        <?php
                        $button = '';
                        if ($listorder[$i]['trang_thai'] == 0) {
                            echo '<a href="index.php?view=confirm_order&id=' . $listorder[$i]['id'] . '"><button>Chờ xác nhận</button></a>';
                        } else {
                            echo '<button disabled>Đã xác nhận</button>';
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
</div>
</body>

</html>