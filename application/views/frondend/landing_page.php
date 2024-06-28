<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matra Supermarket Chooralmala</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            background: #fff;
            padding: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        .buttons button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 15px 30px;
            margin: 10px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .buttons button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome to Matra Supermarket Chooralmala</h2>
        <div class="buttons">
        <a href="<?php echo base_url('employee/costumers');?>"class="btn btn-primary btn-sm float-center">Costumers</a>
        <a href="<?php echo base_url('employee/shops');?>"class="btn btn-primary btn-sm float-center">Shops</a>
        <!-- <a href="<?php echo base_url('employee/staffs');?>"class="btn btn-primary btn-sm float-center">Staffs</a> -->

            <!-- <button onclick="href='<?php echo base_url('employee/custumers'); ?>'">Customers</button>
            <button onclick="location.href='<?php echo base_url('employee/stocks'); ?>'">Stocks</button>
            <button onclick="location.href='<?php echo site_url('employee/staffs'); ?>'">Staffs</button> -->
        </div>
    </div>
</body>
</html>
