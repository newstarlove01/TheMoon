<link rel="stylesheet" href="./public/css/index.css?v=<?php echo time(); ?>" />
<main>
    <div id="banner">
        <div
            id="carouselExampleIndicators"
            class="carousel slide"
            data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php
                $listcate = $data['banner'];
                $slideCount = count($listcate);
                for ($i = 0; $i < $slideCount; $i++) {
                    echo '<button
                    type="button"
                    data-bs-target="#carouselExampleIndicators"
                     data-bs-slide-to="' . $i . '" ' .
                        ($i === 0 ? 'class="active" aria-current="true"' : '') . '
                    aria-current="true"
                    aria-label="Slide ' . ($i + 1) . '"></button>';
                };
                ?>
            </div>
            <div class="carousel-inner banner">
                <?php
                $firstItem = true;
                $listcate = $data['banner'];
                foreach ($listcate as $item) {
                    extract($item);
                    echo '<div class="carousel-item ' . ($firstItem ? 'active' : '') . '" data-bs-interval="2000">
                    <img src="./img/' . $hinh_anh . '" class="d-block w-100" alt="..." />
                </div>';
                    $firstItem = false;
                };
                ?>
            </div>
            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div id="new">
        <h1>Sản phẩm mới ra mắt</h1>
        <div class="new">
            <?php
            $listnew = $data['dssp'];
            foreach ($listnew as $item) {
            ?>
                <a href="index.php?view=detail&idcate=<?= $item['id_dm'] ?>&id=<?= $item['id'] ?>" class="new-items">
                    <img src="./img/<?= $item['img'][0]['anh_chinh'] ?>" alt="" />
                    <h2><?= $item['ten'] ?></h2>
                    <p><?= number_format($item['gia']) ?></p>
                    <button>Thêm vào giỏ hàng</button>
                </a>
            <?php }; ?>
        </div>
    </div>
    <div id="introduct">
        <?php
        $introduct = $data['dsspgt'];
        foreach ($introduct as $item) {
            $mo_ta = preg_replace('/([.!?])\s/', '$1<br>', $item['mo_ta']);
        ?>
            <img src="./img/<?= $item['img'][0]['anh_chinh'] ?>" alt="" />
            <div>
                <h1><?= $item['ten'] ?></h1>
                <p><?= $mo_ta ?></p>
                <a href="index.php?view=detail&idcate=<?= $item['id_dm'] ?>&id=<?= $item['id'] ?>"><button>Xem thêm</button></a>
            </div>
        <?php }; ?>
    </div>
    <div id="hot">
        <h1>Sản phẩm nổi bật</h1>
        <div class="hot">
            <?php
            $listhot = $data['dssphot'];
            foreach ($listhot as $item) {
            ?>
                <div class="hot-items">
                    <img src="./img/<?= $item['img'][0]['anh_chinh'] ?>" alt="" />
                    <h2><?= $item['ten'] ?></h2>
                    <a href="index.php?view=detail&idcate=<?= $item['id_dm'] ?>&id=<?= $item['id'] ?>"><button>Xem thêm</button></a>
                </div>
            <?php }; ?>
        </div>
    </div>
    <div id="meet">
        <h1>Meets</h1>
        <div class="meet" id="slide">
            <?php
            $listcate = $data['dsm'];
            foreach ($listcate as $item) {
            ?>
                <div class="meets">
                    <img src="./img/<?= $item['hinh_anh'] ?>" alt="" />
                    <h3>THE MOON X <?= $item['ten'] ?></h3>
                </div>
            <?php }; ?>
        </div>
    </div>
</main>