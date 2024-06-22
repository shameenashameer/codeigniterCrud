<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Image Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        textarea.form-control {
            resize: vertical; /* Allow vertical resizing */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h5>Insert Image</h5>
                        <a href="<?php echo base_url('products/add') ?>" class="btn btn-danger btn-sm float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <!-- <?php echo validation_errors(); ?> -->
                        <form action="<?php echo base_url('products/store') ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" name="productName" id="name" class="form-control">
                                <small ><?php echo form_error('productName'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="price">Product Price</label>
                                <input type="text" name="productPrice" id="price" class="form-control">
                                <small ><?php echo form_error('productPrice'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="description">Product Description</label>
                                <textarea name="productDescription" id="description" cols="30" rows="5" class="form-control"></textarea>
                                <small ><?php echo form_error('productDescription'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="image">Product Image</label>
                                <input type="file" name="productImage" id="image" class="form-control">
                                <small><?phpif(isset($error)){echo $error;}?></small>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="save" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
