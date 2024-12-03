<div class="control">
    <h2>Cập nhật danh mục</h2>
    <div>
        <form action="index.php?view=edit_discount" method="post" enctype="multipart/form-data">
            <?php
            $detail_discount = $data['detail_discount'];
            ?>
            <input type="hidden" name="id" value="<?= $detail_discount['id'] ?>">
            <label for="">Tên khuyến mãi</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= $detail_discount['ten'] ?>">
            <label for="">Mô tả khuyến mãi</label>
            <textarea name="description" id="description" class="form-control"><?= $detail_discount['mo_ta'] ?></textarea>
            <label for="">Loại khuyến mãi</label>
            <select name="type" id="type" class="form-control">
                <?php
                $type = [];
                if ($detail_discount['loai_km'] == 'phan_tram') {
                    $type .= '<option value="phan_tram" selected>Phần trăm (%)</option>';
                    $type .= '<option value="so_tien">Số tiền (VNĐ)</option>';
                } else {
                    $type .= '<option value="phan_tram">Phần trăm (%)</option>';
                    $type .= '<option value="so_tien" selected>Số tiền (VNĐ)</option>';
                }
                echo $type;
                ?>
            </select>
            <label for="">Giá trị khuyến mãi</label>
            <input type="number" name="value" id="value" value="<?= $detail_discount['gia_tri_km'] ?>" class="form-control">
            <label for="">Trạng thái</label>
            <select name="status" id="status" class="form-control">
                <?php
                $status = '';
                if (isset($detail_discount['trang_thai']) && $detail_discount['trang_thai'] === 1) {
                    $status .= '<option value="1" selected>Có</option>';
                    $status .= '<option value="0">Không</option>';
                } else {
                    $status .= '<option value="1">Có</option>';
                    $status .= '<option value="0" selected>Không</option>';
                }
                echo $status;
                ?>
            </select>
            <?php
            function formatDateForInput($date)
            {
                if (!empty($date)) {
                    $dateObject = DateTime::createFromFormat('Y-m-d', $date);
                    return $dateObject ? $dateObject->format('Y-m-d') : '';
                }
                return '';
            }
            $start_date = isset($detail_discount['ngay_bat_dau']) ? formatDateForInput($detail_discount['ngay_bat_dau']) : '';
            $end_date = isset($detail_discount['ngay_ket_thuc']) ? formatDateForInput($detail_discount['ngay_ket_thuc']) : '';
            ?>
            <label for="start">Ngày bắt đầu:</label>
            <input type="date" name="start" id="start" value="<?= $start_date ?>" class="form-control">
            <label for="">Ngày kết thúc</label>
            <input type="date" name="end" id="end" value="<?= $end_date ?>" class="form-control">
            <button type="submit" name="sub">Cập nhật khuyến mãi</button>
        </form>
    </div>
</div>