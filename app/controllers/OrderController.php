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
        $orders = $this->model('OrderDetails')->getOrdersForUser($_SESSION['profile_id']);
        $products = $this->model('Product')->get();
        $this->view('order/index', ['products'=>$products, 'orders'=>$orders]);
    }

    public function addToCart($product_id)
    {
        $cart = $this->model('Order')->findProfileCart($_SESSION['profile_id']);

        if($cart == null)
        {
            $cart = $this->model('Order');
            $cart->customer_id = $_SESSION['profile_id'];
            $cart->order_status = 'Cart';
            $cart->order_date = $_POST['order_date'];
            $cart->order_id = $cart->create();
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

}

?>