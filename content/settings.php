<?php

//http://culttt.com/2012/10/01/roll-your-own-pdo-php-class/
class Database{
	private $DB;
	private $host;
	private $database;
	private $username;
	private $password;


	private $error;
	private $paramCount;
	private $stmt;

	public function __construct()
	{
		$this->host = 'sql3.freesqldatabase.com';
		$this->database = 'sql368720';
		$this->username = 'sql368720';
		$this->password = 'kU6*xT5*';

		$this->paramCount =  1;

		try{
			$this->DB = new PDO("mysql:host=" . $this->host  . ';dbname=' . $this->database, $this->username, $this->password);

			$this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->DB->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
        // Catch any errors
		catch(PDOException $e){
			$this->error = $e->getMessage();
			var_dump($this->error);
		}
	}


	public function query($query){
		$this->stmt = $this->DB->prepare($query);
	}

	public function addParameter($value){

		$this->stmt->bindParam($this->paramCount, $value);
		$this->paramCount+=1;
	}

	public function execute(){
		return $this->stmt->execute();
		$this->paramCount = 1;
	}

	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function resultset(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function lastInsertId(){
		return $this->DB->lastInsertId();
	}

	public function beginTransaction(){
		return $this->DB->beginTransaction();
	}

	public function endTransaction(){
		return $this->DB->commit();
	}

	public function cancelTransaction(){
		return $this->DB->rollBack();
	}
}
