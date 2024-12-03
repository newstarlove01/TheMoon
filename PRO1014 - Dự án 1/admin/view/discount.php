<?php

?>
<div class="main-table">
    <h2>Quản lý khuyến mãi</h2>
    <a href="index.php?view=adddiscount"><button>Thêm khuyến mãi</button></a>
    <table>
        <thead>
            <tr>
                <th style="width: 10%;">STT</th>
                <th style="width: 10%;">Tên</th>
                <th style="width: 20%;">Mô tả</th>
                <th style="width: 15%;">Loại khuyến mãi</th>
                <th style="width: 10%;">Giá trị khuyến mãi</th>
                <th style="width: 10%;">Ngày bắt đầu</th>
                <th style="width: 10%;">Ngày kết thúc</th>
                <th style="width: 5%;">Trạng thái</th>
                <th style="width: 10%;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $listdiscount = $data['discount'];
            for ($i = 0; $i < count($listdiscount); $i++) {
            ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $listdiscount[$i]['ten'] ?></td>
                    <td><?= subword($listdiscount[$i]['mo_ta'], 20) ?></td>
                    <td>
                        <?php
                        if ($listdiscount[$i]['loai_km'] == 'phan_tram') {
                            echo 'Phần trăm (%)';
                        } else {
                            echo 'Số tiền (VND)';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($listdiscount[$i]['loai_km'] == 'phan_tram') {
                            echo $listdiscount[$i]['gia_tri_km'] . ' %';
                        } else {
                            echo $listdiscount[$i]['gia_tri_km'] . ' VND';
                        }
                        ?>
                    </td>
                    <td><?= $listdiscount[$i]['ngay_bat_dau'] ?></td>
                    <td><?= $listdiscount[$i]['ngay_ket_thuc'] ?></td>
                    <td style="text-align: center;">
                        <input type="checkbox" <?= ($listdiscount[$i]['trang_thai'] ? "checked" : "") ?>>
                        <span class="custom-checkbox"></span>
                    </td>
                    <td class="button">
                        <a href="index.php?view=editdiscount&id=<?= $listdiscount[$i]['id'] ?>"><button>Sửa</button></a>
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
                    <a class="page-link" href="?view=discount&page=<?php echo 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <!-- Các trang -->
                <?php
                $totalPages = $data['totalPages'];
                for ($i = 1; $i <= $totalPages; $i++) :
                ?>
                    <li class="page-item ">
                        <a class="page-link <?php echo ($currentPage == $i) ? 'active-check' : ''; ?>" href="?view=discount&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <!-- Trang sau -->
                <li class="page-item <?php echo ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?view=discount&page=<?php echo $totalPages; ?>" aria-label="Next">
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