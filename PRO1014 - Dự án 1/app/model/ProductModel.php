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
        $sql = "SELECT * FROM san_pham";
        if ($sp == 1) {
            $sql .= " WHERE hot = 1 LIMIT 2";
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
        $sql = "SELECT * FROM san_pham WHERE id_dm = (SELECT id_dm FROM san_pham WHERE id=$id) LIMIT 4";
        return $this->db->getAll($sql);
    }

    function check_cate_pro($idcate)
    {
        $sql = "SELECT * FROM san_pham WHERE id_dm = $idcate";
        return $this->db->getAll($sql);
    }
    function get_all_cate_pro($idcate, $offset, $limit)
    {
        $sql = "SELECT * FROM san_pham WHERE id_dm = $idcate LIMIT $limit OFFSET $offset";
        return $this->db->getAll($sql);
    }

    function get_count_cate_pro($idcate)
    {
        $sql = "SELECT COUNT(*) as total FROM san_pham WHERE id_dm = $idcate";
        $result = $this->db->getOne($sql);
        return $result['total'];
    }
    function getSearch($keyword, $limit, $offset)
    {
        $sql = "SELECT * FROM san_pham WHERE ten LIKE '%$keyword%' OR mo_ta LIKE '%$keyword%' LIMIT $limit OFFSET $offset";
        return $this->db->getAll($sql);
    }
    function get_count_search($keyword)
    {
        $sql = "SELECT COUNT(*) as total FROM san_pham WHERE ten LIKE '%$keyword%' OR mo_ta LIKE '%$keyword%'";
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
    // function insertPro($data)
    // {
    //     $sql = "INSERT INTO san_pham(name,price,amount,image,view,idcate) VALUES(?,?,?,?,?,?)";
    //     $param = [$data['name'], $data['price'], $data['amount'], $data['image'], $data['view'], $data['idcate']];
    //     return $this->db->insert($sql, $param);
    // }
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
    // function updatePro($data)
    // {
    //     $sql = "UPDATE san_pham SET name = ?,amount = ?,image = ?,view = ?,price = ?,idcate = ? WHERE id = ?";
    //     $param = [$data['name'], $data['amount'], $data['image'], $data['view'], $data['price'], $data['idcate'], $data['id']];
    //     return $this->db->update($sql, $param);
    // }
    function updatePro($data)
    {
        try {
            // Bắt đầu transaction
            $this->db->beginTransaction();

            $sqlProduct = "UPDATE san_pham SET id_dm = ?, ten = ?, gia = ?, mo_ta = ?, hot = ?, chat_lieu = ?, so_luong = ? WHERE id = ?";
            $paramProduct = [
                $data['idcate'],
                $data['name'],
                $data['price'],
                $data['description'],
                $data['hot'],
                $data['material'],
                $data['amount'],
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
}
