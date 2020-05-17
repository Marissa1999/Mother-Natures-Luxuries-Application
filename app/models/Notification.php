<?php
class Notification extends Model
{
    var $notification_text;
    var $notification_timestamp;
    var $customer_id;
    var $notification_read;

/*
//normal people
SQL = SELECT PROFILE.* FROM Profile JOIN Profile_Theme ON Profile.profile_id = Profile_theme.profile_id WHERE Profile_Theme.theme_id = :theme_id

Notification
//happens on creation and update of products
SO the notification is called by the create and update controller methods
//notifications in a table for the user to see
create a new item for each notification

Notification
notification_id
user_id person getting the notification
read_flag
timestamp
notification_text description
notification varchar(1024) url in there /home/products/24

a href=""
*/

    public function getNotifications($customer_id)
    {
        $SQL = 'SELECT * FROM Notification WHERE customer_id = :customer_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['customer_id' => $customer_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Notification');
        return $stmt->fetchAll();
    }

        public function createNotifications($allProfiles, $product_name)
        {
            foreach ($allProfiles as $profile)
            {
                $SQL = 'INSERT INTO Notification(notification_text, customer_id) 
                             VALUES(:notification_text, :customer_id)';
                $stmt = self::$_connection->prepare($SQL);
                $stmt->execute(['notification_text' =>$product_name,
                                'customer_id' => $profile->profile_id]);
            }

        }
}

?>