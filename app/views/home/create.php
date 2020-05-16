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

        .form-group {
            margin-bottom: 50px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        input[type=text] {
            text-align: center;
        }

        input[type=number] {
            text-align: center;
        }

        .radio-group {
            margin-bottom: 40px;
            height: 100%;
            text-align: center;
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

        label {
            height: 100%;
            display: inline;
            text-align: center;
        }

        body {
            background-color: lavender;
            font-family: Helvetica, sans-serif;
        }
    </style>
    <title>Add a Product</title>
</head>
<body>
<div class='container'>
    <h1>Add a Product</h1>
    <form action='' method='post' enctype='multipart/form-data'>
        <div class='form-group'>
            <label style="font-weight: bold">Product Name <input type='text' name='product_name' class='form-control' required/></label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label style="font-weight: bold">Product Picture <br/><input type='file' name='product_picture' style="width:208px"/></label>
        </div>
        <div class='form-group'>
            <label style="font-weight: bold">Product Price <input type='text' name='product_price' placeholder="Ex: 99.87" class='form-control' required/></label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label style="font-weight: bold">Product Quantity <input type='number' name='product_quantity' min="0" class='form-control' required/></label>
        </div>
        <div class='form-group'>
            <label style="font-weight: bold">Product Details <input type="text" name='product_details' class='form-control' required/></label>
        </div>
        <div class='radio-group'>
            <label style="font-weight: bold">Product Category</label><br/>
                <input type="radio" name='theme_id' value="1"><label>&nbsp;Beauty</label>
                <input type="radio" name='theme_id' value="2"><label>&nbsp;Medical</label>
                <input type="radio" name='theme_id' value="3"><label>&nbsp;Tea</label>
        </div>
        <div class='create-button'>
            <input type='submit' name='action' value='&nbsp;&nbsp;Create New Product&nbsp;&nbsp;'
                   class='btn btn-primary'/>
        </div>
        <p>
            <a href='/home/index' class='btn btn-secondary'>Cancel</a>
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
