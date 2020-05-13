<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>List of Payment Cards</title>
  </head>
  <body>
     <div class='container'>
       <h1>List of Payment Cards</h1>
        <a href='/login/logout'>Logout</a><br />
         <a href='/payment/create' class='btn btn-success'>Add a Payment Card</a>
        <table class='table table-striped'>
          <tr><td>Card Number</td><td>Card Company</td><td>Expiration Date</td><td>Card CVC</td></tr>
           <?php
           foreach($data['payments'] as $payment)
               {
                 echo "<tr><td>$payment->card_number</td><td>$payment->card_company</td>
                       <td>$payment->expiration_date</td><td>$payment->card_cvc</td><td>
                       <a href='/payment/edit/$payment->card_id' class='btn btn-success'>Edit</a> 
                       <a href='/payment/delete/$payment->card_id' class='btn btn-danger'>Delete</a>
                 </td></tr>";
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