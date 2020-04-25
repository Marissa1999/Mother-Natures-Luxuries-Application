<?php

/**
 * @accessFilter:{LoginFilter}
 */

class HomeController extends Controller
{
    public function index()
	{
		$items = $this->model('Item')->getForUser($_SESSION['user_id']);
		$this->view('home/index', ['items'=>$items]);
	}

	public function create()
	{
		if(isset($_POST['action']))
		{
           $newItem = $this->model('Item');
           $newItem->name = $_POST['name'];
           $newItem->user_id= $_SESSION['user_id'];
           $newItem->create();
           header('location:/home/index');
		}

		else
		{
			$this->view('home/create');
		}
	}

	public function modifyPassword()
    {
        $id = (string) $_SESSION['user_id'];
        $theUser = $this->model('User')->find($id);

        if(isset($_POST['action']))
        {
            if($_POST['new_password'] == $_POST['password_confirmation'])
            {
                $theUser->password_hash = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
                $theUser->updatePassword();
                header('location:/home/index');
            }

            $this->view('home/modifyPassword', 'Password Already in Use or Both New Passwords Did Not Match!');
        }

        else
        {
            $this->view('home/modifyPassword');
        }
    }

    /**
     * @accessFilter:{itemOwner}
     */

	public function detail($item_id)
	{
		$theItem = $this->model('Item')->find($item_id);
		$this->view('home/detail', $theItem);
	}

	public function edit($item_id)
	{
		$theItem = $this->model('Item')->find($item_id);

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