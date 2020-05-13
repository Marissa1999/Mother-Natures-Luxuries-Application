<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>List of Product Reviews</title>
  </head>
  <body>
     <div class='container'>
       <h1>List of Product Reviews</h1>
        <a href='/login/logout'>Logout</a><br />
        <a href='/review/create' class='btn btn-success'>Add a Review</a>
        <table class='table table-striped'>
          <tr><td>First Name</td><td>Last Name</td><td>Product Rating</td><td>Review Comment</td><td>Review Timestamp</td></tr>
            <?php
            foreach($data['reviews'] as $review)
            {
                foreach($data['profiles'] as $profile)
                {
                        echo "<tr><td>$profile->first_name</td><td>$profile->last_name</td></td>";
                        echo "<td>$review->product_rating</td><td>$review->review_comment</td><td>$review->review_timestamp</td>
                             <td><a href='/review/edit/$review->review_id' class='btn btn-primary'>Edit</a>
                             <a href='/review/delete/$review->review_id' class='btn btn-danger'>Delete</a>
                             </td></tr>";
                             break;
                }
            }
            ?>
        </table>
         <a href='/home/search' class='btn btn-secondary'>Back to Product Search Page</a><br />
     </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>