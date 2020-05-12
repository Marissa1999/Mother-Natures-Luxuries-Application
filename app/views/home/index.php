<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        h1 {
            color: darkslateblue;
            margin-top: 50px;
            margin-bottom:30px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        h2 {
            margin-top: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        h3 {
            margin-top: 25px;
            display: flex;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: flex;
            justify-content: center;
            background-color: lavenderblush;
        }
        li{
            display: inline-block;
        }
        li {
            border-right: 1.5px solid #a6a6ed;
        }
        li:last-child {
            border-right: none;
        }
        li a {
            font-size: 15px;
            display: block;
            color: darkslateblue;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        li a:hover {
            background-color: #a6a6ed;
        }
        a:link {
            text-decoration: none;
        }
        body {
            background-color: lavender;
            font-family: Helvetica, sans-serif;
        }
    </style>
    <title>Home Page</title>
</head>
<body>
<div class='container' style="overflow: auto;">
    <h1>Welcome to Mother Nature's Luxuries</h1>
    <a href='/login/logout' class="btn btn-danger" style="float: right;">Logout</a><br />
    <h3>&nbsp;&nbsp;My Account</h3>
    <ul>
        <li><a href='/home/modifyPassword'>Modify Password</a></li>
        <li><a href='/profile/edit' >Modify Profile</a></li>
        <li><a href='/profile/detail' >View Profile Information</a></li>
        <li><a href='/profile/index'>View Seller Contacts</a></li>
        <li><a href='/news/index'>View Company News Postings</a></li>
        <li><a href='/payment/index'>View Payment Information</a></li>
    </ul>
    <br/>
    <h3>&nbsp;&nbsp;Shop</h3>
    <ul>
        <li><a href='/home/search'>Browse All Products</a></li>
        <li><a href='/book/search'>Browse All Books</a></li>
        <li><a href='/message/index'>Message Users</a></li>
        <li><a href='/wishlist/index'>View Wish List</a></li>
        <li><a href='/order/index'>View Shopping Cart</a></li>
    </ul>

    <br />

    <h2>My Products</h2>
    <a href='/home/create' class='btn btn-success' style="float: right;">Add a Product</a>

    <table class='table table-striped' style="width:100%">
        <tr><td>Name</td><td>Picture</td><td>Details</td><td>Price</td><td>Quantity</td><td>Category</td><td>Profit</td></tr>
        <?php
        foreach($data['products'] as $product)
        {
            $total = $product->product_price * $product->product_quantity;
            echo "<tr><td>$product->product_name</td><td><img src='/product_images/$product->product_picture' style='max-width:100px;' /></td>
                 <td>$product->product_details</td><td>$product->product_price</td>
                 <td>$product->product_quantity</td><td>$product->product_category</td>
                 <td>$total</td><td style=\"text-align:right\">
                 <a href='/promotion/index/$product->product_id' class='btn btn-outline-info btn-sm'>Promotions</a> 
                 <a href='/home/edit/$product->product_id' class='btn btn-outline-success btn-sm''>Edit Product</a> 
                 <a href='/home/delete/$product->product_id' class='btn btn-outline-danger btn-sm'>Delete Product</a>
                 </td></tr>";
        }
        ?>
    </table>
    <br />

    <h2>My Books</h2>
    <a href='/book/create' class='btn btn-success' style="float: right;">Add a Book</a>
    <!--
    <table style="width:100%" >
        <tr>
            <td><h2>My Books</h2></td>
            <td style="text-align:right"><a href='/book/create' class='btn btn-success'>Add a Book</a></td>
        </tr>
    </table>
    -->
    <table class='table table-striped' style="width:100%">
        <tr><td>Name</td><td>Picture</td><td>Description</td><td>Price</td><td>Quantity</td></tr>
        <?php
        foreach($data['books'] as $book)
        {
            echo "<tr><td>$book->book_name</td><td><img src='/book_images/$book->book_picture' style='max-width:100px;' /></td>
                 <td>$book->book_description</td><td>$book->book_price</td>
                 <td>$book->book_quantity</td><td style=\"text-align:right\">
                 <a href='/book/detail/$book->book_id' class='btn btn-outline-primary btn-sm'>Book Details</a>
                 <a href='/book/edit/$book->book_id' class='btn btn-outline-success btn-sm'>Edit Book</a> 
                 <a href='/book/delete/$book->book_id' class='btn btn-outline-danger btn-sm'>Delete Book</a>
                 </td></tr>";
        }
        ?>
    </table>
    <br/>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>