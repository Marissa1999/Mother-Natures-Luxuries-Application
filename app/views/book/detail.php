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
              margin-bottom:50px;
              display: flex;
              align-items: center;
              justify-content: center;
              position: relative;
          }
          dl {
              text-align: center;
          }
          dt{
              font-size: 20px;
              margin-top: 20px;
              margin-bottom: 20px;
          }
          dd{
              font-size: 15px;
              margin-top: 10px;
              margin-bottom: 10px;
          }
          p {
              height: 100%;
              display: flex;
              align-items: center;
              justify-content: center;
          }
          label,
          input {
              height: 100%;
              display: block;
              text-align: center;
          }
          body {
              background-color: lavender;
              font-family: Helvetica, sans-serif;
          }
      </style>
    <title>Book Details</title>
  </head>
  <body>
     <div class='container'>
       <h1>Book Details</h1>
         <a href='/home/index' class='btn btn-secondary'>&nbsp;&nbsp;Back to List&nbsp;&nbsp;</a>
         <dl width=100%>
            <dt>Book Name</dt>
            <dd><?=$data->book_name ?></dd>
            <dt>Book Picture</dt>
            <dd><img src='/book_images/<?=$data->book_picture?>' style='max-width:100px;'/></dd>
            <dt>Book Description</dt>
            <dd><?=$data->book_description ?></dd>
            <dt>Book Price</dt>
            <dd><?=$data->book_price ?></dd>
            <dt>Book Quantity</dt>
            <dd><?=$data->book_quantity ?></dd>
        </dl>
     </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>