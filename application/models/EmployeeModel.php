<?php

class EmployeeModel extends CI_Model
{


    public function getEmployee(){
        $query= $this->db->get('students');
        return $query->result();
    }
    // public function getCostomerDataWithBalance(){
    //     $this->db->select('id,name,phone, date, amount, credit, (amount - credit) as balance');
    //     // $this->db->where('id', $id);
    //     $query = $this->db->get('students');
    //     return $query->result();
    // }
    public function getCostomerDataWithBalance() {
        $this->db->select('students.id, students.name, students.phone, MAX(purchases.date) as date, SUM(purchases.amount) as total_amount, SUM(purchases.credit) as total_credit, SUM(purchases.amount - purchases.credit) as balance_sum');
        $this->db->from('students');
        $this->db->join('purchases', 'students.id = purchases.customer_id', 'left');
        $this->db->group_by('students.id');
        $query = $this->db->get();
        return $query->result();
    }
    public function getShops() {
        $this->db->select('shops.id, shops.shop_name, shops.phone, MAX(stocks.date) as date, SUM(stocks.amount) as total_amount, SUM(stocks.debit) as total_debit, SUM(stocks.amount - stocks.debit) as balance_sum');
        $this->db->from('shops');
        $this->db->join('stocks', 'shops.id = stocks.shop_id', 'left');
        $this->db->group_by('shops.id');
        $query = $this->db->get();
        return $query->result();
    }
    public function getCostomerPurchaseDataWithBalance($id){
        $this->db->select('id,name,phone, date, amount, credit, (amount - credit) as balance');
        $this->db->where('id', $id);
        $query = $this->db->get('students');
        return $query->result();
    }
    public function get_shop_details($id){
        $this->db->select('id,shop_name,phone, date, amount, debit, (amount - debit) as balance');
        $this->db->where('id', $id);
        $query = $this->db->get('shops');
        return $query->result();
    }
    public function get_stock_details($id){
        $this->db->select('id, date, amount, debit, (amount - debit) as balance');
        $this->db->where('shop_id', $id);
        $query = $this->db->get('stocks');
        return $query->result();
    }
    public function getCostomerPurchaseDetails($id){
        $this->db->select('id,date, amount, credit, (amount - credit) as balance');
        $this->db->where('customer_id', $id);
        $query = $this->db->get('purchases');
        return $query->result();
    }
    public function get_customer_history($id) {
        $this->db->select('purchases.*, students.name as customer_name');

        $this->db->from('purchases');
    $this->db->join('students', 'purchases.customer_id = students.id');
    $this->db->where('purchases.customer_id', $id);
        $this->db->order_by('date', 'desc');
        $query = $this->db->get();
        return $query->result();
        
    }
//     public function get_purchases($id) {
//         $this->db->select('purchases.*, students.name as customer_name');
//         $this->db->from('purchases');
//         $this->db->join('students', 'purchases.customer_id = students.id');
//        $this->db->where('purchases.customer_id', $id);
//  $query = $this->db->get();
//         return $query->result_array();
//     }
    public function get_balance_sum() {
        $this->db->select_sum('balance');
        $query = $this->db->get('purchases');
        return $query->row()->balance;
    }
    public function get_stocks_balance_sum() {
        $this->db->select_sum('balance');
        $query = $this->db->get('stocks');
        return $query->row()->balance;
    }
    public function get_shop_stocks_balance_sum($id) {
        $this->db->select_sum('balance');
        $this->db->where('shop_id', $id);
        $query = $this->db->get('stocks');
        return $query->row()->balance;
    }
    public function get_stocks_amount_sum() {
        $this->db->select_sum('amount');
        $query = $this->db->get('stocks');
        return $query->row()->amount;
    }
    public function get_stocks_debit_sum() {
        $this->db->select_sum('debit');
        $query = $this->db->get('stocks');
        return $query->row()->debit;
    }
    public function get_costomer_balance_sum($id) {
        $this->db->select_sum('balance');
        $this->db->where('customer_id', $id);
        $query = $this->db->get('purchases');
        return $query->row()->balance;
    }
    public function get_costumer_amount_sum($id) {
        $this->db->select_sum('amount');
        $this->db->where('customer_id', $id);
        $query = $this->db->get('purchases');
        return $query->row()->amount;
    }
    public function get_costomer_credit_sum($id) {
        $this->db->select_sum('credit');
        $this->db->where('customer_id', $id);
        $query = $this->db->get('purchases');
        return $query->row()->credit;
    }
    
    public function get_amount_sum() {
        $this->db->select_sum('amount');
        $query = $this->db->get('purchases');
        return $query->row()->amount;
    }
    
    public function get_credit_sum() {
        $this->db->select_sum('credit');
        $query = $this->db->get('purchases');
        return $query->row()->credit;
    }
    
    public function insertEmployee($data)
    {
        $data['balance'] = $data['amount'] - $data['credit'];
        return $this->db->insert('students',$data);
        // return $query->result();
    }
    public function insertShop($data)
    {
        $data['balance'] = $data['amount'] - $data['credit'];
        return $this->db->insert('shops',$data);
        // return $query->result();
    }
    public function insert_purchase($data,$id)
    {
        
        // $data['name'] = $data['id'] - $data['credit'];
        $data['balance'] = $data['amount'] - $data['credit'];
        $data['customer_id'] = $id;
        return $this->db->insert('purchases',$data);
        // return $query->result();
    }
    public function insert_stock($data,$id)
    {
        
        // $data['name'] = $data['id'] - $data['credit'];
        $data['balance'] = $data['amount'] - $data['debit'];
        $data['shop_id'] = $id;
        return $this->db->insert('stocks',$data);
        // return $query->result();
    }
public function editEmployee($id){

    $query = $this->db->get_where('students', ['id' => $id]);

    return $query->row();
    
}
public function edit_purchase($id){

    $query = $this->db->get_where('purchases', ['customer_id' => $id]);

    return $query->row();
    
}
public function edit_shop($id){

    $query = $this->db->get_where('shops', ['id' => $id]);

    return $query->row();
    
}

public function updateEmployee($data,$id){


    $data['balance'] = $data['amount'] - $data['credit'];
   return $this->db->update('students',$data, ['id' => $id]);
}
public function update_purchase($data,$id){


    $data['balance'] = $data['amount'] - $data['credit'];
   return $this->db->update('purchases',$data, ['id' => $id]);
}
public function update_shop($data,$id){


    // $data['balance'] = $data['amount'] - $data['credit'];
   return $this->db->update('shops',$data, ['id' => $id]);
}

public function deleteEmployee($id){

   return  $this->db->delete('students', ['id' => $id]);
}
public function delete_shop($id){

   return  $this->db->delete('shops', ['id' => $id]);
}
public function purchase_delete($id){

   return  $this->db->delete('purchases', ['id' => $id]);
}
public function calculate_sum($customer_id, $column) {
    $this->db->select_sum($column);
    $this->db->where('id', $customer_id);
    $query = $this->db->get('students'); // Assuming 'transactions' table exists
    $result = $query->row();
    return $result->$column;
}

public function get_customer_by_id($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('customers'); // Assuming 'customers' is your table name
    return $query->row();
}
}

?>