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
            header('location:/profile/index');
        }

        else
        {
            $this->view('profile/create');
        }
    }

    /**
     * @accessFilter:{itemOwner}
     */

    public function detail($item_id)
    {
        $theItem = $this->model('Item')->find($item_id);

        if($theItem->user_id != $_SESSION['user_id'])
        {
            header('location:/home/index');
            return;
        }

        $this->view('home/detail', $theItem);
    }

    public function edit($item_id)
    {
        $theItem = $this->model('Item')->find($item_id);

        if($theItem->user_id != $_SESSION['user_id'])
        {
            header('location:/home/index');
            return;
        }

        if(isset($_POST['action']))
        {
            $theItem->name = $_POST['name'];
            $theItem->update();
            header('location:/home/index');
        }

        else
        {
            $this->view('home/edit', $theItem);
        }
    }


    public function delete($item_id)
    {
        $theItem = $this->model('Item')->find($item_id);

        if($theItem->user_id != $_SESSION['user_id'])
        {
            header('location:/home/index');
            return;
        }

        if(isset($_POST['action']))
        {
            $theItem->delete();
            header('location:/home/index');
        }

        else
        {
            $this->view('home/delete', $theItem);
        }
    }
}

?>
