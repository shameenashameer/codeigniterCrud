<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-header h5 {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .totals h5 {
            margin: 0;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <?php if($this->session->flashdata('status')): ?>
                            <div class="alert alert-success">
                                <?= $this->session->flashdata('status'); ?>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-success">
                                <?= $this->session->flashdata('update'); ?>
                            </div>
                        <?php endif; ?>
                        <h5>
                        Customer Name : <?php echo $customer[0]->name; ?>
                                    <a href="<?php echo base_url('employee/add_purchase/'.$customer[0]->id); ?>" class="btn btn-primary btn-sm float-right">Add new purchase</a>
                                    <a href="<?php echo base_url('employee/costumers');?>" class="btn btn-danger btn-sm float-right btn-back">Back</a>

                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="datatable1">
                            <thead>
                                <tr class="text-center">
                                    <th>Sl No</th>
                                    <!-- <th>Name</th>
                                    <th>Phone No</th> -->
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Credit</th>
                                    <th>Balance</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <h5>
                                </h5>
                                <?php foreach($purchase as $row): ?>
                                    <tr class="text-center">
                                        <td><?php echo $row->id; ?></td>
                                        <!-- <td><?php echo $row->name; ?></td>
                                        <td><?php echo $row->phone; ?></td> -->
                                        <td><?php echo $row->date; ?></td>
                                        <td style="color:blue"><?php echo $row->amount; ?></td>
                                        <td style="color:green"><?php echo $row->credit; ?></td>
                                        <td style="color:red"><?php echo $row->balance; ?></td>
                                        <td>
                                            <a href="<?=base_url('employee/edit/'.$row->id);?>" class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('employee/delete/'.$row->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- Uncomment these lines if you need to show total amounts -->
                        <!-- <div class="totals text-center">
                            <h5 style="color:blue">Total Amount: <?php echo $amount_sum; ?></h5>
                            <h5 style="color:green">Total Credit: <?php echo $credit_sum; ?></h5>
                            <h5 style="color:red">Total Balance: <?php echo $balance_sum; ?></h5>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
