<?php

/**
 * @accessFilter:{LoginFilter}
 */

class PaymentController extends Controller
{
    public function index()
    {
        $user_id = (string) $_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $_SESSION['profile_id'] = $theProfile->profile_id;
        $payments = $this->model('Payment')->getPaymentForCustomer($_SESSION['profile_id']);
        $this->view('payment/index', ['payments'=>$payments]);
    }

    public function create()
    {

        if(isset($_POST['action']))
        {
            $newPayment = $this->model('Payment');
            $newPayment->card_number = $_POST['card_number'];
            $newPayment->card_company = $_POST['card_company'];
            $newPayment->expiration_date = $_POST['expiration_date'];
            $newPayment->card_cvc = $_POST['card_cvc'];
            $newPayment->customer_id= $_SESSION['profile_id'];
            $newPayment->create();
            header('location:/payment/index');
        }

        else
        {
            $this->view('payment/create');
        }
    }

    public function edit($card_id)
    {
        $thePayment = $this->model('Payment')->find($card_id);

        if(isset($_POST['action']))
        {
            $thePayment->card_number = $_POST['card_number'];
            $thePayment->card_company = $_POST['card_company'];
            $thePayment->expiration_date = $_POST['expiration_date'];
            $thePayment->card_cvc = $_POST['card_cvc'];
            $thePayment->update();
            header('location:/payment/index');
        }

        else
        {
            $this->view('payment/edit', $thePayment);
        }
    }

    public function delete($card_id)
    {
        $thePayment = $this->model('Payment')->find($card_id);

        if(isset($_POST['action']))
        {
            $thePayment->delete();
            header('location:/payment/index');
        }

        else
        {
            $this->view('payment/delete', $thePayment);
        }
    }
}

?>