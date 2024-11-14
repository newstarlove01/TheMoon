<?php 
class ProductController{
    private $product;
    private $meet;
    private $data;
    //$data = {dsdm: [], dssp: []}
    function __construct(){
        // $this->product = new ProductModel();
        // $this->meet = new MeetModel();
    }
    public function view($data){
        require_once 'app/view/product.php';
    }
    function product(){
        // $this->data['dssp'] = $this->product->getProduct(1);
        // $this->data['dsm'] = $this->meet->getMeet();
        $this->view($this->data);
    }
 }
?>