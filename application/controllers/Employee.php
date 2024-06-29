

<?php
class Employee extends CI_Controller{

    public function landing_page(){

        $this->load->view('template/header');

        // $this->load->model("EmployeeModel");

        // $data['employee']= $this->EmployeeModel->getCostomerDataWithBalance();

        $this->load->view('frondend/landing_page');
        $this->load->view('template/footer');
        
    }
    // public function costomers(){

    //     $this->load->view('template/header');   

    //     $this->load->view('frondend/costumers');

    //     $this->load->view('template/footer');
    // } 
    public function stocks(){

        $this->load->view('template/header');   

        $this->load->view('frondend/stocks');

        $this->load->view('template/footer');
    } 
    public function staffs(){

        $this->load->view('template/header');   

        $this->load->view('frondend/staffs');

        $this->load->view('template/footer');
    } 

    public function costumers(){

        // $this->load->database();

        $this->load->view('template/header');

        $this->load->model("EmployeeModel");
    //    $data['employee']= $this->EmployeeModel->getEmployee();

        $data['employee']= $this->EmployeeModel->getCostomerDataWithBalance();
    //    $custumer_id= $data->id;
        // $data['costomer']= $this->EmployeeModel->get_customer_history($custumer_id);
        // $data['costomer_balance_sum'] = $this->EmployeeModel->get_costomer_balance_sum($employee->id);
        $data['balance_sum'] = $this->EmployeeModel->get_balance_sum();
        $data['amount_sum'] = $this->EmployeeModel->get_amount_sum();
        $data['credit_sum'] = $this->EmployeeModel->get_credit_sum();
        $this->load->view('frondend/costumers',$data);
        $this->load->view('template/footer');
    }
    public function shops(){

        // $this->load->database();

        $this->load->view('template/header');

        $this->load->model("EmployeeModel");
    //    $data['employee']= $this->EmployeeModel->getEmployee();

        $data['shops']= $this->EmployeeModel->getShops();
    //    $custumer_id= $data->id;
        // $data['costomer']= $this->EmployeeModel->get_customer_history($custumer_id);
        // $data['costomer_balance_sum'] = $this->EmployeeModel->get_costomer_balance_sum($employee->id);
        $data['balance_sum'] = $this->EmployeeModel->get_stocks_balance_sum();
        $data['amount_sum'] = $this->EmployeeModel->get_stocks_amount_sum();
        $data['credit_sum'] = $this->EmployeeModel->get_stocks_debit_sum();
        $this->load->view('frondend/shops',$data);
        $this->load->view('template/footer');
    }

public function costumer_details($id){

    $this->load->view('template/header');
    $this->load->model("EmployeeModel");
    $data['customer']= $this->EmployeeModel->getCostomerPurchaseDataWithBalance($id);
    // $data['customer']= $this->EmployeeModel->getCostomerDataWithBalance();
    // $data['customer_purchases'] = $this->Customer_model->get_customer_history($id);
    // if (empty($data['customer'])) {
    //     show_404();
    // }
    $data['purchase']= $this->EmployeeModel->getCostomerPurchaseDetails($id);
    $data['balance_sum'] = $this->EmployeeModel->get_costomer_balance_sum($id);
    $data['amount_sum'] = $this->EmployeeModel->get_costumer_amount_sum($id);
    $data['credit_sum'] = $this->EmployeeModel->get_costomer_credit_sum($id);
    $this->load->view('frondend/costumer_details',$data);
    $this->load->view('template/footer');
}
public function shop_details($id){

    $this->load->view('template/header');
    $this->load->model("EmployeeModel");
    $data['shops']= $this->EmployeeModel->get_shop_details($id);
    // $data['customer']= $this->EmployeeModel->getCostomerDataWithBalance();
    // $data['customer_purchases'] = $this->Customer_model->get_customer_history($id);
    // if (empty($data['customer'])) {
    //     show_404();
    // }
    $data['stocks']= $this->EmployeeModel->get_stock_details($id);
    $data['balance_sum'] = $this->EmployeeModel->get_shop_stocks_balance_sum($id);
    $data['amount_sum'] = $this->EmployeeModel->get_stocks_amount_sum($id);
    $data['debit_sum'] = $this->EmployeeModel->get_stocks_debit_sum($id);
    $this->load->view('frondend/shop_details',$data);
    $this->load->view('template/footer');
}
// public function costumer_details($customer_id) {
//     $this->load->model('EmployeeModel');
//     $customer = $this->EmployeeModel->getCostomerDataWithBalance($customer_id);

//     // if ($customer) {
//         $data['customer'] = $customer;
//         // Assuming you have calculated sums for amount, credit, and balance.
//         // $data['amount_sum'] = $this->EmployeeModel->calculate_sum($customer_id, 'amount');
//         // $data['credit_sum'] = $this->EmployeeModel->calculate_sum($customer_id, 'credit');
//         // $data['balance_sum'] = $this->EmployeeModel->calculate_sum($customer_id, 'balance');
//         $this->load->view('frondend/costumer_details', $data);
//     // } else {
//     //     // Handle case where customer is not found
//     //     show_404();
//     // }
// }

