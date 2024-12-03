<div class="control">
    <h2>Thêm Bài viết</h2>
    <div>
        <form action="index.php?view=insertblog" method="post" enctype="multipart/form-data">
            <label for="">Tiêu đề bài viết</label>
            <input type="text" name="name" id="name" class="form-control">
            <label for="">Tóm tắt bài viết</label>
            <textarea name="title" id="title" class="form-control"></textarea>
            <label for="">Nội dung bài viết</label>
            <textarea name="content" id="content" class="form-control"></textarea>
            <label for="">Hình ảnh</label>
            <input type="file" name="image" id="image" class="form-control">
            <button type="submit" name="sub">Thêm bài viết</button>
        </form>
    </div>
</div>