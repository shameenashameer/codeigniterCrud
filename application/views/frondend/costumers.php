

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
                    <h5>Costumers
                        <a href="<?php echo base_url('employee/create');?>"class="btn btn-primary btn-sm float-right">Add Costumer</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderd" id="datatable1">
                        <thead>
<th>Id</th>
<th>Name</th>
<th>Phone No</th>
<th>Date</th>
<th>Amount</th>
<th>Credit</th>
<th>Balance</th>
<th>Edit</th>
<th>Delete</th>

                        </thead>
                        <tbody>

                        <?php
                        foreach($employee as $row):?>


<tr>
                           
                                <td> <?php echo $row->id; ?> </td>
                                <td> <a href="<?= base_url('employee/costumer_details/' . $row->id); ?>"><?php echo $row->name; ?> </a></td>
                                <td> <?php echo $row->phone; ?> </td>
                                <td> <?php echo $row->date; ?> </td>
                                <td style="color:blue"> <?php echo $row->amount; ?> </td>
                                <td style="color:green"> <?php echo $row->credit; ?> </td>
                                <td style="color:red"> <?php echo $row->balance; ?> </td>
                                <td>
                                    <a href="<?=base_url('employee/edit/'.$row->id);?>" class="btn btn-primary btn-sm">Edit</a> 
                                </td>
                                <td>
                                    <a href="<?php echo base_url('employee/delete/'.$row->id);?>" class="btn btn-danger btn-sm"
                                     onclick="return confirm('Are you sure to delete?') ">Delete</a>

                                </td>
                               
                                 
                             </tr>

                             <?php
                            endforeach;
                            ?>
                     <h5 style="color:blue">Total Amount: <?php echo $amount_sum; ?></h5>
                     <h5 style="color:green">Total Credit: <?php echo $credit_sum; ?></h5>                     
                     <h5 style="color:red">Total Balance: <?php echo $balance_sum; ?></h5>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

