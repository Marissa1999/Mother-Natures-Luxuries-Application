<?php

class Product extends Model
{
    var $product_name;
    var $product_picture;
    var $product_details;
    var $product_price;
    var $product_quantity;
    var $product_category;

    public function get()
    {
        $SQL = 'SELECT * FROM Product';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetchAll();
    }

    public function getProductsForSeller($seller_id)
    {
        $SQL = 'SELECT * FROM Product WHERE seller_id = :seller_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['seller_id' => $seller_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetchAll();
    }

    public function searchProducts($search_input)
    {
        $SQL = "SELECT * FROM Product WHERE product_name LIKE '%$search_input%'
                OR product_details LIKE '%$search_input%'";
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['product_name' => $search_input, 'product_details' => $search_input]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetchAll();
    }

    public function sortNameAscending()
    {
        $SQL = 'SELECT * FROM Product ORDER BY product_name';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetchAll();
    }

    public function sortNameDescending()
    {
        $SQL = 'SELECT * FROM Product ORDER BY product_name DESC';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetchAll();
    }

    public function sortPriceAscending()
    {
        $SQL = 'SELECT * FROM Product ORDER BY product_price';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetchAll();
    }

    public function sortPriceDescending()
    {
        $SQL = 'SELECT * FROM Product ORDER BY product_price DESC';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetchAll();
    }

    public function sortCategoryAscending()
    {
        $SQL = 'SELECT * FROM Product ORDER BY product_category';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetchAll();
    }

    public function sortCategoryDescending()
    {
        $SQL = 'SELECT * FROM Product ORDER BY product_category DESC';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetchAll();
    }

    public function create()
    {
        $SQL = 'INSERT INTO Product(seller_id, product_category, product_name, product_picture, 
                                    product_details, product_price, product_quantity) 
                    VALUES(:seller_id, :product_category, :product_name, :product_picture, 
                                    :product_details, :product_price, :product_quantity)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['seller_id' => $this->seller_id, 'product_category' => $this->product_category, 'product_name' => $this->product_name,
            'product_picture' => $this->product_picture, 'product_details' => $this->product_details,
            'product_price' => $this->product_price, 'product_quantity' => $this->product_quantity]);
        return $stmt->rowCount();
    }

    public function find($product_id)
    {
        $SQL = 'SELECT * FROM Product WHERE product_id = :product_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['product_id' => $product_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetch();
    }

    public function update()
    {
        $SQL = 'UPDATE Product 
                   SET product_category = :product_category, product_name = :product_name, product_picture = :product_picture,
                       product_details = :product_details, product_price = :product_price, product_quantity = :product_quantity
                 WHERE product_id = :product_id AND seller_id = :seller_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['product_id' => $this->product_id, 'seller_id' => $this->seller_id,
            'product_category' => $this->product_category, 'product_name' => $this->product_name,
            'product_picture' => $this->product_picture, 'product_details' => $this->product_details,
            'product_price' => $this->product_price, 'product_quantity' => $this->product_quantity]);
        return $stmt->rowCount();
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Product WHERE product_id = :product_id AND seller_id = :seller_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['product_id' => $this->product_id, 'seller_id' => $this->seller_id]);
        return $stmt->rowCount();
    }
}

?>