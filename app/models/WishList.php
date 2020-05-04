<?php

class WishList extends Model
{
    var $quantity;

    public function getWishesForCustomer($customer_id)
    {
        $SQL = 'SELECT * FROM WishList WHERE customer_id = :customer_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['customer_id'=>$customer_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'WishList');
        return $stmt->fetchAll();
    }

    public function getProductWishes()
    {
        $SQL = 'SELECT * FROM WishList wish
                   INNER JOIN Product product
                           ON wish.product_id = product.product_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'WishList');
        return $stmt->fetchAll();
    }

    public function create()
    {
        $SQL = 'INSERT INTO WishList(customer_id, product_id) 
                     VALUES(:customer_id, :product_id)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['customer_id'=>$this->customer_id, 'product_id'=>$this->product_id]);
        return $stmt->rowCount();
    }

    public function find($wish_id)
    {
        $SQL = 'SELECT * FROM Book WHERE book_id = :book_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['book_id'=>$book_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
        return $stmt->fetch();
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