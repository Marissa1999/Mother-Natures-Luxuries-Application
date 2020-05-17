<?php

/**
 * @accessFilter:{LoginFilter}
 */

class ReviewController extends Controller
{
    public function index($product_id)
    {
        $user_id = (string)$_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $_SESSION['profile_id'] = $theProfile->profile_id;
        $_SESSION['product_id'] = $product_id;
        $reviews = $this->model('Review')->getReviewsForProduct($_SESSION['product_id']);
        $profiles = $this->model('Profile')->getSellersAndProducts();
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $this->view('review/index', ['reviews' => $reviews, 'profiles' => $profiles, 'theProfile' => $theProfile]);
    }

    public function create()
    {
        $theProduct = $this->model('Product')->find($_SESSION['product_id']);

        if (isset($_POST['action'])) {
            $newReview = $this->model('Review');
            $newReview->product_rating = $_POST['product_rating'];
            $newReview->review_comment = $_POST['review_comment'];
            $newReview->review_timestamp = $_POST['review_timestamp'];
            $newReview->customer_id = $_SESSION['profile_id'];
            $newReview->product_id = $_SESSION['product_id'];
            $newReview->create();
            header('location:/review/index/' . $_SESSION['product_id']);
        } else {
            $this->view('review/create', $theProduct);
        }
    }

    public function edit($review_id)
    {
        $theReview = $this->model('Review')->find($review_id);

        if (isset($_POST['action'])) {
            $theReview->product_rating = $_POST['product_rating'];
            $theReview->review_comment = $_POST['review_comment'];
            $theReview->review_timestamp = $_POST['review_timestamp'];
            $theReview->update();
            header('location:/review/index/' . $_SESSION['product_id']);
        } else {
            $this->view('review/edit', $theReview);
        }
    }

    public function delete($review_id)
    {
        $theReview = $this->model('Review')->find($review_id);

        if (isset($_POST['action'])) {
            $theReview->delete();
            header('location:/review/index/' . $_SESSION['product_id']);
        } else {
            $this->view('review/delete', $theReview);
        }
    }
}

?>