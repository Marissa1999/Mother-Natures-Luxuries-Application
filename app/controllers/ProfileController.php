<?php

/**
 * @accessFilter:{LoginFilter}
 */

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = $this->model('Profile')->getForUser($_SESSION['user_id']);
        $this->view('profile/index', ['profiles'=>$profiles]);
    }

    public function create()
    {
        if(isset($_POST['action']))
        {
            $newProfile = $this->model('Profile');
            $newProfile->theme_id = $_POST['theme_id'];
            $newProfile->first_name = $_POST['first_name'];
            $newProfile->last_name = $_POST['last_name'];
            $newProfile->email = $_POST['email'];
            $newProfile->phone_number = $_POST['phone_number'];
            $newProfile->location = $_POST['location'];
            $newProfile->gender = $_POST['gender'];
            $newProfile->user_type = $_POST['user_type'];
            $newProfile->user_id= $_SESSION['user_id'];
            $newProfile->create();
            header('location:/home/index');
        }

        else
        {
            $this->view('profile/create');
        }
    }

    public function detail()
    {
        $id = (string) $_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($id);
        $this->view('profile/detail', $theProfile);
    }

    /**
     * @accessFilter:{itemOwner}
     */

    public function edit()
    {
        $id = (string) $_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($id);

        if(isset($_POST['action']))
        {
            $theProfile->first_name = $_POST['first_name'];
            $theProfile->last_name = $_POST['last_name'];
            $theProfile->email = $_POST['email'];
            $theProfile->phone_number = $_POST['phone_number'];
            $theProfile->theme_id = $_POST['theme_id'];
            $theProfile->location = $_POST['location'];
            $theProfile->gender = $_POST['gender'];
            $theProfile->user_type = $_POST['user_type'];
            $theProfile->update();
            header('location:/home/index');
        }

        else
        {
            $this->view('profile/edit', $theProfile);
        }
    }

}

?>
