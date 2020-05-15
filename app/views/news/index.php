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
            margin-bottom: 50px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        body {
            background-color: lavender;
            font-family: Helvetica, sans-serif;
        }
    </style>
    <title>List of Company News</title>
</head>
<body>
<div class='container'>
    <h1>List of Company News</h1>
    <a href='/login/logout' class="btn btn-danger" style="float: right;">Logout</a><br/>
    <a href='/home/index' class='btn btn-secondary'>Back to Home Page</a><br/><br/>
    <?php
       if($data['theProfile']->user_type == "Seller")
       {
           echo "<a href='/news/create' class='btn btn-success'>Add a News Posting</a>";
       }
    ?>
    <table class='table table-striped'>
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>News Topic</td>
            <td>News Article</td>
            <td>News Picture</td>
            <td>News Timestamp</td>
        </tr>
        <?php
        foreach ($data['news'] as $news) {
            foreach ($data['profiles'] as $profile) {
                if ($news->seller_id == $profile->profile_id) {
                    echo "<tr><td>$profile->first_name</td><td>$profile->last_name</td></td>";
                    echo "<td>$news->news_topic</td><td>$news->news_article</td>
                             <td><img src='/news_images/$news->news_picture' style='max-width:100px;' /></td>
                             <td>$news->news_timestamp</td>      
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