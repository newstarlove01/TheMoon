<div class="control">
    <h2>Thêm khuyến mãi</h2>
    <div>
        <form action="index.php?view=insertdiscount" method="post" enctype="multipart/form-data">
            <label for="">Tên khuyến mãi</label>
            <input type="text" name="name" id="name" class="form-control">
            <label for="">Mô tả khuyến mãi</label>
            <textarea name="description" id="description" class="form-control"></textarea>
            <label for="">Loại khuyến mãi</label>
            <select name="type" id="type" class="form-control">
                <option value="phan_tram">Phần trăm (%)</option>
                <option value="so_tien">Số tiền (VNĐ)</option>
            </select>
            <label for="">Giá trị khuyến mãi</label>
            <input type="number" name="value" id="value" class="form-control">
            <label for="">Ngày bắt đầu</label>
            <input type="date" name="start" id="start" class="form-control">
            <label for="">Ngày kết thúc</label>
            <input type="date" name="end" id="end" class="form-control">
            <button type="submit" name="sub">Thêm khuyến mãi</button>
        </form>
    </div>
</div>