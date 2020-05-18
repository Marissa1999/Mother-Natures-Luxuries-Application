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
            margin-bottom: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        body {
            background-color: lavender;
            font-family: Helvetica, sans-serif;
        }
    </style>
    <title>Search Products</title>
</head>
<body>
<div class='container'>
    <h1>Search All Products</h1>
    <a href='/login/logout' class="btn btn-danger" style="float: right;">Logout</a><br/>
    <a href='/home/index' class='btn btn-secondary' style="float: left;">Back to Home Page</a><br/>
    <form method='post' action=''>
        <br/><label>Search Product Name or Description: </label> <input type="search" name="search_input"/> <input
                type="submit" name="search" value="Search" class='btn btn-info'/>
        <a href='/home/search' class='btn btn-primary'>Refresh Product List</a><br/>
        <br/>
        <h6>Order By: </h6>
        <input type="submit" name="nameSortAsc" value="Name (Ascending)" class='btn btn-warning'/>
        <input type="submit" name="nameSortDesc" value="Name (Descending)" class='btn btn-warning'/>
        <input type="submit" name="priceSortAsc" value="Price (Ascending)" class='btn btn-success'/>
        <input type="submit" name="priceSortDesc" value="Price (Descending)" class='btn btn-success'/>
        <input type="submit" name="categorySortAsc" value="Category (Ascending)" class='btn btn-dark'/>
        <input type="submit" name="categorySortDesc" value="Category (Descending)" class='btn btn-dark'/><br/>
    </form>
    <table class='table table-striped'>
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Product Name</td>
            <td>Picture</td>
            <td>Details</td>
            <td>Category</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Actions</td>
        </tr>
        <br/>
        <div class='card'>
            <?php
            $displayWishListOption = false;
            foreach ($data['products'] as $product) {
                foreach ($data['profiles'] as $profile) {
                    if ($product->seller_id == $profile->profile_id)
                    {
                        if ($data['theProfile']->user_type == "Buyer")
                        {
                            echo "<tr><td>$profile->first_name</td><td>$profile->last_name</td></td>";
                            echo "<td>$product->product_name</td><td><img src='/product_images/$product->product_picture' style='max-width:100px;' /></td>
                          <td>$product->product_details</td><td>";
                 $category = $product->product_category;
                 if ($category == 1) {
                     echo 'Beauty';
                 } elseif ($category == 2) {
                     echo 'Medical';
                 } else {
                     echo 'Tea';
                 }
                 echo "</td><td>$product->product_price</td>
                          <td>$product->product_quantity</td>";

                       foreach ($data['wishList'] as $wish)
                       {
                          if ($wish->customer_id == $_SESSION['profile_id'] && $wish->product_id == $product->product_id)
                          {
                              $displayWishListOption = true;
                              break;
                          }

                      }


                    echo "<td><a href='/review/index/$product->product_id' class='btn btn-outline-info btn-sm'>View Reviews</a> ";

                            if (!$displayWishListOption)
                            {
                                echo "<a href='/wishlist/create?product_id=$product->product_id' class='btn btn-outline-primary btn-sm'>Add to Wish List</a>";
                                $displayWishListOption = false;
                            }

                            $displayWishListOption = false;

                          echo " <a href='/order/AddToCart/$product->product_id' class='btn btn-outline-success btn-sm'>Add to Cart</a>
                          </td></tr>";
                            break;
                        }

                        else
                        {
                            echo "<tr><td>$profile->first_name</td><td>$profile->last_name</td></td>";
                            echo "<td>$product->product_name</td><td><img src='/product_images/$product->product_picture' style='max-width:100px;' /></td>
                          <td>$product->product_details</td><td>$product->product_category</td><td>$product->product_price</td>
                          <td>$product->product_quantity</td>
                    <td>
                        <a href='/review/index/$product->product_id' class='btn btn-outline-info btn-sm'>View Reviews</a>
                    </td></tr>";
                            break;
                        }
                    }
                }
            }
            ?>
        </div>

    </table>
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