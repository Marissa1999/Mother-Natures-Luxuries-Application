<?php

class Promotion extends Model
{
    var $promotion_price;
    var $promotion_timestamp;

    public function getPromotionForSeller($product_id, $seller_id)
    {
        $SQL = 'SELECT * FROM Promotion WHERE product_id = :product_id AND seller_id = :seller_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['product_id' => $product_id, 'seller_id' => $seller_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Promotion');
        return $stmt->fetchAll();
    }

    public function create()
    {
        $SQL = 'INSERT INTO Promotion(product_id, seller_id, promotion_price, promotion_timestamp) 
                    VALUES(:product_id, :seller_id, :promotion_price, :promotion_timestamp)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['product_id' => $this->product_id, 'seller_id' => $this->seller_id,
            'promotion_price' => $this->promotion_price, 'promotion_timestamp' => $this->promotion_timestamp]);
        return $stmt->rowCount();
    }

    public function find($promotion_id)
    {
        $SQL = 'SELECT * FROM Promotion WHERE promotion_id = :promotion_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['promotion_id' => $promotion_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Promotion');
        return $stmt->fetch();
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Promotion WHERE promotion_id = :promotion_id AND product_id = :product_id AND seller_id = :seller_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['promotion_id' => $this->promotion_id, 'product_id' => $this->product_id, 'seller_id' => $this->seller_id]);
        return $stmt->rowCount();
    }
}

?>