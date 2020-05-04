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
        $payments = $this->model('Payment')->getPaymentForCustomer($_SESSION['profile_id']);
        $this->view('payment/index', ['payments'=>$payments]);
    }

    public function create($product_id)
    {
        if(isset($_POST['action']))
        {
            $newBook = $this->model('Book');
            $newBook->book_name = $_POST['book_name'];
            $newBook->book_picture = $_POST['book_picture'];
            $newBook->book_description = $_POST['book_description'];
            $newBook->book_price = $_POST['book_price'];
            $newBook->book_quantity = $_POST['book_quantity'];
            $newBook->teacher_id= $_SESSION['profile_id'];
            $newBook->create();
            header('location:/home/index');
        }

        else
        {
            $this->view('book/create');
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