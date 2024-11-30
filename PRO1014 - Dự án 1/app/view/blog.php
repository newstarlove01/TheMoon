<link rel="stylesheet" href="./public/css/blog.css?v=<?php echo time(); ?>" />
<main>
    <h1>Bài Viết</h1>
    <?php
    $blog = $data['blog'];
    foreach ($blog as $item) {
        $tom_tat = preg_replace('/([.!?])\s/', '$1<br>', $item['tom_tat']);
    ?>
        <div class="blog">
            <div class="image-container">
                <img src="./img/<?= $item['hinh_anh'] ?>" alt="">
            </div>
            <div class="blog-item">
                <strong><?= $item['tieu_de'] ?></strong>
                <p> <?= $tom_tat ?> </p>
                <a href="index.php?view=blog_detail&id=<?= $item['id'] ?>"><button>Xem thêm</button></a>
            </div>
        </div>
    <?php }; ?>
</main>