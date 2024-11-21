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
    // function getIdCate($idpro)
    // {
    //     $sql = "SELECT idcate FROM san_pham WHERE id = $idpro";
    //     return $this->db->getOne($sql);
    // }
    // function get_cate_pro($idpro,$idcate){
    //     $sql = "SELECT * FROM san_pham WHERE idcate = $idcate and id <> $idpro LIMIT 4";
    //     return $this->db->getAll($sql);
    // }
    // function insertPro($data){
    //     $sql = "INSERT INTO san_pham(name,price,amount,image,view,idcate) VALUES(?,?,?,?,?,?)";
    //     //$data =["name",...]
    //     $param =[$data['name'],$data['price'],$data['amount'],$data['image'],$data['view'],$data['idcate']];
    //     return $this->db->insert($sql,$param);
    // }
    // function deletePro($id){
    //     $sql = "DELETE FROM san_pham WHERE id = ?";
    //     return $this->db->delete($sql,[$id]);
    // }
    // function updatePro($data){
    //     $sql = "UPDATE san_pham SET name = ?,amount = ?,image = ?,view = ?,price = ?,idcate = ? WHERE id = ?";
    //     $param =[$data['name'],$data['amount'],$data['image'],$data['view'],$data['price'],$data['idcate'],$data['id']];
    //     return $this->db->update($sql,$param);
    // }
    function get_all_cate_pro($idcate)
    {
        $sql = "SELECT * FROM san_pham WHERE id_dm = $idcate";
        return $this->db->getall($sql);
    }
}
