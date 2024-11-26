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
    function getMeet(){
        $sql = "SELECT * FROM meets";
        return $this->db->getAll($sql);
    }
}