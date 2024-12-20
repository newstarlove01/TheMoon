<?php
require_once('app/model/InformationModel.php');
require_once('app/model/ProductModel.php');
class HomeController
{
    private $product;
    private $meet;
    private $banner;
    private $data;
    //$data = {dsdm: [], dssp: []}
    function __construct()
    {
        $this->banner = new InformationModel();
        $this->product = new ProductModel();
    }
    public function view($data)
    {
        require_once 'app/view/home.php';
    }
    function home()
    {
        $this->data['banner'] = $this->banner->getBanner();
        $this->data['dsspgt'] = $this->product->getProduct(3);
        foreach ($this->data['dsspgt'] as &$product) {
            $product['img'] = $this->product->getImg($product['id']) ?? []; 
        }
        $this->data['dssp'] = $this->product->getProduct(2);
        $this->data['dssp'] = $this->product->getProduct(2);
        foreach ($this->data['dssp'] as &$product) {
            $product['img'] = $this->product->getImg($product['id']) ?? []; 
        }
        // var_dump( $this->data['dssp']);
        $this->data['dssphot'] = $this->product->getProduct(1);
        foreach ($this->data['dssphot'] as &$product) {
            $product['img'] = $this->product->getImg($product['id']) ?? []; 
        }
        $this->data['dsm'] = $this->banner->getMeet();
        $this->view($this->data);
    }
}
