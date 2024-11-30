<div class="main-table">
    <h2>Thống kê</h2>
    <div id="chart" style="width: 800px; height: 600px;"></div>
</div>
<?php
$listcate = $data['cate'];
$listpro = $data['pro'];
?>

<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', { packages: ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        const data = google.visualization.arrayToDataTable([
            ['Danh mục', 'Số lượng sản phẩm'],
            <?php
            foreach ($listcate as $cate) {
                $cateName = $cate['ten']; // Tên danh mục
                $productCount = $listpro[$cate['id']] ?? 0; // Số lượng sản phẩm tương ứng, nếu không có gán 0
                echo "['$cateName', $productCount],";
            }
            ?>
        ]);

        // Cấu hình biểu đồ
        const options = {
            title: 'Số lượng sản phẩm theo từng danh mục',
            pieHole: 1 // Ví dụ: tạo dạng biểu đồ Donut
        };

        // Vẽ biểu đồ
        const chart = new google.visualization.PieChart(document.getElementById('chart'));
        chart.draw(data, options);
    }
</script>