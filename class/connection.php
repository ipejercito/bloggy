<?php
use JeremyKendall\Password\PasswordValidator;

include_once("JeremyKendall/Password/PasswordValidatorInterface.php");
include_once("JeremyKendall/Password/PasswordHashFailureException.php");
include_once("JeremyKendall/Password/PasswordValidator.php");
include_once("JeremyKendall/Password/Result.php");

include_once("password_hash/password.php");
Class Database{

	protected $connection;
	protected $host = "localhost";
	protected $user = "root";
	protected $password = "";
	protected $password_validator;

	public function __construct()
	{
		$this->password_validator = new PasswordValidator();
		try 
		{
		    $this->connection = new PDO("mysql:host=$this->host;dbname=bloggy", $this->user, 
		    				$this->password);
		    //echo "Connected to database";
		}
		catch(PDOException $error)
	    {
	    	echo $error->getMessage();
	    }
	}

	public function fetch_all($query)
	{
		$query_result = $this->connection->prepare($query);
		$query_result->execute();
		$result = $query_result->fetchAll();
		$return_data = (!empty($result)) ? $result : "Incorrect query";
		return $return_data;
	}

	public function fetch_record($query, $params)
	{
		/*we can define more depending on passed data 
		ref http://php.net/manual/en/pdo.constants.php*/
		$query_result = $this->connection->prepare($query);
		foreach($params as $index => &$value)
		{
			$query_result->bindParam($index,$value,PDO::PARAM_STR);
		}
		$query_result->execute();
		/* added attribute to fetch associative array 
		http://php.net/manual/en/pdostatement.fetch.php */
		$row = $query_result->fetch(PDO::FETCH_ASSOC);
		$return_row = (!empty($row)) ? $row : FALSE;
		return $return_row;
	}

	public function insert($query, $params)
	{
		$query_result = $this->connection->prepare($query);
		foreach($params as $index => &$value)
		{
			$query_result->bindParam($index,$value,PDO::PARAM_STR);
		}
		$insert_result = $query_result->execute();
		return $insert_result;
	}

}

$database = new Database();

?>