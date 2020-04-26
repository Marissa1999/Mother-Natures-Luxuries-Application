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
            $newProduct = $this->model('News');
            $newProduct->news_topic = $_POST['news_topic'];
            $newProduct->news_article = $_POST['news_article'];
            $newProduct->news_picture = $_POST['news_picture'];
            $newProduct->news_timestamp = $_POST['news_timestamp'];
            $newProduct->seller_id= $_SESSION['profile_id'];
            $newProduct->create();
            header('location:/news/index');
        }

        else
        {
            $this->view('news/create');
        }
    }
}

?>