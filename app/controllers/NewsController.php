<?php

/**
 * @accessFilter:{LoginFilter}
 */

class NewsController extends Controller
{
    public function index()
    {
        $user_id = (string)$_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $_SESSION['profile_id'] = $theProfile->profile_id;
        $news = $this->model('News')->get();
        $profiles = $this->model('News')->getSellersAndNews();
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $this->view('news/index', ['news' => $news, 'profiles' => $profiles, 'theProfile' => $theProfile]);
    }

    public function create()
    {
        if (isset($_FILES['news_picture']) && $_FILES['news_picture']['error'] == UPLOAD_ERR_OK) {
            $info = getimagesize($_FILES['news_picture']['tmp_name']);
            $allowedTypes = [IMAGETYPE_JPEG => '.jpg', IMAGETYPE_PNG => '.png', IMAGETYPE_GIF => '.gif'];

            if ($info === false) {
                $this->view('news/create', ['error' => 'Bad File Format']);
            } else if (!array_key_exists($info[2], $allowedTypes)) {
                $this->view('news/create', ['error' => 'Not an Accepted File Type']);
            } else {
                $path = getcwd() . DIRECTORY_SEPARATOR . 'news_images' . DIRECTORY_SEPARATOR;
                $filename = uniqid() . $allowedTypes[$info[2]];
                move_uploaded_file($_FILES['news_picture']['tmp_name'], $path . $filename);

                $newNews = $this->model('News');
                $newNews->news_topic = $_POST['news_topic'];
                $newNews->news_article = $_POST['news_article'];
                $newNews->news_picture = $filename;
                $newNews->news_timestamp = $_POST['news_timestamp'];
                $newNews->seller_id = $_SESSION['profile_id'];
                $newNews->create();
                header('location:/news/index');
            }
        } else {
            $this->view('news/create');
        }
    }
}

?>