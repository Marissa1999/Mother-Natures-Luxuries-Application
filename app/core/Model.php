<?php

class Model
{
	protected static $_connection = null;

	public function __construct()
	{
		if(self::$_connection == null)
		{
			$host = 'localhost';
            $dbname = 'nature_luxuries_database';
            $user = 'luxuries_user';
            $password = 'qeezpN5v0jJH1jNG';

			self::$_connection = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
		}
	}




}


?>