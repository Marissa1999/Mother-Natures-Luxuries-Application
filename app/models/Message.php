<?php

class Message extends Model
{
    var $message_text;
    var $message_timestamp;
    var $message_read;

    public function get()
    {
        $SQL = 'SELECT * FROM Message';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Message');
        return $stmt->fetchAll();
    }

    public function getMessages($message_sender, $message_receiver)
    {
        $SQL = 'SELECT * FROM Message WHERE message_sender = :message_sender AND message_receiver = :message_receiver';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['message_sender'=>$message_sender, 'message_receiver'=>$message_receiver]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Message');
        return $stmt->fetchAll();
    }

    public function create()
    {
        $SQL = 'INSERT INTO Message(message_sender, message_receiver, message_text, message_timestamp, message_read) 
                     VALUES(:message_sender, :message_receiver, :message_text, :message_timestamp, 0) ';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['message_sender'=>$this->message_sender, 'message_receiver'=>$this->message_receiver,
            'message_text'=>$this->message_text, 'message_timestamp'=>$this->message_timestamp,
            'message_read'=>$this->message_read]);
        return $stmt->rowCount();
    }

    public function find($message_id)
    {
        $SQL = 'SELECT * FROM Message WHERE message_id = :message_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['message_id'=>$message_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Message');
        return $stmt->fetch();
    }

    public function update()
    {
        $SQL = 'UPDATE Message
                   SET message_sender = :message_sender,
                       message_receiver = :message_receiver,
                       message_text = :message_text, 
                       message_timestamp = :message_timestamp,
                       message_read = 1
                 WHERE message_id = :message_id AND message_receiver = :message_receiver';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['message_id'=>$this->message_id, 'message_receiver'=>$this->message_receiver,
                        'message_read'=>$this->message_read]);
        return $stmt->rowCount();
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Message WHERE message_id = :message_id AND message_receiver = :message_receiver';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['message_id'=>$this->message_id, 'message_receiver'=>$this->message_receiver]);
        return $stmt->rowCount();
    }
}

?>