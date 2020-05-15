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
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .form-group {
            margin-bottom: 50px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .save-button {
            margin-bottom: 50px;
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
    <title>Edit this Payment Card</title>
</head>
<body>
<div class='container'>
    <h1>Edit this Payment Card</h1>
    <form action='' method='post'>
        <div class='form-group'>
            <label>Card Number: <input type='text' name='card_number' value='<?= $data->card_number ?>'
                                       class='form-control'/></label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Card Company: <input type='text' name='card_company' value='<?= $data->card_company ?>'
                                        class='form-control'/></label>
        </div>
        <div class='form-group'>
            <label>Expiration Date: <input type='text' name='expiration_date' value='<?= $data->expiration_date ?>'
                                           class='form-control'/></label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Card CVC: <input type='text' name='card_cvc' value='<?= $data->card_cvc ?>'
                                    class='form-control'/></label>
        </div>
        <div class="save-button">
            <input type='submit' name='action' value='&nbsp;&nbsp;Save Changes&nbsp;&nbsp;' class='btn btn-success'/>
        </div>
        <p>
            <a href='/home/index' class='btn btn-secondary'>Cancel</a>
        </p>
    </form>
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