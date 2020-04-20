<?php

class Profile extends Model
{
    var $first_name;
    var $last_name;
    var $email;
    var $phone_number;
    var $location;
    var $theme_id;
    var $gender;
    var $user_type;

    public function getFromSeller($user_type)
    {
        $SQL = 'SELECT * FROM Profile WHERE user_type LIKE "Seller"';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['user_type'=>$user_type]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Profile');
        return $stmt->fetchAll();
    }

    public function getForUser($user_id)
    {
        $SQL = 'SELECT * FROM Profile WHERE user_id = :user_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['user_id'=>$user_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Profile');
        return $stmt->fetchAll();
    }

    public function create()
    {
        $SQL = 'INSERT INTO Profile(user_id, theme_id, first_name, last_name, 
                                    email, phone_number, location, gender, user_type) 
                     VALUES(:user_id, :theme_id, :first_name, :last_name, :email, 
                            :phone_number, :location, :gender, :user_type)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['user_id'=>$this->user_id, 'theme_id'=>$this->theme_id, 'first_name'=>$this->first_name,
                       'last_name'=>$this->last_name, 'email'=>$this->email, 'phone_number'=>$this->phone_number,
                       'location'=>$this->location, 'gender'=>$this->gender, 'user_type'=>$this->user_type]);
        return $stmt->rowCount();
    }

    public function find($profile_id)
    {
        $SQL = 'SELECT * FROM Profile WHERE profile_id = :profile_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['profile_id'=>$profile_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Profile');
        return $stmt->fetch();
    }

    public function findProfile($user_id)
    {
        $SQL = 'SELECT * FROM Profile WHERE user_id = :user_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['user_id'=>$user_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Profile');
        return $stmt->fetch();
    }

    public function update()
    {
        $SQL = 'UPDATE Profile 
                    SET first_name = :first_name, 
                       last_name = :last_name, 
                       email = :email, 
                       phone_number = :phone_number, 
                       location = :location, 
                       theme_id = :theme_id, 
                       gender = :gender, 
                       user_type = :user_type
                 WHERE user_id = :user_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['first_name'=>$this->first_name, 'last_name'=>$this->last_name, 'email'=>$this->email,
                        'phone_number'=>$this->phone_number, 'location'=>$this->location, 'theme_id'=>$this->theme_id,
                        'gender'=>$this->gender, 'user_type'=>$this->user_type, 'user_id'=>$this->user_id]);
        return $stmt->rowCount();
    }

}

?>
