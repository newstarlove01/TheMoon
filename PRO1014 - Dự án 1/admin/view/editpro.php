<div class="control">
    <h2>Cập nhật sản phẩm</h2>
    <div>
        <form action="index.php?view=edit_pro" method="post" enctype="multipart/form-data">
            <label for="">Danh mục sản phẩm</label>
            <select name="cate" id="cate" class="form-control">
                <?php
                $listcate = $data['cate'];
                $detail_pro = $data['detail_pro'];
                $cate = [];
                foreach ($listcate as $item) {
                    extract($item);
                    if ($id == $detail_pro['idcate']) {
                        $cate .= '<option value="' . $id . '" selected>' . $ten . '</option> ';
                    } else {
                        $cate .= '<option value="' . $id . '">' . $ten . '</option>';
                    }
                }
                echo $cate;
                ?>
            </select>
            <label for="">Tên sản phẩm</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= $detail_pro['ten'] ?>">
            <label for="">Giá sản phẩm</label>
            <input type="number" name="price" id="price" class="form-control" value="<?= $detail_pro['gia'] ?>">
            <label for="">Mô tả sản phẩm</label>
            <textarea name="description" id="description" class="form-control"><?= $detail_pro['mo_ta'] ?></textarea>
            <label for="">Số lượng sản phẩm</label>
            <input type="number" name="amount" id="amount" class="form-control" value="<?= $detail_pro['so_luong'] ?>">
            <label for="">Nổi bật</label>
            <select name="hot" id="hot" class="form-control">
                <?php
                $hot = '';
                if (isset($detail_pro['hot']) && $detail_pro['hot'] === 1) {
                    $hot .= '<option value="1" selected>Có</option>';
                    $hot .= '<option value="0">Không</option>';
                } else {
                    $hot .= '<option value="1">Có</option>';
                    $hot .= '<option value="0" selected>Không</option>';
                }
                echo $hot;
                ?>
            </select>
            <label for="">Chất liệu</label>
            <select name="material" id="material" class="form-control">
                <?php
                $materials = ['bạc' => 'Bạc', 'vàng' => 'Vàng', 'hợp kim' => 'Hợp kim'];
                $material = '';
                foreach ($materials as $value => $label) {
                    $selected = (isset($detail_pro['chat_lieu']) && $detail_pro['chat_lieu'] === $value) ? 'selected' : '';
                    $material .= "<option value=\"$value\" $selected>$label</option>";
                }
                echo $material;
                ?>
            </select>
            <label for="">Hình ảnh</label>
            <input type="file" name="anh_chinh" id="anh_chinh" class="form-control"><br>
            <img width="20%" src="../img/<?= $detail_pro['img'][0]['anh_chinh'] ?>"> <br>
            <input type="hidden" name="anh_chinh_old" value="<?= $detail_pro['img'][0]['anh_chinh'] ?>">

            <label for="">Hình ảnh album 1</label>
            <input type="file" name="album1" id="album1" class="form-control"><br>
            <img width="20%" src="../img/<?= $detail_pro['img'][0]['album1'] ?>"> <br>
            <input type="hidden" name="album1_old" value="<?= $detail_pro['img'][0]['album1'] ?>">

            <label for="">Hình ảnh album 2</label>
            <input type="file" name="album2" id="album2" class="form-control"><br>
            <img width="20%" src="../img/<?= $detail_pro['img'][0]['album2'] ?>"> <br>
            <input type="hidden" name="album2_old" value="<?= $detail_pro['img'][0]['album2'] ?>">

            <label for="">Hình ảnh album 3</label>
            <input type="file" name="album3" id="album3" class="form-control"><br>
            <img width="20%" src="../img/<?= $detail_pro['img'][0]['album3'] ?>"> <br>
            <input type="hidden" name="album3_old" value="<?= $detail_pro['img'][0]['album3'] ?>">

            <input type="hidden" name="idpro" value="<?= $detail_pro['id'] ?>">
            <button type="submit" name="sub">Cập nhật sản phẩm</button>
        </form>
    </div>
</div>