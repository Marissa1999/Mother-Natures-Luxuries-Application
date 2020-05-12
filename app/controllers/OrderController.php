<?php

/**
 * @accessFilter:{LoginFilter}
 */

class OrderController extends Controller
{
    public function index()
    {
        $user_id = (string) $_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $_SESSION['profile_id'] = $theProfile->profile_id;

        $cart = $this->model('Order')->findProfileCart($_SESSION['profile_id']);

        if($cart == null)
        {
            $cart = $this->makeCart();
        }

        $orders = $this->model('OrderDetails')->getOrderForUser($_SESSION['profile_id']);
        $products = $this->model('Product')->get();
        $this->view('order/index', ['products'=>$products, 'orders'=>$orders]);
    }

    public function addToCart($product_id)
    {
        $cart = $this->model('Order')->findProfileCart($_SESSION['profile_id']);

        if($cart == null)
        {
            $cart = $this->makeCart();
        }

        $newItem = $this->model('OrderDetails');
        $newItem->order_id = $cart->order_id;
        $newItem->product_id = $product_id;
        $newItem->order_price = $this->model('Product')->find($product_id)->product_price;
        $newItem->order_quantity = 1;
        $newItem->create();
        header('location:/order/index');
    }

    public function removeFromCart($order_item_id)
    {
        $item = $this->model('OrderDetails')->find($order_item_id);
        $item->delete();
        header('location:/order/index');
    }

    public function editQuantity($order_item_id)
    {
        $theItem = $this->model('OrderDetails')->find($order_item_id);

        if(isset($_POST['action']))
        {
            $theItem->order_quantity = $_POST['order_quantity'];
            $theItem->update();
            header('location:/order/index');
        }

        else
        {
            $this->view('order/editQuantity', $theItem);
        }
    }

    public function makeCart()
    {
        $cart = $this->model('Order');
        $cart->customer_id = $_SESSION['profile_id'];
        $cart->order_status = 'Cart';
        $cart->order_date = $_POST['order_date'];
        $cart->order_id = $cart->create();
        return $cart;
    }

    public function setHistory()
    {
        $history = $this->model('Order');
        $history->customer_id = $_SESSION['profile_id'];
        $history->order_status = 'Paid';
        $history->order_date = $_POST['order_date'];
        $history->order_id = $history->create();
        return $history;
    }

    public function history()
    {
        $user_id = (string) $_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $_SESSION['profile_id'] = $theProfile->profile_id;

        $history = $this->model('Order')->findProfileHistory($_SESSION['profile_id']);

        if($history == null)
        {
            $history = $this->setHistory();
        }

        $orders = $this->model('OrderDetails')->getOrderForUser($history->customer_id);
        $products = $this->model('Product')->get();
        $this->view('order/history', ['products'=>$products, 'orders'=>$orders]);
    }

    public function checkout()
    {
        $cart = $this->model('Order')->findProfileCart($_SESSION['profile_id']);
        $cart->order_date = $_POST['order_date'];
        $cart->order_status = 'Paid';
        $cart->update();
        header('location:/order/index');
    }

}

?>