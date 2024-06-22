
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
<?php if($this->session->flashdata('status')): ?>
                <div class="alert alert-success">
                   <?= $this->session->flashdata('status'); ?>
                </div>
                <?php else : ?>
                    <div class="alert alert-success">
                   <?= $this->session->flashdata('update'); ?>
                </div>
<?php endif; ?>
                    <h5>Employee data
                        <a href="<?php echo base_url('employee/create');?>"class="btn btn-primary btn-sm float-right">Add Employee</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderd" id="datatable1">
                        <thead>
<th>Id</th>
<th>Name</th>
<th>Phone No</th>
<th>Email</th>
<th>Edit</th>
<th>Delete</th>
<th>Confirm Delete</th>
                        </thead>
                        <tbody>

                        <?php
                        foreach($employee as $row):?>



                            
                             <tr>
                                <td> <?php echo $row->id; ?> </td>
                                <td> <?php echo $row->name; ?> </td>
                                <td> <?php echo $row->phone; ?> </td>
                                <td> <?php echo $row->email; ?> </td>
                                
                                <td>
                                    <a href="<?=base_url('employee/edit/'.$row->id);?>" class="btn btn-primary btn-sm">Edit</a> 
                                </td>
                                <td>
                                    <a href="<?php echo base_url('employee/delete/'.$row->id);?>" class="btn btn-danger btn-sm"
                                     onclick="return confirm('Are you sure to delete?') ">Delete</a>

                                </td>
                                <td>
                                    <!-- <a href="<?php echo base_url('employee/confirmDelete/'.$row->id);?>" 
                                    class="btn btn-danger btn-sm confirm-delete"  value=" <?php $row->id ?> ">  Confirm Delete</a> -->
<button class="btn btn-danger confirm-delete" value=" <?php $row->id ?> ">  Confirm Delete</button>                                </td>

                             </tr>

                             <?php
                            endforeach;
                            ?>
                     


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

   