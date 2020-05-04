<?php

/**
 * @accessFilter:{LoginFilter}
 */

class MessageController extends Controller
{

    public function index()
    {
        $user_id = (string) $_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $_SESSION['profile_id'] = $theProfile->profile_id;
        $profiles = $this->model('Profile')->get();
        $this->view('message/index', ['profiles'=>$profiles]);
    }

    public function viewMessages($profile_id)
    {
        $user_id = (string) $_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $_SESSION['message_sender'] = $theProfile->profile_id;
        $_SESSION['message_receiver'] = $profile_id;
        $messages = $this->model('Message')->getMessageReceiver($_SESSION['message_receiver']);
        $this->view('message/viewMessages', ['messages'=>$messages]);
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
            header('location:/home/index');
        }

        else
        {
            $this->view('book/create');
        }
    }

    public function edit($book_id)
    {
        $theBook = $this->model('Book')->find($book_id);

        if(isset($_POST['action']))
        {
            $theBook->book_name = $_POST['book_name'];
            $theBook->book_picture = $_POST['book_picture'];
            $theBook->book_description = $_POST['book_description'];
            $theBook->book_price = $_POST['book_price'];
            $theBook->book_quantity = $_POST['book_quantity'];
            $theBook->update();
            header('location:/home/index');
        }

        else
        {
            $this->view('book/edit', $theBook);
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