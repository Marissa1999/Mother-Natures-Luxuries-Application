<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>List of Messages</title>
</head>
<body>
<div class='container'>
    <h1>List of Messages</h1>
    <a href='/login/logout'>Logout</a><br />
    <a href='/message/create' class='btn btn-success'>Send a Message to User</a>
    <table class='table table-striped'>
        <tr><td>Message Text</td><td>Message Timestamp</td><td>Read Messages</td><td>Actions</td></tr>
        <?php
        foreach($data['messages'] as $message)
        {
            echo "<tr><td>$message->message_text</td><td>$message->message_timestamp</td>
                        <td>$message->message_read</td>
                        <td><a href='/message/edit/$message->message_id' class='btn btn-success'>Edit Message</a>
                        <a href='/message/detail/$message->message_id' class='btn btn-primary'>Mark as Read</a>
                        <a href='/message/delete/$message->message_id' class='btn btn-danger'>Delete Message</a> 
                 </td></tr>";
        }
        ?>
    </table>
    <a href='/message/index' class='btn btn-secondary'>Back to Profiles Page</a><br />
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>