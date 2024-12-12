<?php

class ProductModel
{
    private $db;
    function __construct()
    {
        $this->db = new Database();
    }
    function getProduct($sp)
    {
        $sql = "SELECT * FROM san_pham WHERE trang_thai = 1";
        if ($sp == 1) {
            $sql .= " AND hot = 1 LIMIT 2";
        } elseif ($sp == 2) {
            $sql .= " ORDER BY ngay_nhap DESC LIMIT 4";
        } elseif ($sp == 3) {
            $sql .= " ORDER BY ngay_nhap ASC LIMIT 1";
        } else {
            $sql .= " ORDER BY id DESC";
        }
        return $this->db->getAll($sql);
    }
    function getImg($id)
    {
        $sql = "SELECT * FROM hinh_anh WHERE id_sp = $id";
        return $this->db->getAll($sql);
    }

    function getSize($id)
    {
        $sql = "SELECT * FROM size WHERE id_dm = $id";
        return $this->db->getAll($sql);
    }
    function getSizeName($id)
    {
        $sql = "SELECT * FROM size WHERE id = $id";
        return $this->db->getAll($sql);
    }
    function getSizeDetail($id)
    {
        $sql = "SELECT * FROM size WHERE id_dm = (SELECT id_dm FROM san_pham WHERE id=$id) LIMIT 7";
        return $this->db->getAll($sql);
    }

    function getIdPro($idpro)
    {
        if ($idpro > 0) {
            $sql = "SELECT * FROM san_pham WHERE id = $idpro";
            return $this->db->getOne($sql);
        }
    }
    function getRelatePro($id)
    {
        $sql = "SELECT * FROM san_pham WHERE trang_thai = 1 AND id_dm = (SELECT id_dm FROM san_pham WHERE id=$id) LIMIT 4";
        return $this->db->getAll($sql);
    }

    function check_cate_pro($idcate)
    {
        $sql = "SELECT * FROM san_pham WHERE trang_thai = 1 AND id_dm = $idcate";
        return $this->db->getAll($sql);
    }
    function get_all_cate_pro($idcate, $offset, $limit)
    {
        $sql = "SELECT * FROM san_pham WHERE trang_thai = 1 AND id_dm = $idcate LIMIT $limit OFFSET $offset";
        return $this->db->getAll($sql);
    }

