<div class="control">
    <h2>Cập nhật bài viết</h2>
    <div>
        <form action="index.php?view=edit_blog" method="post" enctype="multipart/form-data">
            <?php
            $detail_blog = $data['detail_blog'];
            ?>
            <label for="">Tiêu đề bài viết</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= $detail_blog['tieu_de'] ?>">
            <label for="">Tóm tắt bài viết</label>
            <textarea name="title" id="title" class="form-control"><?=$detail_blog['tom_tat']?></textarea>
            <label for="">Nội dung bài viết</label>
            <textarea name="content" id="content" class="form-control"><?=$detail_blog['noi_dung']?></textarea>
            <label for="">Hình ảnh</label>
            <input type="file" name="image" id="image" class="form-control"><br>
            <img src="../img/<?= $detail_blog['hinh_anh'] ?>" alt=""> <br> <br>
            <input type="hidden" name="idblog" value="<?= $detail_blog['id'] ?>">
            <input type="hidden" name="image_old" value="<?= $detail_blog['hinh_anh'] ?>">
            <button type="submit" name="sub">Cập nhật bài viết</button>
        </form>
    </div>
</div>