<?php

/**
 * @accessFilter:{LoginFilter}
 */

class WishListController extends Controller
{
    public function index()
    {
        $user_id = (string)$_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $_SESSION['profile_id'] = $theProfile->profile_id;
        $wishes = $this->model('WishList')->getWishesForCustomer($_SESSION['profile_id']);
        $products = $this->model('Product')->get();
        $profiles = $this->model('Profile')->find($_SESSION['profile_id']);
        $this->view('wishlist/index', ['wishes' => $wishes, 'profiles' => $profiles, 'products' => $products]);
    }

    public function create()
    {
        $_SESSION['product_id'] = $_GET['product_id'];

        if (isset($_POST['action'])) {
            $newWish = $this->model('WishList');
            $newWish->customer_id = $_SESSION['profile_id'];
            $newWish->product_id = $_SESSION['product_id'];
            $newWish->create();
            header('location:/wishlist/index');
        } else {
            $this->view('wishlist/create');
        }
    }

    public function delete($wish_id)
    {
        $theWish = $this->model('WishList')->find($wish_id);

        if (isset($_POST['action'])) {
            $theWish->delete();
            header('location:/wishlist/index');
        } else {
            $this->view('wishlist/delete', $theWish);
        }
    }
}

?>