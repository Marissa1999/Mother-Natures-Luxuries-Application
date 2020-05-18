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
            margin-bottom: 30px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        body {
            background-color: lavender;
            font-family: Helvetica, sans-serif;
        }
    </style>
    <title>List of Wishes</title>
</head>
<body>
<div class='container'>
    <h1>List of Wishes</h1>
    <a href='/login/logout' class="btn btn-danger" style="float: right;">Logout</a><br/>
    <a href='/home/index' class='btn btn-secondary'>Back to Home Page</a><br/>
    <table class='table table-striped'>
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Product Name</td>
            <td>Picture</td>
            <td>Details</td>
            <td>Category</td>
            <td>Price</td>
            <td>Actions</td>
        </tr>
        <br/>
        <?php

        $profile = $data['profiles'];

        foreach ($data['wishes'] as $wish) {
            foreach ($data['products'] as $product) {
                if ($product->product_id == $wish->product_id && $profile->profile_id == $wish->customer_id) {
                    $seller = $this->model('Profile')->find($product->seller_id);
                    echo "<tr><td>$seller->first_name</td><td>$seller->last_name</td></td>";
                    echo "<td>$product->product_name</td><td><img src='/product_images/$product->product_picture' style='max-width:100px;' />
                               </td><td>$product->product_details</td><td>";
                    $category = $product->product_category;
                    if ($category == 1) {
                        echo 'Beauty';
                    } elseif ($category == 2) {
                        echo 'Medical';
                    } else {
                        echo 'Tea';
                    }
                    echo"</td><td>$product->product_price</td>
                               <td><a href='/wishlist/delete/$wish->wish_id' class='btn btn-outline-danger btn-sm'>Delete Wish List Item</a> 
                               </td></tr>";
                    break;
                }
            }
        }
        ?>
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