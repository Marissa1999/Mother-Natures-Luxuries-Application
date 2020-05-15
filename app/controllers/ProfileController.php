<?php

/**
 * @accessFilter:{LoginFilter}
 */

class ProfileController extends Controller
{
    public function index()
    {
        $theProfile = $this->model('Profile');
        $_SESSION['user_type'] = $theProfile->user_type;
        $profiles = $this->model('Profile')->getSellers($_SESSION['user_type']);
        $this->view('profile/index', ['profiles'=>$profiles]);
    }

    public function create()
    {

        if(isset($_POST['action']))
        {
            $newProfile = $this->model('Profile');

            if(!empty($_POST['theme_id']))
            {
                $newProfile->theme_id = $_POST['theme_id'];
            }
            else
            {
                $newProfile->theme_id = 0;
            }
            $newProfile->first_name = $_POST['first_name'];
            $newProfile->last_name = $_POST['last_name'];
            $newProfile->email = $_POST['email'];
            $newProfile->phone_number = $_POST['phone_number'];
            $newProfile->location = $_POST['location'];

            if(!empty($_POST['gender']))
            {
                $newProfile->gender = $_POST['gender'];
            }
            else
            {
                $newProfile->gender = "Other";
            }

            if(!empty($_POST['user_type']))
            {
                $newProfile->user_type = $_POST['user_type'];
            }
            else
            {
                $newProfile->user_type = "Buyer";
            }

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
        $user_id = (string) $_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $this->view('profile/detail', $theProfile);
    }

    public function edit()
    {
        $user_id = (string) $_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);

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
