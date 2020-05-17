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
            margin-bottom: 30px;
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

        li {
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
            background-color: #d1d1f6;
        }

        a:link {
            text-decoration: none;
        }

        body {
            background-color: lavender;
            font-family: Helvetica, sans-serif;
        }
    </style>
    <title>Messages Records</title>
</head>
<body>
<div class='container'>
    <h1>Messages Records</h1>
    <a href='/login/logout' class="btn btn-danger" style="float: right;">Logout</a><br/>
    <a href='/message/index' class='btn btn-secondary'>Back to Profiles Page</a><br/><br/>
    <a style="margin: 0px;" href='/message/create' class="btn btn-primary">Send a Message</a>
    <table class='table table-striped'>
        <tr>
            <td>Message Sender</td>
            <td>Message Text</td>
            <td>Message Timestamp</td>
            <td>Read Messages</td>
            <td>Actions</td>
        </tr>
        <?php
        foreach ($data['messages'] as $message) {
            foreach ($data['profiles'] as $profile) {
                if ($message->message_sender == $profile->profile_id) {
                    echo "<td>$profile->first_name $profile->last_name</td><td>$message->message_text</td><td>$message->message_timestamp</td><td>$message->message_read</td>
                        <td><a href='/message/edit/$message->message_id' class='btn btn-outline-success btn-sm'>Edit Message</a>
                        <a href='/message/detail/$message->message_id' class='btn btn-outline-primary btn-sm'>Mark as Read</a>
                        <a href='/message/delete/$message->message_id' class='btn btn-outline-danger btn-sm'>Delete Message</a> 
                        </td></tr>";
                    break;
                }
            }
        }
        ?>
    </table>

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