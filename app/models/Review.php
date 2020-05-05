<?php

class Review extends Model
{
    var $product_rating;
    var $review_comment;
    var $review_timestamp;

    public function getReviewsForProduct($product_id)
    {
        $SQL = 'SELECT * FROM Review WHERE product_id = :product_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['product_id'=>$product_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Review');
        return $stmt->fetchAll();
    }

    public function create()
    {
        $SQL = 'INSERT INTO Review(customer_id, product_id, product_rating, review_comment, review_timestamp) 
                    VALUES(:customer_id, :product_id, :product_rating, :review_comment, :review_timestamp) ';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['customer_id'=>$this->customer_id, 'product_id'=>$this->product_id,
                        'product_rating'=>$this->product_rating, 'review_comment'=>$this->review_comment,
                        'review_timestamp'=>$this->review_timestamp]);
        return $stmt->rowCount();
    }

    public function find($review_id)
    {
        $SQL = 'SELECT * FROM Review WHERE review_id = :review_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['review_id'=>$review_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Review');
        return $stmt->fetch();
    }

    public function update()
    {
        $SQL = 'UPDATE Review
                   SET product_rating = :product_rating, 
                       review_comment = :review_comment,
                       review_timestamp = :review_timestamp
                 WHERE review_id = :review_id AND customer_id = :customer_id AND product_id = :product_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['customer_id'=>$this->customer_id, 'product_id'=>$this->product_id,
                        'review_id'=>$this->review_id, 'product_rating'=>$this->product_rating,
                        'review_comment'=>$this->review_comment, 'review_timestamp'=>$this->review_timestamp]);
        return $stmt->rowCount();
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Review WHERE review_id = :review_id AND customer_id = :customer_id AND product_id = :product_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['review_id'=>$this->card_id, 'customer_id'=>$this->customer_id, 'product_id'=>$this->product_id]);
        return $stmt->rowCount();
    }
}

?>