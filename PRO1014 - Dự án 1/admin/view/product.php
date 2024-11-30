<div class="main-table">
    <h2>Quản lý sản phẩm</h2>
    <a href="?view=addpro"><button>Thêm sản phẩm</button></a>
    <table>
        <thead>
            <tr>
                <th style="width: 5%;">STT</th>
                <th style="width: 8%;">Danh mục</th>
                <th style="width: 20%;">Tên</th>
                <th style="width: 7%;">Giá</th>
                <th style="width: 20%;">Hình ảnh</th>
                <th style="width: 15%;">Mô tả</th>
                <th style="width: 5%;">Nổi bật</th>
                <th style="width: 5%;">Chất liệu</th>
                <th style="width: 5%;">Số lượng</th>
                <th style="width: 10%;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $listpro = $data['pro'];
            foreach ($listpro as $item) {
            ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['cate']['ten'] ?></td>
                    <td><?= $item['ten'] ?></td>
                    <td><?= number_format($item['gia']) ?></td>
                    <td>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                            <div>
                                <label for="">Ảnh chính</label>
                                <img width="100%" src="../img/<?= $item['img'][0]['anh_chinh'] ?>" alt="">
                            </div>
                            <div>
                                <label for="">Ảnh album 1</label>
                                <img width="100%" src="../img/<?= $item['img'][0]['album1'] ?>" alt="">
                            </div>
                            <div>
                                <label for="">Ảnh album 2</label>
                                <img width="100%" src="../img/<?= $item['img'][0]['album2'] ?>" alt="">
                            </div>
                            <div>
                                <label for="">Ảnh album 3</label>
                                <img width="100%" src="../img/<?= $item['img'][0]['album3'] ?>" alt="">
                            </div>

                        </div>
                    </td>
                    <td><?= subword($item['mo_ta'], 20) ?></td>
                    <td style="text-align: center;">
                        <input type="checkbox" <?= ($item['hot'] ? "checked" : "") ?>>
                        <span class="custom-checkbox"></span>
                    </td>
                    <td><?= $item['chat_lieu'] ?></td>
                    <td><?= $item['so_luong'] ?></td>
                    <td class="button">
                        <a href="index.php?view=editpro&id=<?= $item['id'] ?>"><button>Sửa</button></a>
                        <a href="index.php?view=del_pro&id=<?= $item['id'] ?>"><button>Xoá</button></a>
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