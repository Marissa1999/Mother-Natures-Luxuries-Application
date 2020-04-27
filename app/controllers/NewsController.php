<?php

/**
 * @accessFilter:{LoginFilter}
 */

class NewsController extends Controller
{
    public function index()
    {
        $user_id = (string) $_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $_SESSION['profile_id'] = $theProfile->profile_id;
        $news = $this->model('News')->get();
        $profiles = $this->model('News')->getSellersAndNews();
        $this->view('news/index', ['news'=>$news, 'profiles'=>$profiles]);
    }

    public function create()
    {
        if(isset($_POST['action']))
        {
            $newNews = $this->model('News');
            $newNews->news_topic = $_POST['news_topic'];
            $newNews->news_article = $_POST['news_article'];
            $newNews->news_picture = $_POST['news_picture'];
            $newNews->news_timestamp = $_POST['news_timestamp'];
            $newNews->seller_id= $_SESSION['profile_id'];
            $newNews->create();
            header('location:/news/index');
        }

        else
        {
            $this->view('news/create');
        }
    }
}

?>