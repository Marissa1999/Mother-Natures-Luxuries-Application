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

    public function getMessages($message_receiver, $message_sender)
    {
        $SQL = 'SELECT * FROM Message 
                WHERE message_receiver = :message_receiver AND message_sender = :message_sender
                   OR message_receiver = :message_sender AND message_sender = :message_receiver
                ORDER BY message_timestamp';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['message_receiver' => $message_receiver, 'message_sender' => $message_sender]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Message');
        return $stmt->fetchAll();
    }

    public function getSendersAndMessages()
    {
        $SQL = 'SELECT * FROM Message message
                   INNER JOIN Profile profile
                           ON profile.profile_id = message.message_sender';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Message');
        return $stmt->fetchAll();
    }

    public function create()
    {
        $SQL = 'INSERT INTO Message(message_sender, message_receiver, message_text, message_timestamp, message_read) 
                     VALUES(:message_sender, :message_receiver, :message_text, :message_timestamp, :message_read)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['message_sender' => $this->message_sender, 'message_receiver' => $this->message_receiver,
            'message_text' => $this->message_text, 'message_timestamp' => $this->message_timestamp,
            'message_read' => $this->message_read]);
        return $stmt->rowCount();
    }

    public function find($message_id)
    {
        $SQL = 'SELECT * FROM Message WHERE message_id = :message_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['message_id' => $message_id]);
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
                       message_read = :message_read
                 WHERE message_id = :message_id AND message_receiver = :message_receiver';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['message_id' => $this->message_id, 'message_sender' => $this->message_sender,
            'message_receiver' => $this->message_receiver, 'message_text' => $this->message_text,
            'message_timestamp' => $this->message_timestamp, 'message_read' => $this->message_read]);
        return $stmt->rowCount();
    }

    public function updateRead()
    {
        $SQL = 'UPDATE Message
                   SET message_read = :message_read
                 WHERE message_id = :message_id AND message_receiver = :message_receiver';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['message_id' => $this->message_id, 'message_receiver' => $this->message_receiver,
            'message_read' => $this->message_read]);
        return $stmt->rowCount();
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Message WHERE message_id = :message_id AND message_receiver = :message_receiver';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['message_id' => $this->message_id, 'message_receiver' => $this->message_receiver]);
        return $stmt->rowCount();
    }
}

?>