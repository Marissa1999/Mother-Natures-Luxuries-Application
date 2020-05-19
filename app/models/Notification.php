<?php

class Notification extends Model
{
    var $customer_id;

    public function getNotifications($customer_id)
    {
        $SQL = 'SELECT * FROM Notification WHERE customer_id  = :customer_id ';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['customer_id' => $customer_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Notification');
        return $stmt->fetchAll();
    }

    public function createNotifications($allProfiles, $product_name)
    {
        foreach ($allProfiles as $profile) {
            $SQL = 'INSERT INTO Notification(notification_text, customer_id ) 
                             VALUES(:notification_text, :customer_id )';
            $stmt = self::$_connection->prepare($SQL);
            $stmt->execute(['notification_text' => $product_name,
                            'customer_id' => $profile->profile_id]);
        }

    }
}

?>