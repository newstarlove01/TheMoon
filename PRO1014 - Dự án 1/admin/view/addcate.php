<div class="control">
    <h2>Thêm danh mục</h2>
    <div>
        <form action="index.php?view=insertcate" method="post" enctype="multipart/form-data">
            <label for="">Tên danh mục</label>
            <input type="text" name="name" id="name" class="form-control">
            <label for="">Mô tả danh mục</label>
            <textarea name="description" id="description" class="form-control"></textarea>
            <label for="">Hình ảnh</label>
            <input type="file" name="image" id="image" class="form-control">
            <button type="submit" name="sub">Thêm danh mục</button>
        </form>
    </div>
</div>