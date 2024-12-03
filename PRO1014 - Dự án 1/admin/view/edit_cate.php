<div class="control">
    <h2>Cập nhật danh mục</h2>
    <div>
        <form action="index.php?view=edit_cate" method="post" enctype="multipart/form-data">
            <?php
            $detail_cate = $data['detail_cate'];
            ?>
            <label for="">Tên sản phẩm</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= $detail_cate['ten'] ?>">
            <label for="">Mô tả sản phẩm</label>
            <textarea name="description" id="description" class="form-control"><?=$detail_cate['mo_ta']?></textarea>
            <label for="">Hình ảnh</label>
            <input type="file" name="image" id="image" class="form-control"><br>
            <img src="../img/<?= $detail_cate['hinh_anh'] ?>" alt=""> <br> <br>
            <input type="hidden" name="idcate" value="<?= $detail_cate['id'] ?>">
            <input type="hidden" name="image_old" value="<?= $detail_cate['hinh_anh'] ?>">
            <button type="submit" name="sub">Cập nhật danh mục</button>
        </form>
    </div>
</div>