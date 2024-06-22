

<?php
class Employee extends CI_Controller{
    public function emp(){

        // $this->load->database();

        $this->load->view('template/header');

        $this->load->model("EmployeeModel");
       $data['employee']= $this->EmployeeModel->getEmployee();

        $this->load->view('frondend/employee',$data);
        $this->load->view('template/footer');
    }


    public function create(){

        $this->load->view('template/header');
        $this->load->view('frondend/create');
        $this->load->view('template/footer');
    }
    public function store(){
        // $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone No', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
    
        if($this->form_validation->run()){
            $data = [
                "name" => $this->input->post('name'),
                "phone" => $this->input->post('phone'),
                "email" => $this->input->post('email')
            ];
    $this->load->model('EmployeeModel',"emp");

    $this->emp->insertEmployee($data);
            // Insert data into database
            // $this->db->insert('student_db', $data);
            
            // Redirect to employee list page
            // redirect(base_url('employee/emp'));

            $this->session->set_flashdata('status', 'Employee data inserted successfully');
            redirect(base_url('employee/emp'));
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


    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('phone', 'Phone No', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    if($this->form_validation->run()){


    $data = [
        "name" => $this->input->post('name'),
        "phone" => $this->input->post('phone'),
        "email" => $this->input->post('email'),
    ];

// var_dump($data);

// die();
$this->load->model('EmployeeModel',"emp");
  $this->emp->updateEmployee($data,$id);
  $this->session->set_flashdata('update', 'Employee data updated successfully');
redirect(base_url('employee/emp'));
}
else{
    $this->edit($id);
}
}

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