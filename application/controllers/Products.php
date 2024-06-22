<?php
class Products extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
  public function add(){
$this->load->view('template/header');
    $this->load->view('products/add');
    $this->load->view('template/footer');
  }

//   public function store(){
//     $this->form_validation->set_rules('productName', 'Product Name', 'required');
//     $this->form_validation->set_rules('productPrice', 'Product Price', 'required');
//     $this->form_validation->set_rules('productDescription', 'Product Description', 'required');
//     $this->form_validation->set_rules('productImage', 'ProductImage', 'required');

//     if($this->form_validation->run()){
        

// $ori_filename=$_FILES['productImage']['name'];
// $new_filename=time()."".str_replace(' ', '_', $ori_filename);
// $config=[
//     'upload_path'=>'./images/',
//     'allowed_types'=>'gif|jpg|png',
//     'file_name'=>$new_filename,
// ];
// $this->load->library('upload',$config); 
// if ( ! $this->upload->do_upload('userfile'))
//                 {
//                         $imageError = array('imageError' => $this->upload->display_errors());

//                         // $this->load->view('upload_form');

//                         $this->load->view('template/header');
//                         $this->load->view('products/add',$imageError);
//                         $this->load->view('template/footer');
//                 }
//                 else
//                 {
//                        $prod_filename=$this->load->upload->data("file_name");
//                         $data = [
//                               "name" => $this->input->post('name'),
//                               "price" => $this->input->post('price'),
//                               "description" => $this->input->post('description')
//                               "image" =>$prod_filename
//                          ];


//                          $product=new ProductModel;
//                          $res=$product->insertProduct($data);
//                          $this->session->set_flashdata("status","Product Added Successfully");
//                          redirect(base_url('products/add'));
//                 }


public function store(){
    $this->form_validation->set_rules('productName', 'Product Name', 'required');
    $this->form_validation->set_rules('productPrice', 'Product Price', 'required');
    $this->form_validation->set_rules('productDescription', 'Product Description', 'required');
    $this->form_validation->set_rules('productImage', 'Product Image', 'required');

    if($this->form_validation->run()) {
        $ori_filename = $_FILES['image']['name'];
        $new_filename = time() . "_" . str_replace(' ', '_', $ori_filename);
        $config = [
            'upload_path' => './images/',
            'allowed_types' => 'gif|jpg|png',
            'file_name' => $new_filename,
        ];
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('productImage')) {
            $imageError = array('imageError' => $this->upload->display_errors());
            $this->load->view('template/header');
            $this->load->view('products/add', $imageError);
            $this->load->view('template/footer');
        } else {


/*


$data = array('upload_data' => $this->upload->data());
            $image_path = 'uploads/' . $data['upload_data']['file_name'];

            // Now you have the image path, you can save it into the database
            $this->load->model('image_model');
            $this->image_model->insert_image($image_path);

*/



            $prod_filename = $this->upload->data('productImage');
            $data = [
                "name" => $this->input->post('productName'),
                "price" => $this->input->post('productPrice'),
                "description" => $this->input->post('productDescription'),
                "image" => $prod_filename,
            ];

            $this->load->model('ProductModel');  
            $product = new ProductModel;
            $res = $product->insertProducts($data);
            $this->session->set_flashdata("status", "Product Added Successfully");
            redirect(base_url('products/add'));
        }
    
    } else {
        redirect('products/add');
    }
}


}


?>