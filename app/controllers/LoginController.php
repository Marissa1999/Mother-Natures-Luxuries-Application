<?php

class LoginController extends Controller
{

	public function index()
	{
		if(isset($_POST['action']))
		{
            $theUser = $this->model('User')->findUser($_POST['username']);

           if($theUser != null && password_verify($_POST['password'], $theUser->password_hash))
           {
            	$_SESSION['user_id'] = $theUser->user_id;
            	$id = (string) $_SESSION['user_id'];
                $theProfile = $this->model('Profile')->findProfile($id);

            	if($theProfile != null)
                {
                    header('location:/home/index');
                }

            	else
                {
                    header('location:/profile/create');
                }

           }

           else
           {
           		$this->view('login/index', 'Incorrect Username/Password Combination!');
           }
        }

		else
		{
			$this->view('login/index');
		}
	}

	public function register()
	{
		if(isset($_POST['action']))
		{
			$newUser = $this->model('User');
			$theUser = $newUser->findUser($_POST['username']);

			if($theUser == null && $_POST['password'] == $_POST['password_confirm'])
			{	    
				$newUser->username = $_POST['username'];
				$newUser->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
			    $newUser->create();
			    header('location:/login/index');
			}	

			$this->view('login/register', 'Username Already in Use or Passwords Did Not Match!');
		}

		else
		{
			$this->view('login/register');
		}

	}

	 public function logout()
	 {
	 	session_destroy();
	 	header('location:/login/index');
	 }

}

?>