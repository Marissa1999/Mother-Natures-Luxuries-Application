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

    public function getMessageReceiver($message_receiver)
    {
        $SQL = 'SELECT * FROM Message WHERE message_receiver = :message_receiver';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['message_receiver'=>$message_receiver]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Message');
        return $stmt->fetch();
    }

    public function create()
    {
        $SQL = 'INSERT INTO Message(message_sender, message_receiver, message_text, message_timestamp, message_read) 
                     VALUES(:message_sender, :message_receiver, :message_text, :message_timestamp, :message_read) ';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['message_sender'=>$this->message_sender, 'message_receiver'=>$this->message_receiver,
            'message_text'=>$this->message_text, 'message_timestamp'=>$this->message_timestamp,
            'message_read'=>$this->message_read]);
        return $stmt->rowCount();
    }

    public function find($book_id)
    {
        $SQL = 'SELECT * FROM Book WHERE book_id = :book_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['book_id'=>$book_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
        return $stmt->fetch();
    }

    public function update()
    {
        $SQL = 'UPDATE Book
                   SET book_name = :book_name, book_description = :book_description, book_picture = :book_picture,
                       book_price = :book_price, book_quantity = :book_quantity
                 WHERE book_id = :book_id AND teacher_id = :teacher_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['book_id'=>$this->book_id, 'teacher_id'=>$this->teacher_id,
            'book_name'=>$this->book_name, 'book_description'=>$this->book_description,
            'book_picture'=>$this->book_picture, 'book_price'=>$this->book_price,
            'book_quantity'=>$this->book_quantity]);
        return $stmt->rowCount();
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Book WHERE book_id = :book_id AND teacher_id = :teacher_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['book_id'=>$this->book_id, 'teacher_id'=>$this->teacher_id ]);
        return $stmt->rowCount();
    }
}

?>