<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>List of Wishes</title>
  </head>
  <body>
     <div class='container'>
       <h1>List of Wishes</h1>
        <a href='/login/logout'>Logout</a><br />
        <table class='table table-striped'>
            <tr><td>First Name</td><td>Last Name</td><td>Product Name</td><td>Picture</td><td>Details</td><td>Category</td><td>Price</td><td>Quantity</td><td>Actions</td></tr><br />
            <?php
            foreach($data['wishes'] as $wish)
            {
                foreach($data['products'] as $product)
                {
                    foreach ($data['profiles'] as $profile)
                    {
                        if ($product->seller_id == $profile->profile_id)
                        {
                            echo "<tr><td>$profile->first_name</td><td>$profile->last_name</td></td>";
                            echo "<td>$product->product_name</td><td>$product->product_picture</td><td>$product->product_details</td>
                                 <td>$product->product_category</td><td>$product->product_price</td><td>$product->product_quantity</td>
                                 <td><a href='/wishlist/delete/'$wish->wish_id class='btn btn-danger'>Delete Wish List Item</a> 
                                 </td></tr>";
                            break;
                        }
                    }
                }
            }
            ?>
        </table>
         <a href='/home/index' class='btn btn-secondary'>Back to Home Page</a><br />
     </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>