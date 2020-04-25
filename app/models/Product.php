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
        $SQL = 'INSERT INTO Product(seller_id, category_id, product_name, product_picture, 
                                    product_details, product_price, product_quantity) 
                    VALUES(:seller_id, :category_id, :product_name, :product_picture, 
                                    :product_details, :product_price, :product_quantity)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['seller_id'=>$this->seller_id, 'category_id'=>$this->category_id, 'product_name'=>$this->product_name,
                        'product_picture'=>$this->product_picture, 'product_details'=>$this->product_details,
                        'product_price'=>$this->product_price, 'product_quantity'=>$this->product_quantity]);
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
        $SQL = 'UPDATE Product 
                   SET category_id = :category_id, product_name = :product_name, product_picture = :product_picture,
                       product_details = :product_details, product_price = :product_price, product_quantity = :product_quantity
                 WHERE product_id = :product_id AND seller_id = :seller_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['product_id'=>$this->product_id, 'seller_id'=>$this->seller_id,
                        'category_id'=>$this->category_id, 'product_name'=>$this->product_name,
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