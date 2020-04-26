<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Home Page</title>
  </head>
  <body>
     <div class='container'>
       <h1>Welcome to Mother Nature's Luxuries</h1>
        <a href='/login/logout'>Logout</a><br />
         <a href='/home/modifyPassword' class='btn btn-success'>Modify Password</a>
         <a href='/profile/edit' class='btn btn-success'>Modify Profile</a>
         <a href='/profile/detail' class='btn btn-success'>View Profile Information</a>
         <a href='/home/create' class='btn btn-success'>Add a Product</a>
        <table class='table table-striped'>
          <br>
          <h2>My Products</h2>
          <tr><td>Product</td><td>Picture</td><td>Details</td><td>Price</td><td>Quantity</td><td>Category</td><td>Profit</td></tr>
           <?php
               foreach($data['products'] as $product)
               {
                 $total = $product->product_price * $product->product_quantity;
                 echo "<tr><td>$product->product_name</td><td>$product->product_picture</td>
                 <td>$product->product_details</td><td>$product->product_price</td>
                 <td>$product->product_quantity</td><td>$product->product_category</td>
                 <td>$total</td><td>
                 <a href='/home/edit/$product->product_id' class='btn btn-success'>Edit</a> 
                 <a href='/home/delete/$product->product_id' class='btn btn-danger'>Delete</a>
                 </td></tr>";
               }
           ?>
        </table>
     </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>