    public function create(){

        $this->load->view('template/header');
        $this->load->view('frondend/create');
        $this->load->view('template/footer');
    }
    public function add_shop(){

        $this->load->view('template/header');
        $this->load->view('frondend/add_shop');
        $this->load->view('template/footer');
    }
    public function add_purchase($id){

        $this->load->view('template/header');
        $this->load->model("EmployeeModel");
    $data['customer']= $this->EmployeeModel->getCostomerPurchaseDataWithBalance($id);

        // $data['costumer']= $this->EmployeeModel->get_customer_history($id);
        // print_r($data['costumer']);
        // die;
        $this->load->view('frondend/add_purchase',$data);
        $this->load->view('template/footer');
    }
    public function add_stock($id){

        $this->load->view('template/header');
        $this->load->model("EmployeeModel");
    $data['shops']= $this->EmployeeModel->get_shop_details($id);

        // $data['costumer']= $this->EmployeeModel->get_customer_history($id);
        // print_r($data['costumer']);
        // die;
        $this->load->view('frondend/add_stock',$data);
        $this->load->view('template/footer');
    }
    public function store(){
        // $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone No', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        // $this->form_validation->set_rules('amount', 'Amount', 'required');
        // $this->form_validation->set_rules('credit', 'Credit', 'required');
        // $this->form_validation->set_rules('debit', 'Debit', 'required');
        // $this->form_validation->set_rules('balance', 'Balance', 'required');
    
        if($this->form_validation->run()){
            $data = [
                "name" => $this->input->post('name'),
                "phone" => $this->input->post('phone'),
                "date" => $this->input->post('date'),
                // "amount" => $this->input->post('amount'),
                // "credit" => $this->input->post('credit'),
                // "phone" => $this->input->post('debit'),
                "balance" => $this->input->post('balance')
            ];
    $this->load->model('EmployeeModel',"emp");

    $this->emp->insertEmployee($data);
            // Insert data into database
            // $this->db->insert('student_db', $data);
            
            // Redirect to employee list page
            // redirect(base_url('employee/emp'));

            $this->session->set_flashdata('status', 'Costumer data inserted successfully');
            redirect(base_url('employee/costumers'));
        }
        else {
            redirect('employee/create');
        }
    }
    public function shop_store(){
        // $this->load->library('form_validation');
        $this->form_validation->set_rules('shop_name', 'Shop Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone No', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        // $this->form_validation->set_rules('amount', 'Amount', 'required');
        // $this->form_validation->set_rules('credit', 'Credit', 'required');
        // $this->form_validation->set_rules('debit', 'Debit', 'required');
        // $this->form_validation->set_rules('balance', 'Balance', 'required');
    
        if($this->form_validation->run()){
            $data = [
                "shop_name" => $this->input->post('shop_name'),
                "phone" => $this->input->post('phone'),
                "date" => $this->input->post('date'),
                // "amount" => $this->input->post('amount'),
                // "credit" => $this->input->post('credit'),
                // "phone" => $this->input->post('debit'),
                "balance" => $this->input->post('balance')
            ];
    $this->load->model('EmployeeModel',"emp");

    $this->emp->insertShop($data);
            // Insert data into database
            // $this->db->insert('student_db', $data);
            
            // Redirect to employee list page
            // redirect(base_url('employee/emp'));

            $this->session->set_flashdata('status', 'Shop details inserted successfully');
            redirect(base_url('employee/shops'));
        }
        else {
            redirect('employee/add_shop');
        }
    }
    public function purchase_store($id){
        // $this->load->library('form_validation');
        // $this->form_validation->set_rules('name', 'Name', 'required');
        // $this->form_validation->set_rules('phone', 'Phone No', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('credit', 'Credit', 'required');
        // $this->form_validation->set_rules('debit', 'Debit', 'required');
        // $this->form_validation->set_rules('balance', 'Balance', 'required');
    
        if($this->form_validation->run()){
            $data = [
                // "name" => $this->input->post('name'),
                // "phone" => $this->input->post('phone'),
                "date" => $this->input->post('date'),
                "amount" => $this->input->post('amount'),
                "credit" => $this->input->post('credit'),
                // "phone" => $this->input->post('debit'),
                "balance" => $this->input->post('balance')
            ];
    $this->load->model('EmployeeModel',"emp");

    $this->emp->insert_purchase($data,$id);
            // Insert data into database
            // $this->db->insert('student_db', $data);
            
            // Redirect to employee list page
            // redirect(base_url('employee/emp'));

            $this->session->set_flashdata('status', 'New Purchase inserted successfully');
            redirect(base_url('employee/costumer_details/'.$id));
        }
        else {
            redirect('employee/create');
        }
    }
    public function stock_store($id){
        // $this->load->library('form_validation');
        // $this->form_validation->set_rules('name', 'Name', 'required');
        // $this->form_validation->set_rules('phone', 'Phone No', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('debit', 'Debit', 'required');
        // $this->form_validation->set_rules('debit', 'Debit', 'required');
        // $this->form_validation->set_rules('balance', 'Balance', 'required');
    
        if($this->form_validation->run()){
            $data = [
                // "name" => $this->input->post('name'),
                // "phone" => $this->input->post('phone'),
                "date" => $this->input->post('date'),
                "amount" => $this->input->post('amount'),
                "debit" => $this->input->post('debit'),
                // "phone" => $this->input->post('debit'),
                "balance" => $this->input->post('balance')
            ];
    $this->load->model('EmployeeModel',"emp");

    $this->emp->insert_stock($data,$id);
            // Insert data into database
            // $this->db->insert('student_db', $data);
            
            // Redirect to employee list page
            // redirect(base_url('employee/emp'));

            $this->session->set_flashdata('status', 'New Stock inserted successfully');
            redirect(base_url('employee/shop_details/'.$id));
        }
        else {
            redirect('employee/add_stock');
        }
    }
    
public function edit($id){
    $this->load->view('template/header');

    $this->load->model('EmployeeModel',"emp");
  $data['employee']= $this->emp->editEmployee($id);


  $this->load->view('frondend/edit',$data);
  $this->load->view('template/footer');

}
public function edit_purchase($id){
    $this->load->view('template/header');

    $this->load->model('EmployeeModel',"emp");
  $data['purchase']= $this->emp->edit_purchase($id);


  $this->load->view('frondend/edit_purchase',$data);
  $this->load->view('template/footer');

}
public function edit_shop($id){
    $this->load->view('template/header');

    $this->load->model('EmployeeModel',"emp");
  $data['shops']= $this->emp->edit_shop($id);


  $this->load->view('frondend/edit_shop',$data);
  $this->load->view('template/footer');

}
public function update($id)  {


    // $this->form_validation->set_rules('name', 'Name', 'required');
    // $this->form_validation->set_rules('phone', 'Phone No', 'required');
    // $this->form_validation->set_rules('date', 'Date', 'required');
    // $this->form_validation->set_rules('amount', 'Amount', 'required');
    // $this->form_validation->set_rules('credit', 'Credit', 'required');
    // $this->form_validation->set_rules('balance', 'Balance', 'required');
    // if($this->form_validation->run()){


    $data = [
        "name" => $this->input->post('name'),
        "phone" => $this->input->post('phone'),
        "date" => $this->input->post('date'),
        "amount" => $this->input->post('amount'),
        "credit" => $this->input->post('credit'),
        "balance" => $this->input->post('balance')
    ];

// var_dump($data);

// die();
$this->load->model('EmployeeModel',"emp");
  $this->emp->updateEmployee($data,$id);
  $this->session->set_flashdata('update', 'Costumer data updated successfully');
redirect(base_url('employee/costumers'));
}
// else{
//     $this->edit($id);
// }
// }
public function update_purchase($id)  {


    // $this->form_validation->set_rules('name', 'Name', 'required');
    // $this->form_validation->set_rules('phone', 'Phone No', 'required');
    // $this->form_validation->set_rules('date', 'Date', 'required');
    // $this->form_validation->set_rules('amount', 'Amount', 'required');
    // $this->form_validation->set_rules('credit', 'Credit', 'required');
    // $this->form_validation->set_rules('balance', 'Balance', 'required');
    // if($this->form_validation->run()){


    $data = [
        // "name" => $this->input->post('name'),
        // "phone" => $this->input->post('phone'),
        "date" => $this->input->post('date'),
        "amount" => $this->input->post('amount'),
        "credit" => $this->input->post('credit'),
        "balance" => $this->input->post('balance')
    ];

// var_dump($data);

// die();
$this->load->model('EmployeeModel',"emp");
  $this->emp->update_purchase($data,$id);
  $this->session->set_flashdata('update', 'Purchase details updated successfully');
redirect(base_url('employee/costumer_details/'.$id));
}
// else{
//     $this->edit($id);
// }
// }
public function update_shop($id)  {


    // $this->form_validation->set_rules('name', 'Name', 'required');
    // $this->form_validation->set_rules('phone', 'Phone No', 'required');
    // $this->form_validation->set_rules('date', 'Date', 'required');
    // $this->form_validation->set_rules('amount', 'Amount', 'required');
    // $this->form_validation->set_rules('credit', 'Credit', 'required');
    // $this->form_validation->set_rules('balance', 'Balance', 'required');
    // if($this->form_validation->run()){


    $data = [
        "shop_name" => $this->input->post('shop_name'),
        "phone" => $this->input->post('phone'),
        "date" => $this->input->post('date'),
        // "amount" => $this->input->post('amount'),
        // "credit" => $this->input->post('credit'),
        "balance" => $this->input->post('balance')
    ];

// var_dump($data);

// die();
$this->load->model('EmployeeModel',"emp");
  $this->emp->update_shop($data,$id);
  $this->session->set_flashdata('update', 'Shop Details updated successfully');
redirect(base_url('employee/shops'));
}
// else{
//     $this->edit($id);
// }
// }

public function delete($id){

    $this->load->model('EmployeeModel',"emp");
    $this->emp->deleteEmployee($id);
    redirect(base_url('employee/costumers'));
}
public function shop_delete($id){

    $this->load->model('EmployeeModel',"emp");
    $this->emp->delete_shop($id);
    redirect(base_url('employee/shops'));
}


// public function confirmDelete($id){

//     $this->load->model('EmployeeModel',"emp");
//     $data['employee']= $this->emp->editEmployee($id);

// }

// public function details($id) {
//     // Load model
//     $this->load->model('Employee_model');
    
//     // Fetch customer details
//     $data['customer'] = $this->Employee_model->get_customer_by_id($id);
    
//     // Check if customer data is found
//     if (empty($data['customer'])) {
//         show_404(); // Show 404 page if customer not found
//     }

//     // Load the details view
//     $this->load->view('employee/details', $data);
// }

}
?>