<?php

/**
 * @accessFilter:{LoginFilter}
 */

class BookController extends Controller
{
    public function index()
    {
        $user_id = (string) $_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $_SESSION['profile_id'] = $theProfile->profile_id;
        $books = $this->model('Book')->get();
        $profiles = $this->model('Book')->getTeachersAndBooks();
        $this->view('book/index', ['books'=>$books, 'profiles'=>$profiles]);
    }

    public function create()
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
            header('location:/book/index');
        }

        else
        {
            $this->view('book/create');
        }
    }

    /**
     * @accessFilter:{BookOwner}
     */

    public function edit($book_id)
    {
        $theBook = $this->model('Book')->find($book_id);

        if(isset($_POST['action']))
        {
            $theBook = $this->model('Product');
            $theBook->book_name = $_POST['book_name'];
            $theBook->book_picture = $_POST['book_picture'];
            $theBook->book_description = $_POST['book_description'];
            $theBook->book_price = $_POST['book_price'];
            $theBook->book_quantity = $_POST['book_quantity'];
            $theBook->teacher_id= $_SESSION['profile_id'];
            $theBook->update();
            header('location:/book/index');
        }

        else
        {
            $this->view('book/edit');
        }
    }

    public function delete($book_id)
    {
        $theBook = $this->model('Book')->find($book_id);

        if(isset($_POST['action']))
        {
            $theBook->delete();
            header('location:/book/index');
        }

        else
        {
            $this->view('book/delete', $theBook);
        }
    }
}

?>