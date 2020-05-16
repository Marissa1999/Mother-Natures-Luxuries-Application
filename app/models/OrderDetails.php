<?php

class OrderDetails extends Model
{
    var $product_id;
    var $order_id;
    var $order_price;
    var $order_quantity;

    public function getOrderForUser($customer_id)
    {
        $SQL = 'SELECT * FROM OrderDetails orderdetails
                   INNER JOIN Product product
                   ON orderdetails.product_id = product.product_id
                   INNER JOIN `Order` `order`
                   ON orderdetails.order_id = `order`.order_id
                   WHERE customer_id = :customer_id AND order_status = :order_status';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['customer_id' => $customer_id, 'order_status' => 'Cart']);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'OrderDetails');
        return $stmt->fetchAll();
    }

    public function getHistoryForUser($customer_id)
    {
        $SQL = 'SELECT * FROM OrderDetails orderdetails
                   INNER JOIN Product product
                   ON orderdetails.product_id = product.product_id
                   INNER JOIN `Order` `order`
                   ON orderdetails.order_id = `order`.order_id
                   WHERE customer_id = :customer_id AND order_status = :order_status';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['customer_id' => $customer_id, 'order_status' => 'Paid']);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'OrderDetails');
        return $stmt->fetchAll();
    }

    public function getTotalForUser($customer_id)
    {
        $SQL = 'SELECT SUM(product.product_price * orderdetails.order_quantity)
                 FROM OrderDetails orderdetails 
                 INNER JOIN Product product
                 ON orderdetails.product_id = product.product_id
                 INNER JOIN `Order` `order`
                 ON orderdetails.order_id = `order`.order_id
                 WHERE customer_id = :customer_id AND order_status = :order_status';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['customer_id' => $customer_id, 'order_status' => 'Cart']);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'OrderDetails');
        return $stmt->fetchColumn();
    }

    public function findOrder($customer_id)
    {
        $SQL = 'SELECT * FROM OrderDetails
                 WHERE customer_id = :customer_id AND order_id = :order_id AND order_status = :order_status';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['customer_id' => $customer_id, 'order_id' => $this->order_id, 'order_status' => 'Paid']);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'OrderDetails');
        return $stmt->fetchAll();
    }

    public function create()
    {
        $SQL = 'INSERT INTO OrderDetails(product_id, order_id, order_price, order_quantity) 
                    VALUES(:product_id, :order_id, :order_price, :order_quantity)
                    ON DUPLICATE KEY UPDATE order_quantity = order_quantity + :order_quantity';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['product_id' => $this->product_id, 'order_id' => $this->order_id,
            'order_price' => $this->order_price, 'order_quantity' => $this->order_quantity]);
        return $stmt->rowCount();
    }

    public function find($order_item_id)
    {
        $SQL = 'SELECT * FROM OrderDetails WHERE order_item_id = :order_item_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['order_item_id' => $order_item_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'OrderDetails');
        return $stmt->fetch();
    }

    public function update()
    {
        $SQL = 'UPDATE OrderDetails 
                   SET order_quantity = :order_quantity,
                       order_price = :order_price
                 WHERE order_item_id = :order_item_id AND product_id = :product_id AND order_id = :order_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['order_quantity' => $this->order_quantity, 'order_item_id' => $this->order_item_id,
            'order_price' => $this->order_price, 'product_id' => $this->product_id, 'order_id' => $this->order_id]);
        return $stmt->rowCount();
    }

    public function delete()
    {
        $SQL = 'DELETE FROM OrderDetails WHERE order_item_id = :order_item_id AND product_id = :product_id AND order_id = :order_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['order_item_id' => $this->order_item_id, 'product_id' => $this->product_id, 'order_id' => $this->order_id]);
        return $stmt->rowCount();
    }
}

?>