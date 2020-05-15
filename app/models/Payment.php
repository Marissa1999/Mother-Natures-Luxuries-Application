<?php

class Payment extends Model
{
    var $card_number;
    var $card_company;
    var $expiration_date;
    var $card_cvc;

    public function getPaymentForCustomer($customer_id)
    {
        $SQL = 'SELECT * FROM Payment WHERE customer_id = :customer_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['customer_id' => $customer_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Payment');
        return $stmt->fetchAll();
    }

    public function create()
    {
        $SQL = 'INSERT INTO Payment(customer_id, card_number, card_company, expiration_date, card_cvc) 
                    VALUES(:customer_id, :card_number, :card_company, :expiration_date, :card_cvc) ';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['customer_id' => $this->customer_id, 'card_number' => $this->card_number,
            'card_company' => $this->card_company, 'expiration_date' => $this->expiration_date,
            'card_cvc' => $this->card_cvc]);
        return $stmt->rowCount();
    }

    public function find($card_id)
    {
        $SQL = 'SELECT * FROM Payment WHERE card_id = :card_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['card_id' => $card_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Payment');
        return $stmt->fetch();
    }

    public function update()
    {
        $SQL = 'UPDATE Payment
                   SET card_number = :card_number, card_company = :card_company,
                       expiration_date = :expiration_date, card_cvc = :card_cvc
                 WHERE card_id = :card_id AND customer_id = :customer_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['customer_id' => $this->customer_id, 'card_id' => $this->card_id,
            'card_number' => $this->card_number, 'card_company' => $this->card_company,
            'expiration_date' => $this->expiration_date, 'card_cvc' => $this->card_cvc]);
        return $stmt->rowCount();
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Payment WHERE card_id = :card_id AND customer_id = :customer_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['card_id' => $this->card_id, 'customer_id' => $this->customer_id]);
        return $stmt->rowCount();
    }
}

?>