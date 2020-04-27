<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Search Products</title>
</head>
<body>
<div class='container'>
    <h1>Search All Books</h1>
    <a href='/login/logout'>Logout</a><br />
    <form method='post' action=''>
        <br /><label>Search: </label> <input type="search" name="search_input" /> <input type="submit" name="search" value="Search" class='btn btn-info' />
        <a href='/book/search' class='btn btn-primary'>Refresh Book List</a><br />
        <br />
        <h6>Order By: </h6>
        <input type="submit" name="nameSortAsc" value="Name (Ascending)" class='btn btn-warning' />
        <input type="submit" name="nameSortDesc" value="Name (Descending)" class='btn btn-warning' />
        <input type="submit" name="priceSortAsc" value="Price (Ascending)" class='btn btn-success' />
        <input type="submit" name="priceSortDesc" value="Price (Descending)" class='btn btn-success' /><br /><br />
    </form>
    <table class='table table-striped'>
        <tr><td>First Name</td><td>Last Name</td><td>Book Name</td><td>Description</td><td>Picture</td><td>Price</td><td>Quantity</td></tr>
        <?php
        foreach($data['books'] as $book)
        {
            foreach($data['profiles'] as $profile)
            {
                if($book->teacher_id == $profile->profile_id)
                {
                    echo "<tr><td>$profile->first_name</td><td>$profile->last_name</td></td>";
                    echo "<td>$book->book_name</td><td>$book->book_description</td><td>$book->book_picture</td>
                    <td>$book->book_price</td><td>$book->book_quantity</td><td>
                    </td></tr>";
                    break;
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