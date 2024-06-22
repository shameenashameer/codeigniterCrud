<?php

class EmployeeModel extends CI_Model
{


    public function getEmployee(){
        $query= $this->db->get('students');
        return $query->result();
    }
    
    public function insertEmployee($data)
    {
        return $this->db->insert('students',$data);
        // return $query->result();
    }
public function editEmployee($id){

    $query = $this->db->get_where('students', ['id' => $id]);

    return $query->row();
    
}

public function updateEmployee($data,$id){



   return $this->db->update('students',$data, ['id' => $id]);
}

public function deleteEmployee($id){

   return  $this->db->delete('students', ['id' => $id]);
}

}

?>