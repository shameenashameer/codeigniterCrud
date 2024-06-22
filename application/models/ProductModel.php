<?php

class ProductModel extends CI_Model
{
public function __construct(){

    parent::__construct();
$this->load->helper("form");
$this->load->library("form-validation");
}

public function insertProducts($data){

    return $this->db->insert('products', $data);
}

}
?>