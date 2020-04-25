<?php

class Product extends Model
{
    var $product_name;
    var $product_picture;
    var $product_details;
    var $product_price;
    var $product_quantity;
    var $category_id;

    public function get()
    {
        $SQL = 'SELECT * FROM Product';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetchAll();
    }

    public function getForSeller($seller_id)
    {
        $SQL = 'SELECT * FROM Product WHERE seller_id = :seller_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['seller_id'=>$seller_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetchAll();
    }

    public function create()
    {
        $SQL = 'INSERT INTO Item(name, user_id) VALUES(:name, :user_id)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['name'=>$this->name, 'user_id'=>$this->user_id]);
        return $stmt->rowCount();
    }

    public function find($product_id)
    {
        $SQL = 'SELECT * FROM Product WHERE product_id = :product_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['product_id'=>$product_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetch();
    }

    public function update()
    {
        $SQL = 'UPDATE Item SET name = :name WHERE item_id = :item_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['name'=>$this->name, 'item_id'=>$this->item_id]);
        return $stmt->rowCount();
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Product WHERE product_id = :product_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['product_id'=>$this->product_id]);
        return $stmt->rowCount();
    }


}

?>