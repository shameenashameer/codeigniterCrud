<?php

class EmployeeModel extends CI_Model
{


    public function getEmployee(){
        $query= $this->db->get('students');
        return $query->result();
    }
    public function getCostomerDataWithBalance(){
        $this->db->select('id,name,phone, date, amount, credit, (amount - credit) as balance');
        $query = $this->db->get('students');
        return $query->result();
    }
    public function get_customer_history($id) {
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('id', $id);
        $this->db->order_by('date', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_balance_sum() {
        $this->db->select_sum('balance');
        $query = $this->db->get('students');
        return $query->row()->balance;
    }
    
    public function get_amount_sum() {
        $this->db->select_sum('amount');
        $query = $this->db->get('students');
        return $query->row()->amount;
    }
    
    public function get_credit_sum() {
        $this->db->select_sum('credit');
        $query = $this->db->get('students');
        return $query->row()->credit;
    }
    
    public function insertEmployee($data)
    {
        $data['balance'] = $data['amount'] - $data['credit'];
        return $this->db->insert('students',$data);
        // return $query->result();
    }
public function editEmployee($id){

    $query = $this->db->get_where('students', ['id' => $id]);

    return $query->row();
    
}

public function updateEmployee($data,$id){


    $data['balance'] = $data['amount'] - $data['credit'];
   return $this->db->update('students',$data, ['id' => $id]);
}

public function deleteEmployee($id){

   return  $this->db->delete('students', ['id' => $id]);
}
public function calculate_sum($customer_id, $column) {
    $this->db->select_sum($column);
    $this->db->where('id', $customer_id);
    $query = $this->db->get('students'); // Assuming 'transactions' table exists
    $result = $query->row();
    return $result->$column;
}

}

?>