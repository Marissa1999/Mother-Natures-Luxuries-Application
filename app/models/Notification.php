<?php
class Notification extends Model
{
    var $customer_id;


    public function getNotifications($profile_id )
    {
        $SQL = 'SELECT * FROM Notification WHERE profile_id  = :profile_id ';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['profile_id' => $profile_id ]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Notification');
        return $stmt->fetchAll();
    }

        public function createNotifications($allProfiles, $product_name)
        {
            foreach ($allProfiles as $profile)
            {
                $SQL = 'INSERT INTO Notification(text, profile_id ) 
                             VALUES(:text, :profile_id )';
                $stmt = self::$_connection->prepare($SQL);
                $stmt->execute(['text' =>$product_name,
                                'profile_id' => $profile->profile_id]);
            }

        }
}

?>