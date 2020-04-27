<?php

class Book extends Model
{
    var $book_name;
    var $book_description;
    var $book_picture;
    var $book_price;
    var $book_quantity;

    public function get()
    {
        $SQL = 'SELECT * FROM Book';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
        return $stmt->fetchAll();
    }

    public function getBooksForTeacher($teacher_id)
    {
        $SQL = 'SELECT * FROM Book WHERE teacher_id = :teacher_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['teacher_id'=>$teacher_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
        return $stmt->fetchAll();
    }

    public function getTeachersAndBooks()
    {
        $SQL = 'SELECT * FROM Book book
                   INNER JOIN Profile profile
                           ON book.teacher_id = profile.profile_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
        return $stmt->fetchAll();
    }

    public function create()
    {
        $SQL = 'INSERT INTO Book(teacher_id, book_name, book_description, book_picture, book_price, book_quantity) 
                     VALUES(:teacher_id, :book_name, :book_description, :book_picture, :book_price, :book_quantity)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['teacher_id'=>$this->teacher_id, 'book_name'=>$this->book_name,
                        'book_description'=>$this->book_description, 'book_picture'=>$this->book_picture,
                        'book_price'=>$this->book_price, 'book_quantity'=>$this->book_quantity]);
        return $stmt->rowCount();
    }

    public function find($book_id)
    {
        $SQL = 'SELECT * FROM Book WHERE book_id = :book_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['book_id'=>$book_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
        return $stmt->fetch();
    }

    public function update()
    {
        $SQL = 'UPDATE Product 
                   SET product_category = :product_category, product_name = :product_name, product_picture = :product_picture,
                       product_details = :product_details, product_price = :product_price, product_quantity = :product_quantity
                 WHERE product_id = :product_id AND seller_id = :seller_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['product_id'=>$this->product_id, 'seller_id'=>$this->seller_id,
            'product_category'=>$this->product_category, 'product_name'=>$this->product_name,
            'product_picture'=>$this->product_picture, 'product_details'=>$this->product_details,
            'product_price'=>$this->product_price, 'product_quantity'=>$this->product_quantity]);
        return $stmt->rowCount();
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Product WHERE product_id = :product_id AND seller_id = :seller_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['product_id'=>$this->product_id, 'seller_id'=>$this->seller_id ]);
        return $stmt->rowCount();
    }
}

?>