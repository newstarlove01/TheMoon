<?php

class CategoryModel{
    private $db;
    function __construct(){
        $this->db = new Database();
    }
    function getCate(){
        $sql = "SELECT * FROM danh_muc";
        return $this->db->getAll($sql);
    }
    function insertCate($data){
        $sql = "INSERT INTO danh_muc(name,image) VALUES(?,?)";
        //$data =["name",...]
        $param =[$data['name'],$data['image']];
        return $this->db->insert($sql,$param);
    }
    function updateCate($data){
        $sql = "UPDATE danh_muc SET name = ?,image = ? WHERE id = ?";
        $param =[$data['name'],$data['image'],$data['id']];
        return $this->db->update($sql,$param);
    }
    function delCate($id) {
        $sql = "DELETE FROM danh_muc WHERE id = ?";
        $this->db->delete($sql,[$id]);
    }
    function getIdcate($id) {
        $sql = "SELECT * FROM danh_muc WHERE id = $id";
        return $this->db->getOne($sql);
    }
}