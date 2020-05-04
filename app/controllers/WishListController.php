<?php

/**
 * @accessFilter:{LoginFilter}
 */

class WishListController extends Controller
{
    public function index()
    {
        $user_id = (string) $_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $_SESSION['profile_id'] = $theProfile->profile_id;
        $wishes = $this->model('WishList')->getWishesForCustomer($_SESSION['profile_id']);
        $this->view('wishlist/index', ['wishes'=>$wishes]);
    }

    public function create()
    {
        if(isset($_POST['action']))
        {
            $newWish = $this->model('WishList');
            $product_id = (string) $_SESSION['product_id'];
            $theProduct = $this->model('Product')->find($product_id);
            $_SESSION['product_id'] = $theProduct->product_id;

            $newWish->customer_id= $_SESSION['profile_id'];
            $newWish->product_id= $_SESSION['product_id'];
            $newWish->create();
            header('location:/wishlist/index');
        }

        else
        {
            $this->view('wishlist/create');
        }
    }

    public function delete($book_id)
    {
        $theBook = $this->model('Book')->find($book_id);

        if(isset($_POST['action']))
        {
            $theBook->delete();
            header('location:/home/index');
        }

        else
        {
            $this->view('book/delete', $theBook);
        }
    }
}

?>