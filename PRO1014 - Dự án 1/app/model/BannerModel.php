<?php

class BannerModel{
    private $db;
    function __construct(){
        $this->db = new Database();
    }
    function getBanner(){
        $sql = "SELECT * FROM banner";
        return $this->db->getAll($sql);
    }
}