<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Create a Profile</title>
  </head>
  <body>
     <div class='container'>
      <h1>Create a Profile</h1>
        <form action='' method='post'>
          <div class='form-group'>
              <label>First Name: <input type='text' name='first_name' class='form-control' minlength="2" required /></label>
              <label>Last Name: <input type='text' name='last_name' class='form-control' minlength="2" required/></label>
              <label>Email: <input type='text' name='email' class='form-control' placeholder="example@gmail.com"  required /></label>
              <label>Phone Number: <input type='text' name='phone_number' class='form-control' placeholder="111 111 1111"/></label>
             User Type:
                  <p><input type='radio' name='user_type' class='form-control' value="Seller" />Seller</p>
                  <p><input type='radio' name='user_type' class='form-control' value="Buyer" />Buyer</p>
              Theme ID:
              <p><input type='radio' name='theme' class='form-control' value="1" />Beauty</p>
              <p><input type='radio' name='theme' class='form-control' value="2" />Medical</p>
              <p><input type='radio' name='theme' class='form-control' value="3" />Tea</p>
              Gender:
                  <p><input type='radio' name='gender' class='form-control' value="M" />Male</p>
                  <p><input type='radio' name='gender' class='form-control' value="F" />Female</p></label>
              <label>Location: <input type='text'  size="50" name='location' class='form-control' /></label>
           </div>
             <input type='submit' name='action' value='Create' class='btn btn-primary' />
        </form>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
