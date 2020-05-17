<?php
class Notification extends Model{

    public function getNotifications($profile_id){
        $SQL = 'SELECT * FROM Notification WHERE profile_id = :profile_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['profile_id' => $profile_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Notification');
        return $stmt->fetchAll();
    }

        public function createNotifications($allProfiles, $pruductName){
            foreach ($allProfiles as $profile) {
                $SQL = 'INSERT INTO Notification(profile_id,text)   
                     VALUES(:profile_id, :text)';
                $stmt = self::$_connection->prepare($SQL);
                $stmt->execute(['profile_id' => $profile->profile_id,'text' =>$pruductName]);
            }
        }
}

?>