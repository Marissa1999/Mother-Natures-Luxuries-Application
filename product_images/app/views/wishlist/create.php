<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        h1 {
            color: darkslateblue;
            margin-top: 50px;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .form_group {
            margin-bottom: 50px;
            text-align: center;
            height: 100%;
            align-items: center;
            justify-content: center;
        }

        .create-button {
            margin-bottom: 50px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        p {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        label,
        input {
            height: 100%;
            display: inline-block;
            text-align: center;
        }

        body {
            background-color: lavender;
            font-family: Helvetica, sans-serif;
        }
    </style>
    <title>Add Product to Wish List?</title>
</head>
<body>
<div class='container'>
    <h1>Add Product to Wish List?</h1>
    <form action='' method='post'>
        <div class='form_group'>
            <?php
            $product = $this->model('Product')->find($_SESSION['product_id']);
            $profile = $this->model('Profile')->find($product->seller_id);

            echo "<label>First Name <input type='text' name='first_name' value='$profile->first_name' disabled class='form-control' /></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>Last Name <input type='text' name='last_name' value='$profile->last_name' disabled class='form-control' /></label>
                        <br/>
                        <label>Product Name <input type='text' name='product_name' value='$product->product_name' disabled class='form-control' /></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label style=\"width:208px\">Product Picture <br/><img src='/product_images/$product->product_picture' style='max-width:100px;' /></label>
                        <br/>
                        <label>Product Details <input type='text' name='product_details' value='$product->product_details' disabled class='form-control' /></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>Product Category <input type='text' name='product_category' value='$product->product_category' disabled class='form-control' /></label>
                        <br/>
                        <label>Product Price <input type='text' name='product_price' value='$product->product_price' disabled class='form-control' /></label>";
            ?>
        </div>
        <div class='create-button'>
            <input type='submit' name='action' value='&nbsp;&nbsp;Add to Wishlist&nbsp;&nbsp;' class='btn btn-primary'/>
        </div>
        <p>
            <a href='/home/search' class='btn btn-secondary'>Cancel</a>
        </p>

    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
