<?php

/**
 * @accessFilter:{LoginFilter}
 */

class PromotionController extends Controller
{
    public function index()
    {
        $user_id = (string) $_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $_SESSION['profile_id'] = $theProfile->profile_id;
        $theProduct = $this->model('Product')->getProductForSeller($_SESSION['profile_id']);
        $_SESSION['product_id'] = $theProduct->product_id;
        $promotions = $this->model('Promotion')->getPromotionForSeller($_SESSION['product_id'], $_SESSION['profile_id']);
        $this->view('promotion/index'.$_SESSION['product_id'], ['promotions'=>$promotions]);
    }

    public function create()
    {
        if(isset($_POST['action']))
        {
            $newPromotion = $this->model('Promotion');
            $newPromotion->promotion_price = $_POST['promotion_price'];
            $newPromotion->promotion_timestamp = $_POST['promotion_timestamp'];
            $newPromotion->seller_id= $_SESSION['profile_id'];
            $newPromotion->product_id= $_SESSION['product_id'];
            $newPromotion->create();
            header('location:/promotion/index'.$newPromotion->product_id);
        }

        else
        {
            $this->view('promotion/create');
        }
    }

    /**
     * @accessFilter:{ProductOwner}
     */

    public function delete($promotion_id)
    {
        $thePromotion = $this->model('Promotion')->find($promotion_id);

        if(isset($_POST['action']))
        {
            $thePromotion->delete();
            header('location:/promotion/index');
        }

        else
        {
            $this->view('promotion/delete', $thePromotion);
        }
    }
}

?>