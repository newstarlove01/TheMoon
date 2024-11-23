<?php
class CartController {
    public function view($view){
        require_once "app/view/$view.php";
    }
    public function cart() {
        $this->view('cart');
    }
    public function payment() {
        $this->view('pay');
    }
}