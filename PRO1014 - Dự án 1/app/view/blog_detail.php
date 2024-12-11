<link rel="stylesheet" href="./public/css/blog.css?v=<?php echo time(); ?>" />
<main>
    <h1>Bài Viết</h1>
    <?php
    $blogdetail = $data['blog_detail'];
    $noi_dung = preg_replace('/([.!?])\s/', '$1<br>', $blogdetail['noi_dung']);
    ?>
    <div class="blog-detail">
        <div class="blog-item">
            <a href="?view=blog"><button>Quay lại</button></a> <br> <br> <br>
            <strong><?= $blogdetail['tieu_de'] ?></strong>
            <p> <?= $noi_dung ?> </p>
        </div>
        <div class="image-container">
            <img src="./img/<?= $blogdetail['hinh_anh'] ?>" alt="">
        </div>
    </div>
</main>