    function get_count_cate_pro($idcate)
    {
        $sql = "SELECT COUNT(*) as total FROM san_pham WHERE trang_thai = 1 AND id_dm = $idcate";
        $result = $this->db->getOne($sql);
        return $result['total'];
    }
    function getSearch($keyword, $limit, $offset)
    {
        $sql = "SELECT * FROM san_pham WHERE trang_thai = 1 AND ten LIKE '%$keyword%' OR mo_ta LIKE '%$keyword%' LIMIT $limit OFFSET $offset";
        return $this->db->getAll($sql);
    }
    function get_count_search($keyword)
    {
        $sql = "SELECT COUNT(*) as total FROM san_pham WHERE trang_thai = 1 AND ten LIKE '%$keyword%' OR mo_ta LIKE '%$keyword%'";
        $result = $this->db->getOne($sql);
        return $result['total'];
    }
    public function filterProducts($filters)
    {
        $query = "SELECT * FROM products WHERE 1";  // Điều kiện mặc định

        // Nếu có bộ lọc, thêm vào câu truy vấn
        if (!empty($filters)) {
            $query .= " AND " . implode(" AND ", $filters);
        }

        // Thực thi câu truy vấn và trả về kết quả
        $result = $this->db->query($query);
        return $result->fetchAll();
    }
    function getAllPro($offset, $limit)
    {
        $sql = "SELECT * FROM san_pham LIMIT $limit OFFSET $offset";
        return $this->db->getAll($sql);
    }
    function getCountAllPro()
    {
        $sql = "SELECT COUNT(*) as total FROM san_pham";
        $result = $this->db->getOne($sql);
        return $result['total'];
    }
    function insertPro($data)
    {
        try {
            $this->db->beginTransaction();

            $sqlProduct = "INSERT INTO san_pham(id_dm, ten, gia, mo_ta, hot, chat_lieu, so_luong) VALUES(?,?,?,?,?,?,?)";
            $paramProduct = [
                $data['idcate'],
                $data['name'],
                $data['price'],
                $data['description'],
                $data['hot'],
                $data['material'],
                $data['amount']
            ];

            // Thêm sản phẩm và lấy ID của sản phẩm vừa thêm
            $lastProductId = $this->db->insert($sqlProduct, $paramProduct);

            // Thêm hình ảnh vào bảng hinh_anh_san_pham
            $sqlImage = "INSERT INTO hinh_anh(id_sp, anh_chinh, album1, album2, album3) VALUES(?,?,?,?,?)";
            $paramImage = [
                $lastProductId,
                $data['anh_chinh'],
                $data['album1'],
                $data['album2'],
                $data['album3']
            ];
            $this->db->insert($sqlImage, $paramImage);

            // Xác nhận giao dịch
            $this->db->commit();

            return $lastProductId;
        } catch (Exception $e) {
            // Hoàn tác nếu có lỗi
            $this->db->rollBack();
            throw $e; // Ném lỗi để controller xử lý
        }
    }
    function updatePro($data)
    {
        try {
            // Bắt đầu transaction
            $this->db->beginTransaction();

            $sqlProduct = "UPDATE san_pham SET id_dm = ?, ten = ?, gia = ?, mo_ta = ?, hot = ?, chat_lieu = ?, so_luong = ?, trang_thai = ? WHERE id = ?";
            $paramProduct = [
                $data['idcate'],
                $data['name'],
                $data['price'],
                $data['description'],
                $data['hot'],
                $data['material'],
                $data['amount'],
                $data['status'],
                $data['id']
            ];
            $this->db->update($sqlProduct, $paramProduct);

            $sqlImage = "UPDATE hinh_anh SET anh_chinh = ?, album1 = ?, album2 = ?, album3 = ? WHERE id_sp = ?";
            $paramImage = [
                $data['anh_chinh'],
                $data['album1'],
                $data['album2'],
                $data['album3'],
                $data['id']
            ];
            $this->db->update($sqlImage, $paramImage);

            // Commit transaction
            $this->db->commit();
        } catch (Exception $e) {
            // Rollback nếu có lỗi
            $this->db->rollBack();
            throw $e; // Ném lỗi để controller xử lý
        }
    }
    function deletePro($id)
    {
        try {
            // Bắt đầu transaction để đảm bảo tính toàn vẹn dữ liệu
            $this->db->beginTransaction();

            // Xóa các dữ liệu liên quan trước (ví dụ: hình ảnh)
            $sqlDeleteImages = "DELETE FROM hinh_anh WHERE id_sp = ?";
            $this->db->delete($sqlDeleteImages, [$id]);

            // Xóa sản phẩm
            $sqlDeleteProduct = "DELETE FROM san_pham WHERE id = ?";
            $this->db->delete($sqlDeleteProduct, [$id]);

            // Commit transaction
            $this->db->commit();
        } catch (Exception $e) {
            // Rollback nếu có lỗi
            $this->db->rollBack();
            throw $e; // Ném lỗi để controller xử lý
        }
    }
    function checkOrder($id_kh, $id_sp)
    {
        $sql = "SELECT * FROM chi_tiet_don_hang WHERE id_dh IN (SELECT id FROM don_hang WHERE id_kh = $id_kh AND trang_thai = 'Đã xác nhận') AND id_sp = $id_sp";
        return $this->db->getAll($sql);
    }
    function checkReview($id_kh, $id_sp)
    {
        $sql = "SELECT * FROM danh_gia WHERE id_sp = $id_sp AND id_kh = $id_kh";
        return $this->db->getAll($sql);
    }
    function addReview($data)
    {
        $sql = "INSERT INTO danh_gia(id_sp,id_kh,noi_dung,diem_danh_gia,file) VALUES (?,?,?,?,?)";
        $param = [$data['productid'], $data['userid'], $data['content'], $data['rate'], $data['file']];
        $this->db->insert($sql, $param);
    }
    function getAllReview($limit, $offset)
    {
        $sql = "SELECT * FROM danh_gia LIMIT $limit OFFSET $offset";
        return $this->db->getAll($sql);
    }
    function getAllReviewId($id, $offset, $limit)
    {
        $sql = "SELECT * FROM danh_gia WHERE trang_thai = 1 AND id_sp = $id LIMIT $limit OFFSET $offset";
        return $this->db->getAll($sql);
    }
    function getCountReview($id)
    {
        $sql = "SELECT COUNT(*) as total FROM danh_gia WHERE trang_thai = 1 AND id_sp = $id";
        $result = $this->db->getOne($sql);
        return $result['total'];
    }
    function getCountAllReview()
    {
        $sql = "SELECT COUNT(*) as total FROM danh_gia";
        $result = $this->db->getOne($sql);
        return $result['total'];
    }
    function reviewStatus($data)
    {
        $sql = "UPDATE danh_gia SET trang_thai = ? WHERE id = ?";
        $param = [$data['status'],$data['id']];
        $this->db->update($sql, $param);
    }
}
