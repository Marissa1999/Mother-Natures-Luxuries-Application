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
        $SQL = 'UPDATE Book
                   SET book_name = :book_name, book_description = :book_description, book_picture = :book_picture,
                       book_price = :book_price, book_quantity = :book_quantity
                 WHERE book_id = :book_id AND teacher_id = :teacher_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['book_id'=>$this->book_id, 'teacher_id'=>$this->teacher_id,
                        'book_name'=>$this->book_name, 'book_description'=>$this->book_description,
                        'book_picture'=>$this->book_picture, 'book_price'=>$this->book_price,
                        'book_quantity'=>$this->book_quantity]);
        return $stmt->rowCount();
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Book WHERE book_id = :book_id AND teacher_id = :teacher_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['book_id'=>$this->book_id, 'teacher_id'=>$this->teacher_id ]);
        return $stmt->rowCount();
    }
}

?>