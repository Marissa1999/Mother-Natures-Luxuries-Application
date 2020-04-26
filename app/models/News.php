<?php

class News extends Model
{
    var $news_article;
    var $news_topic;
    var $news_picture;
    var $news_timestamp;

    public function get()
    {
        $SQL = 'SELECT * FROM News';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'News');
        return $stmt->fetchAll();
    }

    public function getSellersAndNews()
    {
        $SQL = 'SELECT * FROM News news 
                   INNER JOIN Profile profile
                           ON news.seller_id = profile.profile_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'News');
        return $stmt->fetchAll();
    }

    public function create()
    {
        $SQL = 'INSERT INTO News(seller_id, news_article, news_topic, news_picture, news_timestamp) 
                    VALUES(:seller_id, :news_article, :news_topic, :news_picture, :news_timestamp)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['seller_id'=>$this->seller_id, 'news_article'=>$this->news_article,
                        'news_topic'=>$this->news_topic, 'news_picture'=>$this->news_picture,
                        'news_timestamp'=>$this->news_timestamp]);
        return $stmt->rowCount();
    }


}

?>