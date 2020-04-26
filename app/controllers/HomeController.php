<?php

/**
 * @accessFilter:{LoginFilter}
 */

class HomeController extends Controller
{
    public function index()
	{
        $user_id = (string) $_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $_SESSION['profile_id'] = $theProfile->profile_id;
		$products = $this->model('Product')->getForSeller($_SESSION['profile_id']);
		$this->view('home/index', ['products'=>$products]);
	}

	public function create()
	{
		if(isset($_POST['action']))
		{
           $newProduct = $this->model('Product');
           $newProduct->product_name = $_POST['product_name'];
           $newProduct->product_picture = $_POST['product_picture'];
           $newProduct->product_details = $_POST['product_details'];
           $newProduct->product_price = $_POST['product_price'];
           $newProduct->product_quantity = $_POST['product_quantity'];
           $newProduct->product_category= $_POST['product_category'];
           $newProduct->seller_id= $_SESSION['profile_id'];
           $newProduct->create();
           header('location:/home/index');
		}

		else
		{
			$this->view('home/create');
		}
	}

	public function modifyPassword()
    {
        $user_id = (string) $_SESSION['user_id'];
        $theUser = $this->model('User')->find($user_id);

        if(isset($_POST['action']))
        {
            if($_POST['new_password'] == $_POST['password_confirmation'])
            {
                $theUser->password_hash = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
                $theUser->updatePassword();
                header('location:/home/index');
            }

            $this->view('home/modifyPassword', 'Both New Passwords Did Not Match!');
        }

        else
        {
            $this->view('home/modifyPassword');
        }
    }

    public function search($search_input)
        {
            $searchProduct = $this->model('Product');

            if(isset($_POST['action']))
            {
                $searchResult = $this->model('Product')->searchProducts($search_input, $searchProduct->product_name, $searchProduct->product_details);
                $this->view('home/index', ['searchResult' => $searchResult]);
            }

            else
            {
                $products = $this->model('Product')->getForSeller($_SESSION['profile_id']);
                $this->view('home/index', ['products'=>$products]);
            }
        }

/*
	public function detail($product_id)
	{
		$theProduct = $this->model('Product')->find($product_id);
		$this->view('home/detail', $theProduct);
	}
*/

    /**
     * @accessFilter:{ProductOwner}
     */

	public function edit($product_id)
	{
		$theProduct = $this->model('Product')->find($product_id);

		if(isset($_POST['action']))
		{
           $theProduct->product_name = $_POST['product_name'];
           $theProduct->product_picture = $_POST['product_picture'];
           $theProduct->product_details = $_POST['product_details'];
           $theProduct->product_price = $_POST['product_price'];
           $theProduct->product_quantity = $_POST['product_quantity'];
           $theProduct->product_category= $_POST['product_category'];
           $theProduct->update();
           header('location:/home/index');
		}

		else
		{
			$this->view('home/edit', $theProduct);
		}
	}

	public function delete($product_id)
	{
		$theProduct = $this->model('Product')->find($product_id);

		if(isset($_POST['action']))
		{
           $theProduct->delete();
           header('location:/home/index');
		}

		else
		{
			$this->view('home/delete', $theProduct);
		}
	}
}

?>