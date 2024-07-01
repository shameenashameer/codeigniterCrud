<!-- 
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>How to add empolee data into database
                        <a href="<?php echo base_url('employee/emp');?>"class="btn btn-danger btn-sm float-right">Back</a>
                    </h5>
                </div>
                <div class="card-body">
          <form action="<?php echo base_url('employee/store') ?>" method="POST">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-controll">
                <small><?php echo form_error('name'); ?></small>
            </div>
            <div class="form-group">
                <label for="">Phone No</label>
                <input type="text" name="phone" class="form-controll">
                <small><?php echo form_error('phone'); ?></small>

            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-controll">
                <small><?php echo form_error('email'); ?></small>

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button> 
            </div>
          </form>
                </div>
            </div>
        </div>
    </div>
</div> -->






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Stock</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom styles */
    .card {
      margin-top: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    .card-header {
      background-color: #007bff;
      color: #fff;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-control {
      width: 100%;
      border: 1px solid #ced4da;
      border-radius: 5px;
      padding: 8px;
    }
    .btn-back {
      margin-top: -5px;
    }
    .error-message {
      color: #dc3545;
      font-size: 12px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-4">
      <div class="card">
        <div class="card-header">
          <h5>Add New Stock
            <a href="<?php echo base_url('employee/shop_details/'.$shops[0]->id);?>" class="btn btn-danger btn-sm float-right btn-back">Back</a>
          </h5>
        </div>
        <div class="card-body">
          <form action="<?php echo base_url('employee/stock_store/'.$shops[0]->id) ?>" method="POST">
            <!-- <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name"value="<?= $customer[0]->name ?>" class="form-control" readonly>
              <small ><?php echo form_error('name'); ?></small>

            </div> -->
            <!-- <div class="form-group">
              <label for="phone">Phone No</label>
              <input type="text" name="phone" value="" class="form-control">
              <small><?php echo form_error('phone'); ?></small>

            </div> -->
              <div class="form-group">
                <label for="phone">Date</label>
                <input type="date" id="date" name="date" value="" class="form-control">
                <small><?php echo form_error('date'); ?></small>
  
              </div>
              <div class="form-group">

              <label for="phone">Amount</label>
              <input type="text" name="amount" value="" class="form-control">
              <small><?php echo form_error('amount'); ?></small>

            </div>
            <div class="form-group">
              <label for="email">Debit</label>
              <input type="text" name="debit" value="" class="form-control">
              <small ><?php echo form_error('debit'); ?></small>
            </div>
            <!-- <div class="form-group">
              <label for="email">Debit</label>
              <input type="text" name="debit" class="form-control">
              < <small ><?php //echo form_error('debit'); ?></small> 
            </div> -->
            <div class="form-group">
              <!-- <label for="balance">Balance</label> -->
              <input type="hidden" name="balance" value="balance" class="form-control">
              <!-- <small ><?php// echo form_error('balance'); ?></small> -->
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Save</button> 
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
