

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
        $data['balance_sum'] = $this->EmployeeModel->get_balance_sum();
        $data['amount_sum'] = $this->EmployeeModel->get_amount_sum();
        $data['credit_sum'] = $this->EmployeeModel->get_credit_sum();
        $this->load->view('frondend/costumers',$data);
        $this->load->view('template/footer');
    }

public function costumer_details($id){

    $this->load->view('template/header');
    $this->load->model("EmployeeModel");
    $data['costumer']= $this->EmployeeModel->get_customer_history($id);

    $this->load->view('frondend/costumer_details',$data);
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
    public function store(){
        // $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone No', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('credit', 'Credit', 'required');
        // $this->form_validation->set_rules('debit', 'Debit', 'required');
        // $this->form_validation->set_rules('balance', 'Balance', 'required');
    
        if($this->form_validation->run()){
            $data = [
                "name" => $this->input->post('name'),
                "phone" => $this->input->post('phone'),
                "date" => $this->input->post('date'),
                "amount" => $this->input->post('amount'),
                "credit" => $this->input->post('credit'),
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
    
public function edit($id){
    $this->load->view('template/header');

    $this->load->model('EmployeeModel',"emp");
  $data['employee']= $this->emp->editEmployee($id);


  $this->load->view('frondend/edit',$data);
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

public function delete($id){

    $this->load->model('EmployeeModel',"emp");
    $this->emp->deleteEmployee($id);
    redirect(base_url('employee/emp'));
}

// public function confirmDelete($id){

//     $this->load->model('EmployeeModel',"emp");
//     $data['employee']= $this->emp->editEmployee($id);

// }

}
?>