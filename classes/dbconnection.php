<?php>
Class DBconnection
	{
	var $conn;
	function DBConnection()
		{
		$this->conn = pg_connect (host="localhost" port=
		5432" dbname="Comics_db" user="Andrew" password=
	"Cloudy88") or die("Unable to connect to the database")
		}
	
Server=127.0.0.1;Port=5432;Database=Comics_db;Userid=;
Password=myPassword;Protocol=3;SSL=false;SslMode=Disable;

	}
</php>