<?php

class CategoryModel
{
    private $db;
    function __construct()
    {
        $this->db = new Database();
    }
    function getCate()
    {
        $sql = "SELECT * FROM danh_muc";
        return $this->db->getAll($sql);
    }
    function insertCate($data)
    {
        $sql = "INSERT INTO danh_muc(ten,mo_ta,hinh_anh) VALUES(?,?,?)";
        $param = [$data['name'], $data['description'], $data['image']];
        return $this->db->insert($sql, $param);
    }
    function updateCate($data)
    {
        $sql = "UPDATE danh_muc SET ten = ?, mo_ta = ?, hinh_anh = ? WHERE id = ?";
        $param = [$data['name'], $data['description'], $data['image'], $data['id']];
        return $this->db->update($sql, $param);
    }
    function delCate($id)
    {
        $sql = "DELETE FROM danh_muc WHERE id = ?";
        $this->db->delete($sql, [$id]);
    }
    function getIdcate($id)
    {
        $sql = "SELECT * FROM danh_muc WHERE id = $id";
        return $this->db->getOne($sql);
    }
    function getAllCate($offset, $limit)
    {
        $sql = "SELECT * FROM danh_muc LIMIT $limit OFFSET $offset";
        return $this->db->getAll($sql);
    }
    function getCountAllCate()
    {
        $sql = "SELECT COUNT(*) as total FROM danh_muc";
        $result = $this->db->getOne($sql);
        return $result['total'];
    }
}
