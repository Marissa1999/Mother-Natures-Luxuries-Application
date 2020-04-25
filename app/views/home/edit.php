<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Edit the Product</title>
  </head>
  <body>
     <div class='container'>
       <h1>Edit the Product</h1>
       <form action='' method='post'>
        <div class='form-group'>
            <label>Product Name: <input type='text' name='product_name' value='<?=$data->product_name ?>' class='form-control' /></label>
            <label>Product Picture: <input type='text' name='product_picture' value='<?=$data->product_picture ?>' class='form-control' /></label>
            <label>Product Details: <input type='text' name='product_details' value='<?=$data->product_details ?>' class='form-control' /></label>
            <label>Product Price: <input type='text' name='product_price' value='<?=$data->product_price ?>' class='form-control' /></label>
            <label>Product Quantity: <input type='text' name='product_quantity' value='<?=$data->product_quantity ?>' class='form-control' /></label>
            <label>Product Category: <input type='text' name='product_category' value='<?=$data->product_category ?>' class='form-control' /></label>
           </div>
             <input type='submit' name='action' value='Save Changes' class='btn btn-success' />
             <a href='/home/index' class='btn btn-secondary'>Cancel</a>
        </form>
     </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>