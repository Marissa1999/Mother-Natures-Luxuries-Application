<?php

class Order extends Model
{
    var $customer_id;
    var $order_status;
    var $order_date;

    public function create()
    {
        $SQL = 'INSERT INTO `Order`(customer_id, order_status, order_date) 
                    VALUES(:customer_id, :order_status, :order_date)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['customer_id' => $this->customer_id, 'order_status' => $this->order_status, 'order_date' => $this->order_date]);
        $this->order_id = self::$_connection->lastInsertId();
        return $stmt->rowCount();
    }

    public function findProfileCart($customer_id)
    {
        $SQL = 'SELECT * FROM `Order` 
                 WHERE customer_id = :customer_id 
                   AND order_status = :order_status';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['customer_id' => $customer_id, 'order_status' => 'Cart']);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
        return $stmt->fetch();
    }

    public function find($order_id)
    {
        $SQL = 'SELECT * FROM `Order` WHERE order_id = :order_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['order_id' => $order_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
        return $stmt->fetch();
    }

    public function update()
    {
        $SQL = 'UPDATE `Order` 
                   SET order_status = :order_status, 
                       order_date = :order_date
                 WHERE order_id = :order_id AND customer_id = :customer_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['order_status' => $this->order_status, 'order_date' => $this->order_date,
            'order_id' => $this->order_id, 'customer_id' => $this->customer_id]);
        return $stmt->rowCount();
    }
}

?>