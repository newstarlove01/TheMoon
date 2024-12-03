<div class="control">
    <h2>Thêm sản phẩm</h2>
    <div>
        <form action="index.php?view=insertpro" method="post" enctype="multipart/form-data">
            <label for="">Danh mục sản phẩm</label>
            <select name="cate" id="cate" class="form-control">
                <option value="">Chọn danh mục</option>
                <?php
                $kq = '';
                $listcate = $data['cate'];
                foreach ($listcate as $item) {
                    extract($item);
                    $kq = '<option value="' . $id . '">' . $ten . '</option> ';
                    echo $kq;
                }
                ?>
            </select>   
            <label for="">Tên sản phẩm</label>
            <input type="text" name="name" id="name" class="form-control">
            <label for="">Giá sản phẩm</label>
            <input type="text" name="price" id="price" class="form-control">
            <label for="">Mô tả sản phẩm</label>
            <textarea name="description" id="description" class="form-control"></textarea>
            <label for="">Số lượng sản phẩm</label>
            <input type="number" name="amount" id="amount" class="form-control">
            <label for="">Nổi bật</label> <br>
            <select name="hot" id="hot" class="form-control">
                <option value="0">Không</option>
                <option value="1">Có</option>
            </select> <br>
            <label for="">Chất liệu</label> <br>
            <select name="material" id="material" class="form-control">
                <option value="">Chọn chất liệu</option>
                <option value="bạc">Bạc</option>
                <option value="vàng">Vàng</option>
                <option value="hợp kim">Hợp kim</option>
            </select> <br>
            <label for="">Hình ảnh</label>
            <input type="file" name="anh_chinh" id="anh_chinh" class="form-control">
            <label for="">Hình ảnh album 1</label>
            <input type="file" name="album1" id="album1" class="form-control">
            <label for="">Hình ảnh album 2</label>
            <input type="file" name="album2" id="album2" class="form-control">
            <label for="">Hình ảnh album 3</label>
            <input type="file" name="album3" id="album3" class="form-control">
            <button type="submit" name="sub">Thêm sản phẩm</button>
        </form>
    </div>
</div>