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
            $listcate = $data['dssp'];
            foreach ($listcate as $item) {
                extract($item);
                echo '
                <a href="index.php?view=detail&id=' . $id . '" class="new-items">
                    <img src="./img/' . $img[0]['anh_chinh'] . '" alt="" />
                    <h2>' . $ten . '</h2>
                    <p>' . $gia . 'đ</p>
                    <button>Thêm vào giỏ hàng</button>
                </a>';
            };
            ?>
        </div>
    </div>
    <div id="introduct">
        <?php


        $listcate = $data['dsspgt'];
        foreach ($listcate as $item) {
            extract($item);
            $mo_ta = preg_replace('/([.!?])\s/', '$1<br>', $mo_ta);
            echo '
            <img src="./img/' . $img[0]['anh_chinh'] . '" alt="" />
                <div>
                <h1>' . $ten . '</h1>
                <p>' . $mo_ta . '</p>
                <button>Xem thêm</button>
            </div>';
        };
        ?>
    </div>
    <div id="hot">
        <h1>Sản phẩm nổi bật</h1>
        <div class="hot">
            <?php
            $listcate = $data['dssphot'];
            foreach ($listcate as $item) {
                extract($item);
                echo '  
                <div class="hot-items">
                    <img src="./img/' . $img[0]['anh_chinh'] . '" alt="" />
                    <h2>' . $ten . '</h2>
                    <a href="index.php?view=detail&id=' . $id . '"><button>Xem thêm</button></a>
                </div>';
            };
            ?>
        </div>
    </div>
    <div id="meet">
        <h1>Meets</h1>
        <div class="meet" id="slide">
            <?php
            $listcate = $data['dsm'];
            foreach ($listcate as $item) {
                extract($item);
                echo '
                <div class="meets">
                    <img src="./img/' . $hinh_anh . '" alt="" />
                    <h3>THE MOON X ' . $ten . '</h3>
                </div>';
            };
            ?>
        </div>
    </div>
</main>