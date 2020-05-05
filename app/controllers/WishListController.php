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
            $products = $this->model('Product')->getProductsForSeller($_SESSION['profile_id']);
            $profiles = $this->model('Profile')->getSellersAndProducts();

            $theProduct = $this->model('WishList')->getProductWishes();
            $_SESSION['product_id'] = $theProduct->product_id;

            $newWish = $this->model('WishList');
            $newWish->customer_id= $_SESSION['profile_id'];
            $newWish->product_id= $_SESSION['product_id'];
            $newWish->create();
            header('location:/wishlist/index', ['products'=>$products, 'profiles'=>$profiles]);
        }

        else
        {
            $this->view('wishlist/create');
        }
    }

    public function delete($wish_id)
    {
        $theWish = $this->model('Wish')->find($wish_id);

        if(isset($_POST['action']))
        {
            $theWish->delete();
            header('location:/wishlist/index');
        }

        else
        {
            $this->view('wishlist/delete', $theWish);
        }
    }
}

?>