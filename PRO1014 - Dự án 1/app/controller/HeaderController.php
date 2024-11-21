<?php
require_once ('app/model/CategoryModel.php');
class HeaderController{
    private $category;
    private $data;
    // $data = {dsdm: [], dssp: []}
    function __construct(){
        $this->category = new CategoryModel();
    }
    public function view($data){
        require_once 'app/view/header.php';
    }
    function header(){
        $this->data['dsdm'] = $this->category->getCate();
        // var_dump($this->data); // Kiểm tra giá trị của $this->data
        $this->view($this->data);
    }
 }