<?php
// require_once ('app/model/CategoryModel.php');
// require_once ('app/model/ProductModel.php');
// require_once ('app/model/MeetModel.php');
class HomeController{
    private $product;
    private $meet;
    private $data;
    //$data = {dsdm: [], dssp: []}
    function __construct(){
        // $this->product = new ProductModel();
        // $this->meet = new MeetModel();
    }
    public function view($data){
        require_once 'app/view/home.php';
    }
    function home(){
        // $this->data['dssp'] = $this->product->getProduct(1);
        // $this->data['dsm'] = $this->meet->getMeet();
        $this->view($this->data);
    }
 }