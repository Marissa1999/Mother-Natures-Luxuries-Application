<?php

/**
 * @accessFilter:{LoginFilter}
 */

class BookController extends Controller
{
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


    public function search()
    {
        $user_id = (string) $_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $_SESSION['profile_id'] = $theProfile->profile_id;
        $profiles = $this->model('Book')->getTeachersAndBooks();

        if(isset($_POST['search']))
        {
            $books = $this->model('Book')->searchBooks($_POST['search_input']);
            $this->view('book/search', ['books'=>$books, 'profiles'=>$profiles]);
        }

        else if(isset($_POST['nameSortAsc']))
        {
            $books = $this->model('Book')->sortNameAscending();
            $this->view('book/search', ['books'=>$books, 'profiles'=>$profiles]);
        }

        else if(isset($_POST['nameSortDesc']))
        {
            $books = $this->model('Book')->sortNameDescending();
            $this->view('book/search', ['books'=>$books, 'profiles'=>$profiles]);
        }

        else if(isset($_POST['priceSortAsc']))
        {
            $books = $this->model('Book')->sortPriceAscending();
            $this->view('book/search', ['books'=>$books, 'profiles'=>$profiles]);
        }

        else if(isset($_POST['priceSortDesc']))
        {
            $books = $this->model('Book')->sortPriceDescending();
            $this->view('book/search', ['books'=>$books, 'profiles'=>$profiles]);
        }

        else
        {
            $books = $this->model('Book')->get();
            $this->view('book/search', ['books'=>$books, 'profiles'=>$profiles]);
        }
    }

    /**
     * @accessFilter:{BookOwner}
     */

	public function detail($book_id)
	{
		$theBook = $this->model('Book')->find($book_id);
		$this->view('book/detail', $theBook);
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