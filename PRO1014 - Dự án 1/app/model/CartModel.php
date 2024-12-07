<?php

class CartModel
{
    private $db;
    function __construct()
    {
        $this->db = new Database();
    }
    function getAllDiscount($limit, $offset)
    {
        $sql = "SELECT * FROM khuyen_mai LIMIT $limit OFFSET $offset";
        return $this->db->getAll($sql);
    }
    function getIdDiscount($id)
    {
        $sql = "SELECT * FROM khuyen_mai WHERE id = $id";
        return $this->db->getOne($sql);
    }
    function getCountAllDiscount()
    {
        $sql = "SELECT COUNT(*) as total FROM khuyen_mai";
        $result = $this->db->getOne($sql);
        return $result['total'];
    }
    function insertDiscount($data)
    {
        $sql = "INSERT INTO khuyen_mai(ten,mo_ta,loai_km,gia_tri_km,ngay_bat_dau,ngay_ket_thuc) VALUES(?,?,?,?,?,?)";
        $param = [$data['name'], $data['description'], $data['type'], $data['value'], $data['start'], $data['end']];
        return $this->db->insert($sql, $param);
    }
    function updateDiscount($data)
    {
        $sql = "UPDATE khuyen_mai SET ten = ?, mo_ta = ?, loai_km = ?, gia_tri_km = ?, ngay_bat_dau = ?, ngay_ket_thuc = ?,trang_thai = ? WHERE id = ?";
        $param = [$data['name'], $data['description'], $data['type'], $data['value'], $data['start'], $data['end'], $data['status'], $data['id']];
        return $this->db->update($sql, $param);
    }
    function checkDiscount($discount)
    {
        $sql = "SELECT * FROM khuyen_mai WHERE trang_thai = 1 AND ten LIKE '%$discount%'";
        return $this->db->getOne($sql);
    }
    function insertOrder($data)
    {
        try {
            $this->db->beginTransaction();

            $sqlOrder = "INSERT INTO don_hang(id_kh, id_km, tong_tien_sp, tien_giam_gia, tong_tien, dia_chi, phuong_thuc_tt) VALUES(?,?,?,?,?,?,?)";
            $paramOrder = [
                $data['userid'],
                $data['discount'],
                $data['total_product'],
                $data['total_discount'],
                $data['total'],
                $data['address'],
                $data['payment']
            ];

            $lastProductId = $this->db->insert($sqlOrder, $paramOrder);

            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $productId => $sizes) {
                    foreach ($sizes as $size => $item) {
                        // SQL để thêm sản phẩm vào bảng chi tiết đơn hàng
                        $sqlDetail = "INSERT INTO chi_tiet_don_hang (id_dh, id_sp, so_luong, size, gia_sp, tong_tien) VALUES (?,?,?,?,?,?)";
                        $paramDetail = [
                            $lastProductId,
                            $item['id'],
                            $item['quantity'],
                            $item['sizename'][0]['ten'],
                            $item['gia'],
                            $item['total_price']
                        ];
                        $this->db->insert($sqlDetail, $paramDetail);
                    }
                }
            }

            // Xác nhận giao dịch
            $this->db->commit();

            return $lastProductId;
        } catch (Exception $e) {
            // Hoàn tác nếu có lỗi
            $this->db->rollBack();
            throw $e; // Ném lỗi để controller xử lý
        }
    }
    function getCountAllOrder()
    {
        $sql = "SELECT COUNT(*) as total FROM don_hang";
        $result = $this->db->getOne($sql);
        return $result['total'];
    }
    function getAllOrder($offset, $limit)
    {
        $sql = "SELECT * FROM don_hang LIMIT $limit OFFSET $offset";
        return $this->db->getAll($sql);
    }
    function settingOrder($status, $id)
    {
        $sql = "UPDATE don_hang SET trang_thai = '$status' WHERE id = $id";
        $this->db->update($sql);
    }
    function getUserOrder($id)
    {
        $sql = "SELECT * FROM don_hang WHERE id_kh = $id";
        return $this->db->getAll($sql);
    }
    function getUserOrderDetail($id)
    {
        $sql = "SELECT * FROM chi_tiet_don_hang WHERE id_dh = $id";
        return $this->db->getAll($sql);
    }
    function deleteOrder($id)
    {
        try {
            $this->db->beginTransaction();

            $sqlDeleteDetail = "DELETE FROM chi_tiet_don_hang WHERE id_dh = ?";
            $this->db->delete($sqlDeleteDetail, [$id]);

            $sqlDeleteOrder = "DELETE FROM don_hang WHERE id = ?";
            $this->db->delete($sqlDeleteOrder, [$id]);

            $this->db->commit();
        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
}
