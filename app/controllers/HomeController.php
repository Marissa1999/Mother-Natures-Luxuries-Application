<?php

/**
 * @accessFilter:{LoginFilter}
 */

class HomeController extends Controller
{
    public function index()
    {
        $user_id = (string)$_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $_SESSION['profile_id'] = $theProfile->profile_id;
        $products = $this->model('Product')->getProductsForSeller($_SESSION['profile_id']);
        $books = $this->model('Book')->getBooksForTeacher($_SESSION['profile_id']);
        $profile = $this->model('Profile')->findProfile($user_id);
        $notifications = $this->model('Notification')->getNotifications($_SESSION['profile_id']);
        $this->view('home/index', ['products' => $products, 'books' => $books, 'profile' => $profile, 'notifications' => $notifications]);
    }

    public function create()
    {
        if (isset($_FILES['product_picture']) && $_FILES['product_picture']['error'] == UPLOAD_ERR_OK) {
            $info = getimagesize($_FILES['product_picture']['tmp_name']);
            $allowedTypes = [IMAGETYPE_JPEG => '.jpg', IMAGETYPE_PNG => '.png', IMAGETYPE_GIF => '.gif'];

            if ($info === false) {
                $this->view('home/create', ['error' => 'Bad File Format']);
            } else if (!array_key_exists($info[2], $allowedTypes)) {
                $this->view('home/create', ['error' => 'Not an Accepted File Type']);
            } else {
                $path = getcwd() . DIRECTORY_SEPARATOR . 'product_images' . DIRECTORY_SEPARATOR;
                $filename = uniqid() . $allowedTypes[$info[2]];
                move_uploaded_file($_FILES['product_picture']['tmp_name'], $path . $filename);

                $newProduct = $this->model('Product');
                $profile = $this->model('Profile');
                $newProduct->product_name = $_POST['product_name'];
                $newProduct->product_picture = $filename;
                $newProduct->product_details = $_POST['product_details'];
                $newProduct->product_price = $_POST['product_price'];
                $newProduct->product_quantity = $_POST['product_quantity'];
                $newProduct->product_category = $_POST['product_category'];
                $newProduct->seller_id = $_SESSION['profile_id'];
                $newProduct->create();
                $this->sendNotification($_POST['product_category'], $_POST['product_name']);
                header('location:/home/index');
            }
        } else {
            $this->view('home/create');
        }
    }

    public function modifyPassword()
    {
        $user_id = (string)$_SESSION['user_id'];
        $theUser = $this->model('User')->find($user_id);

        if (isset($_POST['action'])) {
            if ($_POST['new_password'] == $_POST['password_confirmation']) {
                $theUser->password_hash = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
                $theUser->updatePassword();
                header('location:/home/index');
            }

            $this->view('home/modifyPassword', 'Both New Passwords Did Not Match!');
        } else {
            $this->view('home/modifyPassword');
        }
    }

    public function search()
    {
        $user_id = (string)$_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $_SESSION['profile_id'] = $theProfile->profile_id;
        $profiles = $this->model('Profile')->getSellersAndProducts();
        $theProfile = $this->model('Profile')->findProfile($user_id);

        if (isset($_POST['search'])) {
            $products = $this->model('Product')->searchProducts($_POST['search_input']);
            $this->view('home/search', ['products' => $products, 'profiles' => $profiles, 'theProfile'=>$theProfile]);
        } else if (isset($_POST['nameSortAsc'])) {
            $products = $this->model('Product')->sortNameAscending();
            $this->view('home/search', ['products' => $products, 'profiles' => $profiles, 'theProfile'=>$theProfile]);
        } else if (isset($_POST['nameSortDesc'])) {
            $products = $this->model('Product')->sortNameDescending();
            $this->view('home/search', ['products' => $products, 'profiles' => $profiles, 'theProfile'=>$theProfile]);
        } else if (isset($_POST['priceSortAsc'])) {
            $products = $this->model('Product')->sortPriceAscending();
            $this->view('home/search', ['products' => $products, 'profiles' => $profiles, 'theProfile'=>$theProfile]);
        } else if (isset($_POST['priceSortDesc'])) {
            $products = $this->model('Product')->sortPriceDescending();
            $this->view('home/search', ['products' => $products, 'profiles' => $profiles, 'theProfile'=>$theProfile]);
        } else if (isset($_POST['categorySortAsc'])) {
            $products = $this->model('Product')->sortCategoryAscending();
            $this->view('home/search', ['products' => $products, 'profiles' => $profiles, 'theProfile'=>$theProfile]);
        } else if (isset($_POST['categorySortDesc'])) {
            $products = $this->model('Product')->sortCategoryDescending();
            $this->view('home/search', ['products' => $products, 'profiles' => $profiles, 'theProfile'=>$theProfile]);
        } else {
            $products = $this->model('Product')->get();
            $this->view('home/search', ['products' => $products, 'profiles' => $profiles, 'theProfile'=>$theProfile]);
        }
    }

    /**
     * @accessFilter:{ProductOwner}
     */

    public function edit($product_id)
    {
        $theProduct = $this->model('Product')->find($product_id);

        if (isset($_FILES['product_picture']) && $_FILES['product_picture']['error'] == UPLOAD_ERR_OK) {
            $info = getimagesize($_FILES['product_picture']['tmp_name']);
            $allowedTypes = [IMAGETYPE_JPEG => '.jpg', IMAGETYPE_PNG => '.png', IMAGETYPE_GIF => '.gif'];

            if ($info === false) {
                $this->view('home/edit', ['error' => 'Bad File Format']);
            } else if (!array_key_exists($info[2], $allowedTypes)) {
                $this->view('home/edit', ['error' => 'Not an Accepted File Type']);
            } else {
                unlink(getcwd() . DIRECTORY_SEPARATOR . 'product_images' . DIRECTORY_SEPARATOR . $theProduct->product_picture);
                $path = getcwd() . DIRECTORY_SEPARATOR . 'product_images' . DIRECTORY_SEPARATOR;
                $filename = uniqid() . $allowedTypes[$info[2]];
                move_uploaded_file($_FILES['product_picture']['tmp_name'], $path . $filename);

                $theProduct->product_name = $_POST['product_name'];
                $theProduct->product_picture = $filename;
                $theProduct->product_details = $_POST['product_details'];
                $theProduct->product_price = $_POST['product_price'];
                $theProduct->product_quantity = $_POST['product_quantity'];
                $theProduct->product_category = $_POST['product_category'];
                $theProduct->update();
                header('location:/home/index');
            }
        } else {
            $this->view('home/edit', $theProduct);
        }
    }

    public function delete($product_id)
    {
        $theProduct = $this->model('Product')->find($product_id);

        if (isset($_POST['action'])) {
            unlink(getcwd() . DIRECTORY_SEPARATOR . 'product_images' . DIRECTORY_SEPARATOR . $theProduct->product_picture);
            $theProduct->delete();
            header('location:/home/index');
        } else {
            $this->view('home/delete', $theProduct);
        }
    }
    public function sendNotification($category, $text)
    {
        $allProfiles = $this->model('Profile')->getUsersByTheme($category);
        $this->model('Notification')->createNotifications($allProfiles , $text);

    }
}

?>