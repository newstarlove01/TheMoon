<?php
require_once ('app/model/CategoryModel.php');
require_once ('app/model/ProductModel.php');
class HeaderController{
    private $category;
    private $product;
    private $data;
    function __construct(){
        $this->category = new CategoryModel();
        $this->product = new ProductModel();
    }
    public function view($view, $data){
        require_once 'app/view/'.$view.'.php';
    }
    function header(){
        $this->data['dsdm'] = $this->category->getCate();
        // var_dump($this->data); // Kiểm tra giá trị của $this->data
        $this->view('header',$this->data);
    }
 }