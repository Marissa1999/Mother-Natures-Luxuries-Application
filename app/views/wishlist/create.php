<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Add Product to Wish List?</title>
  </head>
  <body>
     <div class='container'>
      <h1>Add Product to Wish List?</h1>
        <form action='' method='post'>
          <div class='form-group'>
              <?php
              foreach($data['products'] as $product)
              {
                  foreach($data['profiles'] as $profile)
                  {
                      //if($product->seller_id == $profile->profile_id)
                      //{
                          echo " <dl>
                                       <dt>First Name</dt>
                                       <dd><?=$profile->first_name ?></dd>
                                       <dt>Last Name</dt>
                                       <dd><?=$profile->last_name ?></dd>
                                       <dt>Product Name</dt>
                                       <dd><?=$product->product_name ?></dd>
                                       <dt>Product Picture</dt>
                                       <dd><?=$product->product_picture ?></dd>
                                       <dt>Product Details</dt>
                                       <dd><?=$product->product_details ?></dd>
                                       <dt>Product Category</dt>
                                       <dd><?=$product->product_category ?></dd>
                                       <dt>Product Price</dt>
                                       <dd><?=$product->product_price ?></dd>
                              </dl>";
                      //}
                  }
              }
              ?>
           </div>
             <input type='submit' name='action' value='Create' class='btn btn-primary' />
            <a href='/home/search' class='btn btn-secondary'>Cancel</a>
        </form>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
