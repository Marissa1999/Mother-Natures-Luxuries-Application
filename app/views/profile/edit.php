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
              margin-bottom:40px;
              display: flex;
              align-items: center;
              justify-content: center;
              position: relative;
          }
          .form-group {
              margin-bottom:50px;
              height: 100%;
              display: flex;
              align-items: center;
              justify-content: center;
          }
          .radio-group{
              margin-bottom:40px;
              height: 100%;
              text-align: center;
              align-items: center;
              justify-content: center;
          }
          .save-button {
              margin-bottom:50px;
              height: 100%;
              display: flex;
              align-items: center;
              justify-content: center;
          }
          label {
              height: 100%;
              display: inline;
              text-align: center;
          }
          p {
              height: 100%;
              display: flex;
              align-items: center;
              justify-content: center;
          }
          body {
              background-color: lavender;
              display: ;
              font-family: Helvetica, sans-serif;
          }
          input[type="radio"] + label {
              display:inline-block;
              vertical-align:middle;
          }
      </style>
    <title>Edit the Profile</title>
  </head>
  <body>
     <div class='container'>
       <h1>Edit the Profile</h1>
       <form action='' method='post'>
        <div class='form-group'>
            <label style="font-weight: bold">First Name <input type='text' name='first_name' value='<?=$data->first_name ?>' class='form-control' /></label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label style="font-weight: bold">Last Name <input type='text' name='last_name' value='<?=$data->last_name ?>' class='form-control' /></label>
        </div>
        <div class='form-group'>
            <label style="font-weight: bold">Email <input type='text' name='email' value='<?=$data->email ?>' class='form-control' /></label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <label style="font-weight: bold">Phone Number <input type='text' name='phone_number' value='<?=$data->phone_number ?>' class='form-control' /></label>
        </div>
        <div class="radio-group">
            <label style="font-weight: bold">Theme</label><br/>
            <input type="radio" name="theme_id"  value="1" <?php echo $data->theme_id == '1' ? 'checked' : ''?>><label>&nbsp;Beauty</label>
            <input type="radio" name="theme_id"  value="2"
                <?php echo $data->theme_id == '2' ? 'checked' : ''?>><label>&nbsp;Medical</label>
            <input type="radio" name="theme_id"  value="3"
                <?php echo $data->theme_id == '3' ? 'checked' : ''?>><label>&nbsp;Tea</label>
        </div>
        <div class="radio-group">
            <label style="font-weight: bold">Gender</label><br/>
            <input type="radio" name="gender"  value="Male"
                <?php echo $data->gender == 'Male' ? 'checked' : ''?>><label>&nbsp;Male</label>
            <input type="radio" name="gender"  value="Female"
                <?php echo $data->gender == 'Female' ? 'checked' : ''?>><label>&nbsp;Female</label>
        </div>
        <div class="radio-group">
            <label style="font-weight: bold">User Type</label><br/>
            <input type="radio" name="user_type"  value="Buyer"
                <?php echo $data->user_type == 'Buyer' ? 'checked' : ''?>><label>&nbsp;Buyer</label>
            <input type="radio" name="user_type"  value="Seller"
                <?php echo $data->user_type == 'Seller' ? 'checked' : ''?>><label>&nbsp;Seller</label>
        </div>

        <div class="form-group">
            <label>Location <input type='text' name='location' value='<?=$data->location ?>' class='form-control' size="50"/></label>
        </div>
<!--
         <div class='form-group'>
            <label>Theme ID <input type='text' name='theme_id' value='<?=$data->theme_id ?>' class='form-control' /></label>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <label>Gender <input type='text' name='gender' value='<?=$data->gender ?>' class='form-control' /></label>
         </div>
         <div class='form-group'>
             <label>Location <input type='text' name='location' value='<?=$data->location ?>' class='form-control' /></label>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <label>User Type <input type='text' name='user_type' value='<?=$data->user_type ?>' class='form-control' /></label>
         </div>
-->
           <div class="save-button">
               <input type='submit' name='action' value='&nbsp;&nbsp;Save Changes&nbsp;&nbsp;' class='btn btn-success' />
           </div>
           <p>
               <a href='/home/index' class='btn btn-secondary'>Cancel</a>
           </p>
       </form>
     </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>