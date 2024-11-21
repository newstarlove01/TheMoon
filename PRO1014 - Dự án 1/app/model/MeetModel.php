<?php

class MeetModel{
    private $db;
    function __construct(){
        $this->db = new Database();
    }
    function getMeet(){
        $sql = "SELECT * FROM meets";
        return $this->db->getAll($sql);
    }
}