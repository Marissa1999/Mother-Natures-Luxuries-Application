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
          .create-button {
              margin-bottom:50px;
              height: 100%;
              display: flex;
              align-items: center;
              justify-content: center;
          }
          p {
              height: 100%;
              display: flex;
              align-items: center;
              justify-content: center;
          }
          label{
              height: 100%;
              display: block;
              text-align: center;
          }
          body {
              background-color: lavender;
              font-family: Helvetica, sans-serif;
          }
      </style>
      <link rel="stylesheet" href="css/style.css">
      <script src="js/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDjtvsmLwlwUzgYEe8LfGOSnw1u-kKWRxM"></script>
      <script>
          var searchInput = 'search_input';

          $(document).ready(function () {
              var autocomplete;
              autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
                  types: ['geocode'],
              });

              google.maps.event.addListener(autocomplete, 'place_changed', function () {
                  var near_place = autocomplete.getPlace();
                  document.getElementById('latitude_view').value = near_place.geometry.location.lat();
                  document.getElementById('longitude_view').value = near_place.geometry.location.lng();

                  document.getElementById('latitude_view').innerHTML = near_place.geometry.location.lat();
                  document.getElementById('longitude_view').innerHTML = near_place.geometry.location.lng();
              });
          });
          $(document).on('change', '#'+searchInput, function () {
              document.getElementById('latitude_input').value = '';
              document.getElementById('longitude_input').value = '';

              document.getElementById('latitude_view').innerHTML = '';
              document.getElementById('longitude_view').innerHTML = '';
          });
      </script>
    <title>Create My Profile</title>
  </head>
  <body>
     <div class='container'>
      <h1>Create My Profile</h1>
        <form action='' method='post'>
          <div class='form-group'>
              <label>First Name <input type='text' name='first_name' class='form-control' minlength="2" required/></label>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>Last Name <input type='text' name='last_name' class='form-control' minlength="2" required/></label>
          </div>

          <div class='form-group'>
              <label>Email <input type='text' name='email' class='form-control' placeholder="example@gmail.com" required/></label>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>Phone Number <input type='text' name='phone_number' class='form-control' placeholder="ex :999-999-9999" required/></label>
          </div>
          <div class='form-group'>
              Theme:
              <input type="radio" name='theme_id' value="1"><label>Beauty</label><br>
              <input type="radio" name='theme_id' value="2"><label>Medical</label><br>
              <input type="radio" name='theme_id' value="3"><label>Tea</label><br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              Gender:
              <input type="radio" name='gender' value="Male"><label>Male</label><br>
              <input type="radio" name='gender' value="Female"><label>Female</label><br>
          </div>
            <div class='form-group'>
                User Type:
                <input type="radio" name='user_type' value="1"><label>Buyer</label><br>
                <input type="radio" name='user_type' value="2"><label>Seller</label><br>
            </div>
          <div class='form-group'>
              <label>Location <input type='text' id="search_input" name='location' class='form-control' size="50" required/></label>
                              <input type="hidden" id="latitude_input"/>
                              <input type="hidden" id="longitude_input"/>
          </div>

              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <div class='create-button'>
                <input type='submit' name='action' value='&nbsp;&nbsp;Create My Profile&nbsp;&nbsp;' class='btn btn-primary' />
            </div>
        </form>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
