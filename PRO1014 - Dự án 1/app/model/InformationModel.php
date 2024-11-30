<?php

class InformationModel{
    private $db;
    function __construct(){
        $this->db = new Database();
    }
    function getBanner(){
        $sql = "SELECT * FROM banner";
        return $this->db->getAll($sql);
    }
    function getMeet(){
        $sql = "SELECT * FROM meets";
        return $this->db->getAll($sql);
    }
    function getBLog(){
        $sql = "SELECT * FROM bai_viet";
        return $this->db->getAll($sql);
    }
    function getIdBLog($id){
        $sql = "SELECT * FROM bai_viet WHERE id = $id";
        return $this->db->getOne($sql);
    }
    function getBLogDetail($id){
        $sql = "SELECT * FROM bai_viet WHERE id = $id";
        return $this->db->getOne($sql);
    }
    function getCountAllBlog()
    {
        $sql = "SELECT COUNT(*) as total FROM bai_viet";
        $result = $this->db->getOne($sql);
        return $result['total'];
    }
    function insertBlog($data)
    {
        $sql = "INSERT INTO bai_viet(tieu_de,tom_tat,noi_dung,hinh_anh) VALUES(?,?,?,?)";
        $param = [$data['name'], $data['title'], $data['content'], $data['image']];
        return $this->db->insert($sql, $param);
    }
    function updateBlog($data)
    {
        $sql = "UPDATE bai_viet SET tieu_de = ?, tom_tat = ?, noi_dung = ?, hinh_anh = ? WHERE id = ?";
        $param = [$data['name'], $data['title'], $data['content'], $data['image'], $data['id']];
        return $this->db->update($sql, $param);
    }
    function delBlog($id)
    {
        $sql = "DELETE FROM bai_viet WHERE id = ?";
        $this->db->delete($sql, [$id]);
    }
}