<?php
require_once('app/model/InformationModel.php');
class InformationController
{
    private $information;
    private $data;
    function __construct()
    {
        $this->information = new InformationModel();
    }
    public function view($view, $data = [])
    {
        require_once 'app/view/' . $view . '.php';
    }
    function about (){
        $this->view('about');
    }
    function blog (){
        $this->data['blog'] = $this->information->getBLog();
        $this->view('blog',$this->data);
    }
    function blogDetail (){
        $id = $_GET['id'];
        $this->data['blog_detail'] = $this->information->getBLogDetail($id);
        $this->view('blog_detail',$this->data);
    }

}